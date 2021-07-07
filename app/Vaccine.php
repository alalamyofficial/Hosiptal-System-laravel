<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vaccine extends Model
{
    protected $fillable = [

        'name',
        'email',
        'phone_number',
        'country',
        'city',
        'age',
        'gender',
        'user_id',
        'status'

    ];

    
    public function users(){

        return $this->belongsTo(User::class,'user_id');

    }
}
