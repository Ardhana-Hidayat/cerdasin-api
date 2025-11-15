<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::where('email', 'guru@cerdasin.com')->delete();
        
        User::create([
            'name' => 'Budi Guru',
            'email' => 'guru@cerdasin.com',
            'password' => Hash::make('password'),
            'role' => 'teacher', 
        ]);

        User::where('email', 'siswa1@cerdasin.com')->delete();
        User::where('email', 'siswa2@cerdasin.com')->delete();

        User::create([
            'name' => 'Akbar',
            'email' => 'siswa1@cerdasin.com',
            'password' => Hash::make('password'), 
            'role' => 'student', 
        ]);

        User::create([
            'name' => 'Rozzy',
            'email' => 'siswa2@cerdasin.com',
            'password' => Hash::make('password'),
            'role' => 'student',
        ]);
    }
}
