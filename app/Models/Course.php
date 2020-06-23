<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use SoftDeletes;

    public $table = 'course';

    protected $fillable = [
        'slug',
        'title',
        'points',
        'subject_id'
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
