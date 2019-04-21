<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    public $table = 'school';

    protected $fillable = [
        'is_active',
        'title',
        'location',
        'slug',
        'image_url',
    ];

    public function programmes()
    {
        return $this->hasMany(Programme::class);
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
