<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public $table = 'course';

    protected $fillable = [
        'slug', 'title', 'description', 'image_url', 'subject_id',
    ];

    public function subject()
    {
        return $this->belongsTo('App\Models\Subject', 'subject_id', 'id');
    }
}
