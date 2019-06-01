<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public $table = 'course';

    protected $fillable = [
        'slug', 
        'title', 
        'description', 
        'image_url', 
        'subject_id',
        'is_unlocked',
        'is_completed'
    ];

    public function subject()
    {
        return $this->belongsTo('App\Models\Subject', 'subject_id', 'id');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
