<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('lapangan_id');
            $table->date('tanggal_transaksi');
            $table->integer('lama_waktu_main');
            $table->string('keterangan_waktu_main');
            $table->integer('total_pembayaran');
            $table->string('bukti_pembayaran');
            $table->string('status');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('customer')
            ->onUpdate('cascade')
            ->onDelete('cascade');


            $table->foreign('lapangan_id')->references('id')->on('lapangan')
            ->onUpdate('cascade')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('booking');
    }
}
