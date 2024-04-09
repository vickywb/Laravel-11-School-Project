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
        $categories = [
            [
                'title' => 'Non Category',
                'slug' => 'non-category',
            ],
            [
                'title' => 'Olahraga',
                'slug' => 'olahraga',
            ],
            [
                'title' => 'Kesenian',
                'slug' => 'kesenian',
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
