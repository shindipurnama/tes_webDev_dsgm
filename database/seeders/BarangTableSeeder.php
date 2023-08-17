<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BarangTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Models\Barang::create([
            'item' => 'Aqua',
            'harga' => 3500,
            'stock' => 100,
        ]);
        \App\Models\Barang::create([
            'item' => 'Le Mineral',
            'harga' => 3700,
            'stock' => 100,
        ]);
    }
}
