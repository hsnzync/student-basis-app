<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class School extends Model
{
    use SoftDeletes;

    public $table = 'school';

    protected $fillable = [
        'is_active',
        'title',
        'location',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
