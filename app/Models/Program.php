<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->belongsToMany(User::class, 'programs_users', 'program_id', 'user_id');
    }
}
