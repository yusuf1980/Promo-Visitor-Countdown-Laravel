<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Keuangan Premium',
            'description' => 'Softare Keuangan Premium (multi proyek/multi usaha)',
            'price' => 1100000.00,
        ]);

        Product::create([
            'name' => 'Keuangan Pro',
            'description' => 'Software Keuangan Pro (satu proyek/satu usaha)',
            'price' => 750000.00,
        ]);
    }
}
