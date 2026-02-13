<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $admin = User::firstOrCreate(
            ['email' => 'munazzahchugtai@gmail.com'],
            [
                'name' => 'Munazzah Chugtai',
                'password' => Hash::make('123456789')
            ]
        );

        $admin->assignRole('admin');
    }
    }

