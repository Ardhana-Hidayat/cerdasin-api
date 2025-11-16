<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Quiz extends Model
{
    protected $fillable = ['classroom_id', 'title', 'description'];
    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function myScore()
    {
        return $this->hasOne(Score::class)->where('user_id', Auth::id());
    }
}