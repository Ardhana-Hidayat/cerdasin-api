<?php

namespace Database\Seeders;

use App\Models\Classroom;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Classroom::create(['name' => 'Kelas 1']);
        Classroom::create(['name' => 'Kelas 2']);
        Classroom::create(['name' => 'Kelas 3']);
        Classroom::create(['name' => 'Kelas 4']);
        Classroom::create(['name' => 'Kelas 5']);
        Classroom::create(['name' => 'Kelas 6']);
    }
}
