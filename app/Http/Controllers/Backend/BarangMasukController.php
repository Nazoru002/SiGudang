<?php

namespace App\Http\Controllers\Backend;

use App\BarangMasukDetail;
use App\BarangMasukHeader;
use App\Http\Controllers\Controller;
use App\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.transaksi.barang-masuk.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      try {
        DB::beginTransaction();

        $header = BarangMasukHeader::firstOrCreate([
          'tgl_brg_masuk' => $request->tgl_brg_masuk,
          'asal_barang' => $request->asal_barang,
          'penginput' => auth()->user()->id
        ]);
        
        foreach ($request->stuff_id as $key => $value) {
          $detail = BarangMasukDetail::firstOrCreate([
            'header_id' => $header->id,
            'stuff_id' => $value,
            'qty' => $request->qty[$key]
          ]);

          $stok = Stock::where('stuff_id', '=', $value)->firstOrFail();
          $stok->update([
            'stock_in' => $stok->stock_in+$request->qty[$key]
          ]);
        }

        DB::commit();

        return redirect(route('backend.barang-masuk'));

      } catch (\Exception $e) {
        DB::rollback();
        dd($e);
      } 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
