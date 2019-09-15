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

    /**
    * Saving roles to a specific user
    *
    * @param  Array $roles array of strings, with the role slug per string
    */
    public function attachRolesToUser($roles) 
    {
        $this->addRoles($roles);
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
        return $query->whereHas('roles', function($query_role) use ($role) {
            $query_role->where('slug', $role);
        });
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