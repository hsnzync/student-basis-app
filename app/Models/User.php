<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    public $table = 'user';
    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'student_number',
        'image_url',
        'password',
        'level',
        'experience_points',
        'is_active',
        
        'programme_id',
        'school_id',
    ];

    protected $hidden = [
        'password', 
        'remember_token',
    ];

    public function school()
    {
        return $this->belongsTo(School::class, 'school_id');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_role')->withPivot('user_id');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
