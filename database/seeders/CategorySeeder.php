<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::firstOrCreate(
            ['nama_kategori' => 'Makanan'],
            ['deskripsi' => 'Berbagai macam makanan lezat']
        );

        Category::firstOrCreate(
            ['nama_kategori' => 'Minuman'],
            ['deskripsi' => 'Berbagai macam minuman segar']
        );

        Category::firstOrCreate(
            ['nama_kategori' => 'Camilan'],
            ['deskripsi' => 'Aneka camilan untuk menemani waktu santai']
        );
    }
}