<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Mail extends Model
{

    use Notifiable;


    protected $fillable = [

        'message',
        'name',
        'email',
        'subject',

    ];
}
