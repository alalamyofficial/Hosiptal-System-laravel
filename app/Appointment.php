<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
 
    protected $fillable = [


        'patient_id',
        'doctor_id',
        'department_id',
        'start' ,
        'end' ,
        'patient_email' ,
        'patient_phone' ,
        'message' ,
        'age','date'
    ];

    public function doctors(){

        return $this->belongsTo(Doctor::class,'doctor_id');

    }
    
    public function patients(){

        return $this->belongsTo(Patient::class,'patient_id');

    }

    public function departments(){

        return $this->belongsTo(Department::class,'doctor_id');

    }
}
