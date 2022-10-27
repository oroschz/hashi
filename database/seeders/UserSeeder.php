<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\Program;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory()->make();
        $user->save();
        
        $user->programs()->attach(Program::find(1));
        foreach (Group::all() as $group) {
            $user->groups()->attach($group);
        }
    }
}
