<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::create([
            'name'              => 'Williams W. Alvarez',
            'email'             => 'willdev2@gmail.com',
            'password'          => Hash::make('12345678'),
            'email_verified_at' => now(),
            'remember_token'    => \Illuminate\Support\Str::random(10),

        ]);

        User::create([
            'name'              => 'Laura Peredo Dorado',
            'email'             => 'laudev2@gmail.com',
            'password'          => Hash::make('12345678'),
            'email_verified_at' => now(),
            'remember_token'    => \Illuminate\Support\Str::random(10),

        ]);
    }
}
