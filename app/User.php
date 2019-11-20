<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'email', 'username', 'realname', 'rank', 'birthday', 'phone', 'password'
    ];
}
