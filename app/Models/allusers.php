<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class allusers extends Model
{
    use HasFactory;

    protected $table = 'allusers';
    protected $fillable = [
        'username',
        'profile_image',
        'phonecode',
        'phone',
        'password',
        'bloodgroup',
        'role',
        'country',
        'state',
        'city',
        'address',
    ];
    // protected $attributes = [
    //     'profile_image' => 'images/user.png', // Set the default image path and folder
    // ];
    
}
