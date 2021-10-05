<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLapanganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lapangan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('pengelola_id');
            $table->string('nama_lapangan');
            $table->string('kategori');
            $table->string('gambar');
            $table->integer('no_lapangan');
            $table->string('jenis_lapangan');
            $table->time('waktu_lapangan');
            $table->integer('harga_sewa_perjam');
            $table->string('alamat');
            $table->string('status_ketersediaan');
            $table->double('rating')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('pengelola_id')->references('id')->on('pengelola')
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
        Schema::dropIfExists('lapangan');
    }
}
