<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Table;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(MenuSeeder::class);
        $this->call(OrderSeeder::class);
        for ($i=0; $i < 10; $i++) { 
            Table::create([
                'number' => $i+1
            ]);
        }
    }
}
