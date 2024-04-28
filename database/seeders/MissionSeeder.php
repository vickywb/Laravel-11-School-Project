<?php

namespace Database\Seeders;

use App\Models\Mission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $missions = [
            [
                'mission' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.'
            ],
            [
                'mission' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.'
            ],
            [
                'mission' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.'
            ],
            [
                'mission' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.'
            ],
            [
                'mission' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.'
            ]
        ];

        foreach ($missions as $mission) {
            Mission::create($mission);
        }
    }
}
