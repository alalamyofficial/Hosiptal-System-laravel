<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Operation;

class Patient extends Model
{
    protected $fillable = [

        'name','email','phone_number','disease_type','gender'

    ]; 

    public function operations()
    {
        return $this->belongsToMany('App\Patient','operation_id');
    }


}
