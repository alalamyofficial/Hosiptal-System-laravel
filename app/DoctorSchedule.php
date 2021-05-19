<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Doctor;
use App\Department;

class DoctorSchedule extends Model
{
    protected $fillable = [

        'doctor_id',
        'department_id', 
        'days_work',
        'holiday',
        'start_id',
        'end_id',

    ];

    public function doctors(){

        return $this->belongsTo(Doctor::class,'doctor_id');

    }
    public function departments(){

        return $this->belongsTo(Department::class,'department_id');

    }

}
