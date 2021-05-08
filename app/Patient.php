<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [

        'name','email','phone_number','disease_type','gender'

    ]; 
}
