<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ambulance extends Model
{
    protected $fillable = [

        'name',
        'email',
        'phone_number',
        'country',
        'city',
        'age',
        'gender',

    ];
}
