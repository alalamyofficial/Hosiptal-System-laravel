<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [

        'title',
        'image',
        'bio',
        'type'

    ];
}
