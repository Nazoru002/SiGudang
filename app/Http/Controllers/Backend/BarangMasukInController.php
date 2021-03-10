<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BarangMasukInController extends Controller
{
    public function index()
    {
        return view('backend.transaksi.barang-masuk.index');
    }
}
