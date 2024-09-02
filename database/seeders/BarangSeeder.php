<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('barangs')->insert([
            ['kategori_id' => 2, 'nama_barang' => 'Canggih Monitor', 'harga_barang' => 4075410, 'jumlah_barang' => 0, 'foto_barang' => 'uploads/product-1.jpg'],
            ['kategori_id' => 4, 'nama_barang' => 'Keren Meja Makan', 'harga_barang' => 8542183, 'jumlah_barang' => 27, 'foto_barang' => 'uploads/product-1.jpg'],
            ['kategori_id' => 1, 'nama_barang' => 'Keren Televisi', 'harga_barang' => 14698154, 'jumlah_barang' => 74, 'foto_barang' => 'uploads/product-1.jpg'],
            ['kategori_id' => 3, 'nama_barang' => 'Keren Scanner', 'harga_barang' => 17787413, 'jumlah_barang' => 53, 'foto_barang' => 'uploads/product-1.jpg'],
            ['kategori_id' => 5, 'nama_barang' => 'Terbaik Smartwatch', 'harga_barang' => 7958110, 'jumlah_barang' => 90, 'foto_barang' => 'uploads/product-1.jpg'],    
        ]);   
    }
}