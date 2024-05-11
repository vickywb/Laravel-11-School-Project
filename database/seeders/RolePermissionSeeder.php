<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name'=> 'create']);
        Permission::create(['name'=> 'edit']);
        Permission::create(['name'=> 'delete']);
        Permission::create(['name'=> 'show']);

        Role::create(['name'=> 'superadmin']);
        Role::create(['name'=> 'admin']);
        Role::create(['name'=> 'teacher']);

        $roleAdmin = Role::findByName('superadmin');
        $roleAdmin->givePermissionTo(Permission::all());

        $roleEditor = Role::findByName('admin');
        $roleAdmin->givePermissionTo(Permission::all());
        
        $roleEditor = Role::findByName('teacher');
        $roleEditor->givePermissionTo('edit');
        $roleEditor->givePermissionTo('show');
    }
}
