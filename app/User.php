<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'email', 'username', 'legal_name', 'gender', 'birthday', 'phone', 'line_id', 'password'
    ];
}
