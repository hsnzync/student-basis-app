<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    public $table = 'status';

    protected $fillable = [
        'name',
    ];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
