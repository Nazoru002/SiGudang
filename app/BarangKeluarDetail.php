<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BarangKeluarDetail extends Model
{
    protected $fillable = [
      'header_id',
      'stuff_id',
      'qty'
    ];
}
