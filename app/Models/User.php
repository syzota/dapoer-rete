<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'users';

    protected $fillable = [
        'name',
        'password',
        'role',
        'id_cabang',
    ];

    public $timestamps = false;

    protected $hidden = [
        'password',
    ];
}