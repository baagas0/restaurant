<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Order;
use App\Models\MenuOrder;
use App\Models\Transaction;
use Auth;

class OrderController extends Controller
{
    public function getIndex() {
        $order = Order::with('transaction')->find(2);

        dd($order);

        return redirect()->route('order.add');
    }
    public function getType($type) {
        // Add your magic code here
        $data = [];
        $data['type'] = $type;
        return view('order.main', $data);
    }
    public function postApi($type) {
        if ($type == 'active') {
            // show pending payment by status column for this day
            $data['data'] = Order::whereDate('created_at', now())
            ->where('status', '0')->get();
        }else if($type == 'pending-payment'){
            // show pending payment by status column for this month
            $data['data'] = Order::whereMonth('created_at', date('m'))
            ->where('status', '0')->get();
        }else if($type == 'success-payment'){
            // show success payment by status column for this month
            $data['data'] = Order::whereMonth('created_at', date('m'))
            ->where('status', '1')->get();
        }

        
        return response()->json($data);
    }

    public function getDetail($id) {
        // Add your magic code here
        $data = [];
        $data['id'] = $id;
        $data['data'] = Order::with('transaction')->findOrFail($id);


        // dd($data);
        $countAll = count($data['data']->list);
        $countServe = count($data['data']->list->whereNotNull('serve_at'));
        // dd($countServe / $countAll);
        if ($countAll < 1) {
            $data['progress'] = 0;
        }else{
            $data['progress'] = ($countServe / $countAll) * 100;
        }
        
        $data['menuAll'] = Menu::get()->groupBy('type');

        return view('order.detail', $data);
    }
    public function postMenuAddon($order_id, Request $request){
        $menu = $request->menu;
        $amount = 0;

        foreach ($menu as $i => $item) {
            if (isset($item['menu_id']) && $item['order_amount'] > 0) {
                $dataMenu = Menu::findOrFail($item['menu_id']);
                $subTotal = $dataMenu->price * $item['order_amount'];
                MenuOrder::create([
                    'order_id'      => $order_id,
                    'menu_id'       => $item['menu_id'],
                    'order_amount'  => $item['order_amount'],
                    'amount'        => $subTotal,
                    'status'        => '1',
                ]);
                $amount = $amount + $subTotal;  
            }
        }

        return redirect()->route('order.detail', $order_id)->with([
            'type' => 'success',
            'msg' => 'Add on menu successfully added'
        ]);
    }
    public function postTransaction($order_id, Request $request) {
        $order = Order::findOrFail($order_id);

        $amount = $order->list->sum('amount');
        $moneyReceive = str_replace(",", "", $request->moneyReceive);

        $check = Transaction::where('order_id', $order_id)->first();
        if (!empty($check)) {
            return redirect()->route('order.detail', $order_id)->with([
                'type' => 'error',
                'msg'  => 'Transaction already exist'
            ]);
        }

        $order->update([
            'status' => '1'
        ]);

        $tr = new Transaction;
        $tr->order_id = $order_id;
        $tr->payment_method = $request->paymentMethod;
        $tr->money_receive = $moneyReceive;
        $tr->money_changes = (int)$moneyReceive - (int)$amount;
        $tr->amount = $amount;
        $tr->save();
        
        return redirect()->route('order.detail', $order_id);

    }
    public function postUpdateMenuStatus($type, Request $request){
        // get menu will want to update the reserve_at data
        $update = MenuOrder::findOrFail($request->id);
        $order = Order::findOrFail($update->order_id);

        if (!empty($order->transaction)) {
            return 'transaction exist';
        }

        if ($type == 'serve') {
            $update->update([
                'serve_at' => now(),
            ]);
        }else{
            $update->update([
                'serve_at' => null,
            ]);
        }

        $countAll = count($order->list);
        $countServe = count($order->list->whereNotNull('serve_at'));

        $data['id']         = $update->id;
        $data['progress']   = ($countServe / $countAll) * 100;
        $data['time']       = now()->format('H:i').' WIB';
        return $data;
    }

    public function getAdd() {
        $data = [];
        $data['data'] = Order::get();
        $data['menu'] = Menu::get()->groupBy('type');
        ;
        // dd($data);
        return view('order.form', $data);
    }

