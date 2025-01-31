<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RolePermissionSeeder::class,
            UserSeeder::class,
            CategorySeeder::class,
            ArticleSeeder::class,
            MajorSeeder::class,
            TeacherSeeder::class,
            StudentSeeder::class,
            FieldofWorkSeeder::class,
            LearnedMaterialSeeder::class,
            MissionSeeder::class,
            VisionSeeder::class,
            CategoryImageSeeder::class,
            GallerySeeder::class,
            HeroPageSeeder::class
        ]);
    }
}
