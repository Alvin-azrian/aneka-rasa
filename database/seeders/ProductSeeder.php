<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $makanan = Category::where('nama_kategori', 'Makanan')->firstOrFail();
        $minuman = Category::where('nama_kategori', 'Minuman')->firstOrFail();
        $camilan = Category::where('nama_kategori', 'Camilan')->firstOrFail();

        $products = [
            [
                'category_id' => $makanan->id,
                'nama_produk' => 'Nasi Goreng Spesial',
                'deskripsi' => 'Nasi goreng dengan bumbu khas dan telur.',
                'harga' => 18000,
            ],
            [
                'category_id' => $makanan->id,
                'nama_produk' => 'Ayam Geprek',
                'deskripsi' => 'Ayam crispy dengan sambal pedas.',
                'harga' => 20000,
            ],
            [
                'category_id' => $makanan->id,
                'nama_produk' => 'Mie Goreng',
                'deskripsi' => 'Mie goreng dengan topping sayuran.',
                'harga' => 15000,
            ],
            [
                'category_id' => $minuman->id,
                'nama_produk' => 'Es Teh Manis',
                'deskripsi' => 'Teh manis segar dengan es batu.',
                'harga' => 5000,
            ],
            [
                'category_id' => $minuman->id,
                'nama_produk' => 'Jus Alpukat',
                'deskripsi' => 'Jus alpukat segar dan creamy.',
                'harga' => 12000,
            ],
            [
                'category_id' => $camilan->id,
                'nama_produk' => 'Pisang Cokelat',
                'deskripsi' => 'Pisang goreng dengan isian cokelat.',
                'harga' => 10000,
            ],
        ];

        foreach ($products as $product) {
            Product::updateOrCreate(
                ['nama_produk' => $product['nama_produk']],
                $product
            );
        }
    }
}