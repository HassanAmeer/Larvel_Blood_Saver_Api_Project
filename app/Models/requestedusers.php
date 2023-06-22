<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class requestedusers extends Model
{
    use HasFactory;
    protected $table = 'requestedusers';
    protected $fillable = [
      'requserid',
      'requsername',
      'requserprofile',
      'requserphone',
      'requserloc',
      'donoruserid',
      'donorusername',
      'donoruserprofile',
      'donoruserphone',
      'donoruserloc',
      'donatedstatus',
      'lasttimedonated',
  ];
}
