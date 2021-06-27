<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menu = new Menu;
        $menu->name = 'Nasi Goreng Bacem';
        $menu->ppn = 10;
        $menu->price = 10000;
        $menu->type = 'food';
        $menu->status = 1;
        $menu->save();

        $menu = new Menu;
        $menu->name = 'Mie Keriting';
        $menu->ppn = 10;
        $menu->price = 10000;
        $menu->type = 'food';
        $menu->status = 1;
        $menu->save();

        $menu = new Menu;
        $menu->name = 'Kopi Jantan';
        $menu->ppn = 500;
        $menu->price = 5000;
        $menu->type = 'drink';
        $menu->status = 1;
        $menu->save();

        $menu = new Menu;
        $menu->name = 'Kentang Goreng';
        $menu->ppn = 10;
        $menu->price = 6000;
        $menu->type = 'dessert';
        $menu->status = 1;
        $menu->save();
    }
}
