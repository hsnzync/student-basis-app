<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Programme extends Model
{
    public $table = 'programme';

    protected $fillable = [
        'is_active',
        'title',
        'description' ,
        'slug',
        'image_url',
    ];

    public function school() {
        return $this->belongsTo(School::class);
    }

    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    
    public function getRouteKeyName()
    {
        return 'slug';
    }
}