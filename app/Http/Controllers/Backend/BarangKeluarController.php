<?php

namespace App\Http\Controllers\Backend;

use App\BarangKeluarDetail;
use App\BarangKeluarHeader;
use App\Http\Controllers\Controller;
use App\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangKeluarController extends Controller
{
    public function index()
    {
      return view('backend.transaksi.barang-keluar.index');
    }

    public function store(Request $request)
    {
      try {
        DB::beginTransaction();

        $header = BarangKeluarHeader::firstOrCreate([
          'tgl_brg_keluar' => $request->date,
          'tujuan_keluar' => $request->tujuan_keluar,
          'penginput' => auth()->user()->id
        ]);
        
        foreach ($request->stuff_id as $key => $value) {
          $detail = BarangKeluarDetail::firstOrCreate([
            'header_id' => $header->id,
            'stuff_id' => $value,
            'qty' => $request->qty[$key]
        ]);

        $stok = Stock::where('stuff_id', '=', $value)->firstOrFail();
        $stok->update([
          'stock_out' => $stok->stock_out+$request->qty[$key]
        ]);
      }

      DB::commit();

      return redirect(route('backend.barang-masuk'));

      } catch (\Exception $e) {
        DB::rollback();
        dd($e);
      }
      
    }
}
