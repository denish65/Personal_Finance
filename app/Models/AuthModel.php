<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AuthModel extends Model
{
    //
    protected $fillable = ['_token','is_superadmin','firstname','lastname','email' ,'phone', 'city','state','country','age','password','confirmpassword' ];

    protected $table ='auth';
}
