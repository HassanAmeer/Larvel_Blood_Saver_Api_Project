<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class appsettings extends Model
{
    use HasFactory;
    protected $table = 'appsettings';
    protected $fillable = [
              'shareablelink',
              'apppackageid'

    ];
}
