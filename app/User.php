<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',   
    ];

    public $quantity;
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function appointments(){

        return $this->hasMany(BookAppointment::class,'user_id');

    }

    public function ambulances(){

        return $this->hasMany(Ambulance::class,'user_id');

    }

    
    public function vaccines(){

        return $this->hasMany(Vaccine::class,'user_id');

    }

}
