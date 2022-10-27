<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\Professor;
use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $professor = Professor::find(1);
        foreach (Subject::all() as $subject) {
            Group::create([
                'subject_id' => $subject->id,
                'professor_id' => $professor->id
            ]);
        }
    }
}
