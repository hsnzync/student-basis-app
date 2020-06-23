<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

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
        'student_number',
        'avatar',
        'password',
        'level',
        'experience_points',
        'is_active',
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

    /**
     * Scope for selecting users with a specific role
     *
     * @param  QueryBuilder $query
     * @param  String $role
     * @return QueryBuilder $query
     */
    public function scopeHasRole($query, $role)
    {
        return auth()->user()->roles->first()->slug == $role;
    }

     /**
     * Get the fullname attribute of a user
     * @return string
     */
    public function getFullNameAttribute() : string
    {
        if($this->name) {
            return $this->name;
        }
        return $this->first_name .' '. $this->last_name;
    }
}
