<?php

namespace Database\Seeders;

use App\Models\Teacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teachers = [
            [
                'name' => 'Sri Astuti, S.Pd.',
                'field_of_study' => 'Matematika',
                'address' => 'Jl. Pisang no.2',
                'phone_number' => '0855214142',
            ],
            [
                'name' => 'Hadi Iskandar, S. Kom',
                'field_of_study' => 'Multimedia',
                'address' => 'Jl. Apukad no.2',
                'phone_number' => '0855214142',
            ],
            [
                'name' => 'Ambarwati, MM',
                'field_of_study' => 'Akuntansi',
                'address' => 'Jl. Nangka no.2',
                'phone_number' => '0855214142',
            ],
            [
                'name' => 'Abdul Kurniawan, S.Pd. I',
                'field_of_study' => 'Pendidikan Agama Islam',
                'address' => 'Jl. Naga no.2',
                'phone_number' => '0855214142',
            ],
        ];

        foreach ($teachers as $teacher) {
            Teacher::create($teacher);
        }
    }
}
