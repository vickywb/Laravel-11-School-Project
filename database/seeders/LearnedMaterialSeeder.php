<?php

namespace Database\Seeders;

use App\Models\LearnedMaterial;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LearnedMaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $learnedMaterials = [
            [
                'major_id' => 1,
                'title' => 'Lorem ipsum dolor sit amet.'
            ],
            [
                'major_id' => 2,
                'title' => 'Lorem ipsum dolor sit amet.'
            ],
            [
                'major_id' => 3,
                'title' => 'Lorem ipsum dolor sit amet.'
            ],
        ];

        foreach ($learnedMaterials as $learnedMaterial) {
            LearnedMaterial::create($learnedMaterial);
        }
    }
}
