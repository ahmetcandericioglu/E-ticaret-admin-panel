<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'producttitle' => 'Sabah Gazetesi',
            'productcategoryid' => '1',
            'barcode' => '123456',
            'productstatus' => 'stokta yok'
        ]);

        Product::create([
            'producttitle' => 'Martin Eden',
            'productcategoryid' => '1',
            'barcode' => '654321',
            'productstatus' => 'full'
        ]);

        Product::create([
            'producttitle' => 'HP Laptop',
            'productcategoryid' => '2',
            'barcode' => '123789',
            'productstatus' => 'full'
        ]);

        Product::create([
            'producttitle' => 'Nike krampon',
            'productcategoryid' => '4',
            'barcode' => '148656',
            'productstatus' => 'stokta yok'
        ]);

        Product::create([
            'producttitle' => 'Hayvan Çiftliği',
            'productcategoryid' => '1',
            'barcode' => '123456',
            'productstatus' => 'stokta yok'
        ]);
    }
}
