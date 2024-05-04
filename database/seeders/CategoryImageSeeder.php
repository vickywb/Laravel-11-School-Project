<?php

namespace Database\Seeders;

use App\Models\CategoryImage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categoryImages = [
            [
                'title' => 'Non Category',
                'slug' => 'non-category'
            ],
            [
                'title' => 'Ramadhan',
                'slug' => 'ramadhan'
            ],
            [
                'title' => 'Kejuaraan',
                'slug' => 'kejuaraan'
            ],
            [
                'title' => 'Extrakulikuler',
                'slug' => 'extrakulikuler'
            ],
        ];

        foreach ($categoryImages as $categoryImage) {
            CategoryImage::create($categoryImage);
        }
    }
}
