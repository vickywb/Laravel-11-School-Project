<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superadmin = User::create([
            "name"  => "superadmin",
            "email" => "superadmin@email.com",
            "password"  => Hash::make("secret"),
        ]);
        $superadmin->assignRole("superadmin");

        $admin = User::create([
            "name"  => "admin",
            "email" => "admin@email.com",
            "password"  => Hash::make("secret"),
        ]);
        $admin->assignRole("admin");

        $teacher = User::create([
            "name"  => "admin",
            "email" => "teacher@email.com",
            "password"  => Hash::make("secret"),
        ]);
        $teacher->assignRole("teacher");
    }
}
