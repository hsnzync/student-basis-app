<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    public $table = 'subject';

    protected $fillable = [
        'is_completed', 
        'is_unlocked', 
        'is_active', 
        'user_id', 
        'title', 
        'slug', 
        'description', 
        'level',
        'programme_id'
    ];

    public function programme()
    {
        return $this->belongsTo('App\Models\Programme', 'programme_id', 'id');
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
