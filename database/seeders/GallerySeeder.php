<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $galleries = [
            [
                'title' => 'Foto 1',
                'slug' => 'foto-1',
                'category_image_id' => '1',
            ],
            [
                'title' => 'Foto 2',
                'slug' => 'foto-2',
                'category_image_id' => '2',
            ],
            [
                'title' => 'Foto 3',
                'slug' => 'foto-3',
                'category_image_id' => '3',
            ],
            [
                'title' => 'Foto 4',
                'slug' => 'foto-4',
                'category_image_id' => '4',
            ],
            [
                'title' => 'Foto 5',
                'slug' => 'foto-5',
                'category_image_id' => '1',
            ],
            [
                'title' => 'Foto 6',
                'slug' => 'foto-6',
                'category_image_id' => '2',
            ],
            [
                'title' => 'Foto 7',
                'slug' => 'foto-7',
                'category_image_id' => '3',
            ],
            [
                'title' => 'Foto 8',
                'slug' => 'foto-8',
                'category_image_id' => '4',
            ],
        ];
        
        foreach ($galleries as $gallery) {
            Gallery::create($gallery);
        }
    }
}
