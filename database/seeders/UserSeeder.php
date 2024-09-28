<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{

    protected static ? string $password;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'kevin',
            'email'=> 'kevin@gmail.com',
            'password'=> bcrypt('laptop'),
            // 'role' => 1
            // 'role' => TRUE
            'is_admin' => TRUE
        ]);

        User::create([
            'name' => 'mira',
            'email'=> 'mira@gmail.com',
            'password' => static::$password ??= Hash::make('password'),
            // 'role' => 0
            // 'role' => FALSE
            'is_admin' => FALSE
        ]);

        // 'password' => Hash::make('password'),


        User::factory(3)->create();
    }
}
