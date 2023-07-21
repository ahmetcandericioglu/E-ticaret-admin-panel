<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create(
            [
                'categorytitle' => 'kırtasiye',
                'categorydescription' => 'kitap, dergi, gazete vb.',
                'categorystatus' => 'aktif',
            ]);
        Category::create(
            [
                'categorytitle' => 'elektronik',
                'categorydescription' => 'klima, bilgisayar, televizyon vb.',
                'categorystatus' => 'aktif',
            ]);
        Category::create(
            [
                'categorytitle' => 'kıyafet',
                'categorydescription' => 'elbise, şort, tişört vb.',
                'categorystatus' => 'aktif',
            ]);
        Category::create(
            [
                'categorytitle' => 'ayakkabı',
                'categorydescription' => 'sandalet, terlik, krampon vb.',
                'categorystatus' => 'aktif',
            ]);
    }
}
