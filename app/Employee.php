<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable =[

        'name',
        'email',
        'date_of_birth',
        'gender',
        'phone_number',
        'image',
        'country',
        'city',
        'age',
        'role',
        'bio',

    ];

}
