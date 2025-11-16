<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $fillable = [
        'classroom_id',
        'title',
        'material',
        'thumbnail',
        'file_path',
    ];

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }
}