<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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

    protected function getThumbnailUrlAttribute(): ?string
    {
        if ($this->thumbnail) {
            return asset('storage/' . $this->thumbnail);
        }
        return null;
    }


    protected function getFilePathUrlAttribute(): ?string
    {
        if ($this->file_path) {
            return asset('storage/' . $this->file_path);
        }
        return null;
    }
    
    protected $appends = [
        'thumbnail_url', 
        'file_path_url'
    ];
}