<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Jaidth Veas',
            'email' => 'Jaidth.Veas@gmail.com',
            'password' => Hash::make('password')
        ])->assignRole('Admin');

        User::create([
            'name' => 'Nickolas Fuenzalida',
            'email' => 'Nickolas.F@gmail.com',
            'password' => Hash::make('password')
        ])->assignRole('Admin');

        User::create([
            'name' => 'Victor Vera',
            'email' => 'Victor.V@gmail.com',
            'password' => Hash::make('password')
        ])->assignRole('Admin');

        User::create([
            'name' => 'Tommy Ayala',
            'email' => 'Tommy.A@gmail.com',
            'password' => Hash::make('password')
        ])->assignRole('User');

        User::create([
            'name' => 'Miriam Alarcon',
            'email' => 'Miriam.M@gmail.com',
            'password' => Hash::make('password')
        ])->assignRole('User');

        User::create([
            'name' => 'Mario Cepeda',
            'email' => 'Mario.C@gmail.com',
            'password' => Hash::make('password')
        ])->assignRole('User');

        User::create([
            'name' => 'Ruperto Hidalgo',
            'email' => 'Ruperto.H@gmail.com',
            'password' => Hash::make('password')
        ])->assignRole('User');
    }
}