    public function postSaving(Request $request) {
        $menu = $request->menu;
        $amount = 0;


        $order = new Order;
        // $order->waiter_id = Auth::user()->id;
        $order->waiter_id = 1;
        $order->table_number = $request->table_number;
        $order->amount = $amount;
        $order->customer_name = $request->customer_name;
        $order->status = '0';

        
        if($order->save()){
            foreach ($menu as $i => $item) {
                if (isset($item['menu_id']) && $item['order_amount'] > 0) {
                    $dataMenu = Menu::findOrFail($item['menu_id']);
                    $subTotal = $dataMenu->price * $item['order_amount'];
                    MenuOrder::create([
                        'order_id'      => $order->id,
                        'menu_id'       => $item['menu_id'],
                        'order_amount'  => $item['order_amount'],
                        'amount'        => $subTotal,
                    ]);
                    $amount = $amount + $subTotal;  
                }
            }

            return redirect()->route('order.type', 'success')->with([
                'type' => 'success',
                'msg' => 'Order disimpan'
            ]);
        }else{
            return redirect()->route('order.type', 'success')->with([
                'type' => 'danger',
                'msg' => 'Err.., Terjadi Kesalahan'
            ]);
        }
    }

    public function getUpdate($id) {
        $data['order'] = Order::findOrFail($id);

        $data['menu_id'] = [];
        foreach ($data['order']->list as $key => $item) {
            $data['menu_id'][$key] = $item->menu_id;
        }
        $data['menu'] = Menu::whereIn('id', $data['menu_id'])->get()->groupBy('type');
        return view('order.form', $data);
    }

    public function postUpdating($id, Request $request) {
        $order = Order::findOrFail($id);
        $menu = json_decode($order->menu);

        $menues = $request->menu;
        // dd($menues);
        $amount = 0;
        foreach ($menues as $i => $item) {
            if (isset($item['menu_id']) && $item['order_amount'] > 0) {

                // dd($menues[3]);
                $column = array_search($item['menu_id'], array_column($menu, 'menu_id'));
                echo $column.'<br>';
                $dataMenu = Menu::findOrFail($item['menu_id']);
                $subAmount = $dataMenu->price * $item['order_amount'];
                $amount = $amount + $subAmount;

                if ($column !== false) {
                    // echo $menu[$column]->order_amount .' - '. $item['order_amount'].'<br>';

                    if (isset($menu[$column]->serve_at)) {
                        if ($menu[$column]->order_amount != $item['order_amount']) {
                            $menu[$column]->serve_at = null;
                        }
                    }

                    if (isset($item['menu_id'])) {
                        $column = array_search($item['id'], array_column($menu, 'menu_id'));
                        unset($menu[$column]);
                    }else{


                        $menu[$column]->menu_id = $item['menu_id'];
                        $menu[$column]->order_amount = $item['order_amount'];
                        $menu[$column]->amount = $subAmount;
                    }
                }else{
                    $item['amount'] = $subAmount;
                    array_push($menu, $item);
                }


            }else{
                // if (isset($item['menu_id'])){
                //     dd('s');
                $column = array_search($item['id'], array_column($menu, 'menu_id'));
                unset($menu[$column]);
                // }else{
                unset($menues[$i]);
                // }
            }
        }


        // dd($menu);


        $order->waiter_id = $request->waiter_id;
        // $order->table_number = $request->table_number;
        $order->menu = json_encode(array_values($menu));
        $order->amount = $amount;
        $order->customer_name = $request->customer_name;
        $order->status = '0';

        
        if($order->save()){
            return redirect()->route('order.type', 'success')->with([
                'type' => 'success',
                'msg' => 'Order disimpan'
            ]);
        }else{
            return redirect()->route('order.type', 'success')->with([
                'type' => 'danger',
                'msg' => 'Err.., Terjadi Kesalahan'
            ]);
        }
    }

    public function getDestroy($id){
        $order = Order::findOrFail($id);

        if($order->delete()){
            return redirect()->route('order')->with([
                'type' => 'success',
                'msg' => 'Order telah dihapus'
            ]);
        }
    }
}
