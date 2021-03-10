<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BarangKeluarHeader extends Model
{
    protected $fillable = [
      'tgl_brg_keluar',
      'tujuan_keluar',
      'penginput'
    ];
}
