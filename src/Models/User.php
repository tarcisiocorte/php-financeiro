<?php

namespace TCCP\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //Mass Assignment
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password'
    ];
}