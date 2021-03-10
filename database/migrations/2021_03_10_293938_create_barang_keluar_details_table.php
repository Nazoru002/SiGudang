<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangKeluarDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang_keluar_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('header_id');
            $table->foreign('header_id')->references('id')->on('barang_keluar_headers');
            $table->unsignedBigInteger('stuff_id');
            $table->foreign('stuff_id')->references('id')->on('stuffs');
            $table->double('qty');
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
        Schema::dropIfExists('barang_keluar_details');
    }
}
