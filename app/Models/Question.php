<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public $table = 'question';

    protected $fillable = [
        'title', 'description', 'hint',
    ];
    
}
