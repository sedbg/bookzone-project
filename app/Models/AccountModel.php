<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccountModel extends Model
{
    protected $table = 'users';
    protected $guarded = [];

    protected $fillable = [
        'firstname', 'lastname', 'email', 'username', 'password'
    ];
}
