<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\MenuOrder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = new Order;
        $data->waiter_id = 1;
        $data->table_number = 1;
        $data->customer_name = 'Ditya';
        $data->amount = 10000.00;
        $data->status = '0';
        $data->save();

        MenuOrder::create([
            'order_id'      => 1,
            'menu_id'       => 1,
            'order_amount'  => 2,
            'amount'        => 20000,
            'serve_at'      => null,
        ]);
        MenuOrder::create([
            'order_id'      => 1,
            'menu_id'       => 2,
            'order_amount'  => 3,
            'amount'        => 30000,
            'serve_at'      => null,
        ]);
        MenuOrder::create([
            'order_id'      => 1,
            'menu_id'       => 3,
            'order_amount'  => 1,
            'amount'        => 5000,
            'serve_at'      => null,
        ]);
        MenuOrder::create([
            'order_id'      => 1,
            'menu_id'       => 4,
            'order_amount'  => 2,
            'amount'        => 12000,
            'serve_at'      => now(),
        ]);

        MenuOrder::create([
            'order_id'      => 1,
            'menu_id'       => 4,
            'order_amount'  => 2,
            'amount'        => 12000,
            'serve_at'      => null,
            'status'        => '1',
        ]);
    }
}
