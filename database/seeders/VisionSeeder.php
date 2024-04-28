<?php

namespace Database\Seeders;

use App\Models\Vision;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $visions = [
            [
                'vision' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat vel molestias dolore atque rerum omnis, at amet tempora, aliquam est incidunt minima! Voluptates, modi aperiam qui sed recusandae molestiae iure consectetur. Molestias ratione cum aperiam culpa necessitatibus, quo magnam autem.'
            ]
        ];
        
        foreach ($visions as $vision) {
            Vision::create($vision);
        }
    }
}
