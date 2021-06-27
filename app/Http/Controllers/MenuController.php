<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    public function getIndex() {
        // Add your magic code here
        $data['data'] = Menu::orderBy('created_at','desc')->get();
        return view('menu.main', $data);
    }
    public function postApi() {
        $data['data'] = Menu::get();
        return response()->json($data);
    }

    public function getAdd() {
        $data = [];
        return view('menu.form', $data);
    }

    public function postSaving(Request $request) {
        // dd(preg_replace("/([^0-9\\.])/i", "", $request->price)); 
        $menu = new Menu;
        $menu->name = $request->name;
        $menu->ppn = $request->ppn;
        $menu->price = preg_replace("/([^0-9\\.])/i", "", $request->price);
        $menu->type = $request->type;
        $menu->status = 1;
        if($menu->save()){
            return redirect()->route('menu')->with([
                'color' => 'success',
                'msg' => 'Menu disimpan'
            ]);
        }else{
            return redirect()->route('menu')->with([
                'color' => 'danger',
                'msg' => 'Err.., Terjadi Kesalahan'
            ]);
        }
    }

    public function getUpdate($id) {
        $data['menu'] = Menu::findOrFail($id);
        return view('menu.form', $data);
    }

    public function postUpdating($id, Request $request) {
        $menu = Menu::findOrFail($id);$menu->name = $request->name;
        $menu->ppn = $request->ppn;
        $menu->price = $request->price;
        $menu->type = $request->type;
        $menu->status = $request->status;
        if($menu->save()){
            return redirect()->route('menu.update', $id)->with([
                'type' => 'success',
                'msg' => 'Menu berhasil diedit'
            ]);
        }else{
            return redirect()->route('menu')->with([
                'type' => 'danger',
                'msg' => 'Err.., Terjadi Kesalahan'
            ]);
        }
    }

    public function getDestroy($id){
        $menu = Menu::findOrFail($id);if($menu->delete()){
            return redirect()->route('menu')->with([
                'type' => 'success',
                'msg' => 'Menu telah dihapus'
            ]);
        }
    }
}