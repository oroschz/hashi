<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subject::create(['name' => 'Matemáticas I']);
        Subject::create(['name' => 'Matemáticas Discretas']);
        Subject::create(['name' => 'Biología']);
        Subject::create(['name' => 'Lógica y Programación']);
        Subject::create(['name' => 'Introducción a la Ingeniería']);
    }
}
