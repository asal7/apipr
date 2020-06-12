<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parts extends Model
{
    protected $table = 'parts';
    protected $fillable = [
        'name', 'description',
    ];
}
