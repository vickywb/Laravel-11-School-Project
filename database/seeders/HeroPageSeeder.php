<?php

namespace Database\Seeders;

use App\Models\HeroPage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HeroPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $heroPage = HeroPage::create([
            'title' => 'SMK 99',
            'description' => 'Jalan Jeruk no. 99'
        ]);
    }
}
