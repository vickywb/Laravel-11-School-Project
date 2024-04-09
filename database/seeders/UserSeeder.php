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
        $admin = User::create([
            "name"  => "superadmin",
            "email" => "superadmin@email.com",
            "password"  => Hash::make("secret"),
        ]);
        $admin->assignRole("superadmin");

        $editor = User::create([
            "name"  => "admin",
            "email" => "admin@email.com",
            "password"  => Hash::make("secret"),
        ]);
        $editor->assignRole("admin");
    }
}
