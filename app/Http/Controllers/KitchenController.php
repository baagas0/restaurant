<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class KitchenController extends Controller
{
    public function getIndex() {
        // Add your magic code here
        return redirect()->route('kitchen.type', 'active');
    }
    public function getType($type) {
        // Add your magic code here
        $data = [];
        $data['data'] = Order::whereDate('created_at', now())
            ->where('status', '0')->get();
        return view('kitchen.main', $data);
    }
}
