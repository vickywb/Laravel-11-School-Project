<?php

namespace Database\Seeders;

use App\Models\FieldOfWork;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FieldofWorkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fieldOfWorks = [
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

        foreach ($fieldOfWorks as $fieldOfWork) {
            FieldOfWork::create($fieldOfWork);
        }
    }
}
