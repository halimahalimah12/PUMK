<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kartu_piutang_id')->nullable();
            $table->enum('bank',['mandiri','bri'])->nullable();
            $table->date('tgl')->nullable();
            $table->string('foto');
            $table->integer('jumlah');
            $table->integer('pokok');
            $table->integer('jasa');
            $table->integer('bulan');
            $table->enum('status',['menunggu','valid','tidak'])->default('menunggu');
            $table->string('ket')->nullable();
            $table->integer('total_pem')->nullable();
            // $table->integer('sisa')->nullable();
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
        Schema::dropIfExists('pembayarans');
    }
}
