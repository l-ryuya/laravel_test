<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class EndUser extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\EndUserFactory> */
    use HasFactory;

    protected $fillable = [
        'last_name',
        'first_name',
        'email',
        'password',
    ];
}
