<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'remember_token' => rand(10,50),
        ]);

        $user = User::create([
            'name' => 'Ahmad Mizan Setiawan',
            'username' => '19041081',
            'email' => 'mizan@gmail.com',
            'password' => bcrypt('siswa1'),
            'remember_token' => rand(10,50),
        ]);


        // A role can be assigned to any user:
        $admin->assignRole('admin');
        $user->assignRole('siswa');
    }
}
