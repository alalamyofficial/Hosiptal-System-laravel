<?php

namespace App;
use App\Doctor;
use App\DoctorSchedule;
use App\Department;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [

        'name','start','end'
    ];

    public function doctors(){

        return $this->hasMany(Doctor::class,'doctor_id');

    }

    public function schedules(){

        return $this->hasMany(Department::class,'department_id');

    }

}
