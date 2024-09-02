<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategoris')->insert([
            ['nama_kategori' => 'Elektronik'],
            ['nama_kategori' => 'Aksesoris Komputer'],
            ['nama_kategori' => 'Perlengkapan Kantor'],
            ['nama_kategori' => 'Furniture'],
            ['nama_kategori' => 'Gadget']
     ]);
    }
}
