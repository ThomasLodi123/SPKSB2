<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $admin = Role::firstOrCreate([
        //     'name' => 'admin',
        //     'display_name' => 'Administrator', // optional
        // ]);

        // $owner = Role::create([
        //     'name' => 'owner',
        //     'display_name' => 'Owner', // optional
        // ]);

        // $staff = Role::create([
        //     'name' => 'staff',
        //     'display_name' => 'Staff', // optional
        // ]);

        // $user = User::firstOrCreate([
        //     'name' => 'admin',
        //     'email' => 'admin@gmail.com',
        //     'password' => Hash::make('admin123')
        // ]);
        // $user = User::find(1);

        // $user->addRole('admin');

        $owner = User::create([
            'name' => 'owner',
            'email' => 'owner@gmail.com',
            'password' => Hash::make('admin123')
        ]);

        $owner->addRole('owner');

        $staff = User::create([
            'name' => 'staff',
            'email' => 'staff@gmail.com',
            'password' => Hash::make('admin123')
        ]);

        $staff->addRole('staff');
    }
}
