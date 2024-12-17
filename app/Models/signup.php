<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class Signup extends Authenticatable
{
    use HasApiTokens;
    protected $table = 'signups';

    
    protected $fillable = [
        'first_name',
        'last_name',
        'date_of_birth',
        'gender',
        'country',
        'email',
        'password',
    ];

   
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
