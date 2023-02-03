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
            $table->foreignId('user_id');
            $table->foreignId('proposal_id');
            $table->foreignId('kartu_piutang_id');
            $table->enum('bank',['mandiri','bri']);
            $table->date('tgl');
            $table->string('bulan',20);
            $table->string('foto');
            $table->integer('jumlah');
            $table->integer('status')->nullable();
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
