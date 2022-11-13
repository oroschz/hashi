<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'group_id',
        'user_id',
        'question_id',
        'value'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'user_id',
        'group_id'
    ];

    public function user()
    {
        $this->belongsTo(User::class);
    }
}
