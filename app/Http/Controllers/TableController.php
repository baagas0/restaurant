<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Table;

class TableController extends Controller
{
    public function getIndex() {
        // Add your magic code here
        $data['data'] = Table::orderBy('created_at','desc')->paginate(10);
        return view('table.main', $data);
    }
    public function postApi() {
        $data['data'] = Table::get();
        return response()->json($data);
    }
    public function postCheck(Request $request) {
        $data = Table::find($request->number);
        if ($data) {
            $response = 1;
        }else {
            $response = 0;
        }
        return $response;
    }

    public function getAdd() {
        $data = [];
        return view('table.form', $data);
    }

    public function postSaving(Request $request) {
        $table = new Table;
        $table->number = $request->number;

        if($table->save()){
            return redirect()->route('table')->with([
                'type' => 'success',
                'msg' => 'Table disimpan'
            ]);
        }else{
            return redirect()->route('table')->with([
                'type' => 'danger',
                'msg' => 'Err.., Terjadi Kesalahan'
            ]);
        }
    }

    public function getUpdate($id) {
        $data['table'] = Table::findOrFail($id);
        return view('table.form', $data);
    }

    public function postUpdating($id, Request $request) {
        $table = Table::findOrFail($id);
        $table->number = $request->number;
        if($table->save()){
            return redirect()->route('table.update', $id)->with([
                'type' => 'success',
                'msg' => 'Table berhasil diedit'
            ]);
        }else{
            return redirect()->route('table')->with([
                'type' => 'danger',
                'msg' => 'Err.., Terjadi Kesalahan'
            ]);
        }
    }

    public function getDestroy($id){
        $table = Table::findOrFail($id);

        if($table->delete()){
            return redirect()->route('table')->with([
                'type' => 'success',
                'msg' => 'Table telah dihapus'
            ]);
        }
    }
}