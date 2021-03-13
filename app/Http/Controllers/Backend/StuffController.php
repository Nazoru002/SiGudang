<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Stuff;
use Illuminate\Http\Request;
use PDF;

class StuffController extends Controller
{
    public function index()
    {
        return view('backend.barang.index');
    }

    public function print()
    {
        $date = date('Y-m-d H:i:s');
        $barang = Stuff::orderBy('created_at', 'DESC')->get();
        $pdf = PDF::loadview('backend.laporan.barang', ['barang' => $barang, 'date' => $date]);
        return $pdf->stream();
    }
}
