<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Operation;

class Nurse extends Model
{
    protected $fillable = [

        'first_name',
        'last_name',
        'email',
        'date_of_birth',
        'gender',
        'phone_number',
        'image',
        'country',
        'city',
        'cv',
        'age',
        'bio',
        'start',
        'end',
        'department_id'

    ];

    protected $table = 'nurses';


    public function departments(){

        return $this->belongsTo(Department::class,'department_id');

    }

    public function appointments(){

        return $this->hasMany(BookAppointment::class);

    }
    public function operations()
    {
        return $this->belongsToMany('App\Operation','operation_id');
    }


}
