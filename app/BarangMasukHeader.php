<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BarangMasukHeader extends Model
{
    protected $fillable = [
      'tgl_brg_masuk',
      'asal_barang',
      'penginput'
    ];
}