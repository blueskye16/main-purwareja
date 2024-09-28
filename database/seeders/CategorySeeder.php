<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Data Desa',
            'slug' => 'data-desa',
        ]);

        Category::create([
            'name' => 'Penduduk Desa',
            'slug' => 'penduduk-desa',
        ]);

        Category::create([
            'name' => 'Desa Bugar',
            'slug' => 'desa-bugar',
        ]);
    }
}
