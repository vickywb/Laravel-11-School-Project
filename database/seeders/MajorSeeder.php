<?php

namespace Database\Seeders;

use App\Models\Major;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MajorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $majors = [
            [
                'title' => 'Akuntansi',
                'slug' => 'akuntansi',
                'description' => '
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quia facilis, fugit, 
                    nostrum unde et veritatis molestias ut obcaecati aperiam accusantium, tempora maxime. Odit velit quos, 
                    vero corrupti atque ipsam nemo libero eos dolore ipsum quisquam labore ullam aliquid.
                    vel repellat tenetur voluptas esse ratione, tempora qui unde. Aperiam, omnis saepe?
                '
            ],
            [
                'title' => 'Multimedia',
                'slug' => 'multimedia',
                'description' => '
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quia facilis, fugit, 
                    nostrum unde et veritatis molestias ut obcaecati aperiam accusantium, tempora maxime. Odit velit quos, 
                    vero corrupti atque ipsam nemo libero eos dolore ipsum quisquam labore ullam aliquid.
                    vel repellat tenetur voluptas esse ratione, tempora qui unde. Aperiam, omnis saepe?
                '
            ],
            [
                'title' => 'Perhotelan',
                'slug' => 'perhotelan',
                'description' => '
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quia facilis, fugit, 
                    nostrum unde et veritatis molestias ut obcaecati aperiam accusantium, tempora maxime. Odit velit quos, 
                    vero corrupti atque ipsam nemo libero eos dolore ipsum quisquam labore ullam aliquid.
                    vel repellat tenetur voluptas esse ratione, tempora qui unde. Aperiam, omnis saepe?
                '
            ]
        ];

        foreach ($majors as $major) {
            Major::create($major);
        }
    }
}
