<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Doctor;
use App\Nurse;
use App\Patient;

class Operation extends Model
{
    protected $fillable = [

        'patient',
        'operation_type',
        'country',
        'city',
        'address',
        'price',
        'start',
        'end',
        'department_id',
        'doctor',
        'nurse' ,

    ];

    // protected $casts = [

    //     'doctor'=> 'array',
    //     'nurse' => 'array',

    // ];

    public function doctors()
    {
        return $this->belongsToMany('App\Doctor','doctor_id');
    }

    public function nurses()
    {
        return $this->belongsToMany('App\Nurse');
    }

    public function patients()
    {
        return $this->belongsToMany('App\Patient');
    }

    public function departments(){

        return $this->belongsTo(Department::class,'department_id');
    }


}

