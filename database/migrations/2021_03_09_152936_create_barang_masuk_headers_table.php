<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangMasukHeadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang_masuk_headers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('tgl_brg_masuk');
            $table->text('asal_barang');
            $table->unsignedBigInteger('penginput');
            $table->foreign('penginput')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barang_masuk_headers');
    }
}
