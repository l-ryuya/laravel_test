<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Staff extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\StaffFactory> */
    use HasFactory;

    protected $fillable = [
        'unique_id',
        'last_name',
        'first_name',
        'email',
        'password',
    ];
}
