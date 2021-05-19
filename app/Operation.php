<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Doctor;
use App\Nurse;
use App\Patient;

class Operation extends Model
{
    protected $fillable = [

        // 'doctor_id',
        // 'nurse_id',
        // 'patient_id',
        'country',
        'city',
        'address',
        'price',
        'start',
        'end',

    ];

    public function doctors()
    {
        return $this->belongsToMany('App\Doctor');
    }

    public function nurses()
    {
        return $this->belongsToMany('App\Nurse');
    }

    public function patients()
    {
        return $this->belongsToMany('App\Patient');
    }


}

