<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class donorspost extends Model
{
    use HasFactory;
  protected $table = 'donorspost';
  protected $fillable = [
    'userid',
    'username',
    'userprofile',
    'phonecode',
    'phone',
    'bloodgroup',
    'available',
    'donorstatus',
    'country',
    'state',
    'city',
    'lasttimedonated',
    'description',
];


}
