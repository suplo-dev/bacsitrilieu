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
        Category::query()->insert([
            'name' => 'Danh muc 1',
            'slug' => 'danh-muc-1',
        ]);
        Category::query()->insert([
            'name' => 'Danh muc 2',
            'slug' => 'danh-muc-2',
        ]);
    }
}
