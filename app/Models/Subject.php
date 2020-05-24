<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends Model
{
    use SoftDeletes;

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
    ];

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

}
