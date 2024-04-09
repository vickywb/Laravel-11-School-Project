<?php

namespace Database\Seeders;

use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = [
            [
                'name' => 'aditya',
                'nisn' => '12345678910',
                'gender' => 'laki-laki',
                'place_of_birth' => 'surabaya',
                'date_of_birth' => '01-01-2024',
                'religion' => 'islam',
                'address' => 'Jl. Jeruk no.255',
                'phone_number' => '08111111',
                'origin_of_school' => 'smp 1 surabaya',
                'address_of_school' => 'Jl. Jambu no.1',
                'father_name' => 'bambang',
                'mother_name' => 'astuti',
                'father_job' => 'swasta',
                'mother_job' => 'ibu rumah tangga',
                'phone_number_parent' => '08111111'
            ],
            [
                'name' => 'bisma',
                'nisn' => '12345678910',
                'gender' => 'laki-laki',
                'place_of_birth' => 'surabaya',
                'date_of_birth' => '01-01-2024',
                'religion' => 'kristen',
                'address' => 'Jl. Apel no.255',
                'phone_number' => '08111111',
                'origin_of_school' => 'smp 2 surabaya',
                'address_of_school' => 'Jl. Jambu no.1',
                'father_name' => 'satrio',
                'mother_name' => 'maulida',
                'father_job' => 'swasta',
                'mother_job' => 'ibu rumah tangga',
                'phone_number_parent' => '08111111'
            ],
            [
                'name' => 'mustika',
                'nisn' => '12345678910',
                'gender' => 'perempuan',
                'place_of_birth' => 'surabaya',
                'date_of_birth' => '01-01-2024',
                'religion' => 'buddha',
                'address' => 'Jl. Durian no.255',
                'phone_number' => '08111111',
                'origin_of_school' => 'smp 3 surabaya',
                'address_of_school' => 'Jl. Jambu no.1',
                'father_name' => 'maulana',
                'mother_name' => 'naura',
                'father_job' => 'swasta',
                'mother_job' => 'ibu rumah tangga',
                'phone_number_parent' => '08111111'
            ],
            [
                'name' => 'nadya',
                'nisn' => '12345678910',
                'gender' => 'perempuan',
                'place_of_birth' => 'surabaya',
                'date_of_birth' => '01-01-2024',
                'religion' => 'konghucu',
                'address' => 'Jl. Salak no.255',
                'phone_number' => '08111111',
                'origin_of_school' => 'smp 4 surabaya',
                'address_of_school' => 'Jl. Jambu no.1',
                'father_name' => 'tejo',
                'mother_name' => 'surti',
                'father_job' => 'swasta',
                'mother_job' => 'ibu rumah tangga',
                'phone_number_parent' => '08111111'
            ],
            [
                'name' => 'reza',
                'nisn' => '12345678910',
                'gender' => 'laki-laki',
                'place_of_birth' => 'surabaya',
                'date_of_birth' => '01-01-2024',
                'religion' => 'hindu',
                'address' => 'Jl. Manggis no.255',
                'phone_number' => '08111111',
                'origin_of_school' => 'smp 5 surabaya',
                'address_of_school' => 'Jl. Jambu no.1',
                'father_name' => 'paijo',
                'mother_name' => 'paijem',
                'father_job' => 'swasta',
                'mother_job' => 'ibu rumah tangga',
                'phone_number_parent' => '08111111'
            ]
        ];

        foreach ($students as $student) {
            Student::create($student);
        }
    }
}
