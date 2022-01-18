<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;
use Laravel\Sanctum\HasApiTokens;

class Client extends Authenticable
{
    use HasApiTokens;

    protected $fillable = [
        'name', 'email', 'password'
    ];
}
