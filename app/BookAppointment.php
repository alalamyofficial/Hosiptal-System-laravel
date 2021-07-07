<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Notifications\AgendamentoPendente;
use App\User;

class BookAppointment extends Model
{

    use Notifiable;

    protected $fillable = [

        'name' ,
        'gender' ,
        'area_code' ,
        'phone_number' ,
        'date_of_birth' ,
        'patient_address' ,
        'country' ,
        'city' ,
        'address' ,
        'zip_code' ,
        'email' ,
        'doctor_id' ,
        'user_id',
        'status'
        // 'appointment',
        // 'start' ,

    ];


    public function doctors(){

        return $this->belongsTo(Doctor::class,'doctor_id');

    }

    public function users(){

        return $this->belongsTo(User::class,'user_id');

    }

}
