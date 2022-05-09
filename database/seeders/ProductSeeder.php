<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            ['name' => 'Cadeira', 'price' => rand(1, 100), 'photo_url' => 'chair.jpg', 'created_at' => now()],
            ['name' => 'Mesa', 'price' => rand(1, 100), 'photo_url' => 'table.jpg', 'created_at' => now()],
            ['name' => 'Sofá', 'price' => rand(1, 100), 'photo_url' => 'sofa.jpeg', 'created_at' => now()],
            ['name' => 'Teclado', 'price' => rand(1, 100), 'photo_url' => 'keyboard.jpg', 'created_at' => now()],
            ['name' => 'Mouse', 'price' => rand(1, 100), 'photo_url' => 'mouse.jpeg', 'created_at' => now()],
            ['name' => 'Mousepad', 'price' => rand(1, 100), 'photo_url' => 'mousepad.jpg', 'created_at' => now()],
            ['name' => 'Monitor', 'price' => rand(1, 100), 'photo_url' => 'monitor.jpg', 'created_at' => now()],
            ['name' => 'Post-it', 'price' => rand(1, 100), 'photo_url' => 'post-it.jpg', 'created_at' => now()],
            ['name' => 'Calendário', 'price' => rand(1, 100), 'photo_url' => 'calendar.jpg', 'created_at' => now()],
            ['name' => 'Lixeira', 'price' => rand(1, 100), 'photo_url' => 'trash-can.jpeg', 'created_at' => now()],
        ]);
    }
}
