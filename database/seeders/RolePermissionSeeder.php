<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Permissions
        $permissions = [
            'view_dashboard',
            'manage_users',
            'manage_roles',
            'view_reports',
            'upload_reports',
        ];
         foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Roles
        $admin  = Role::firstOrCreate(['name' => 'admin']);
        $doctor = Role::firstOrCreate(['name' => 'doctor']);
        $user   = Role::firstOrCreate(['name' => 'user']);

        // Assign permissions
        $admin->givePermissionTo(Permission::all());

        $doctor->givePermissionTo([
            'view_dashboard',
            'view_reports',
            'upload_reports',
        ]);

        $user->givePermissionTo([
            'view_dashboard',
            'view_reports',
        ]);
    }
    }

