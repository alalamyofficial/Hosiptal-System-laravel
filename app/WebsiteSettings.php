<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WebsiteSettings extends Model
{
    protected $fillable = [

        'website_name','website_image','about'

    ];

}
