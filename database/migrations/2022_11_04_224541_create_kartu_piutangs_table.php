<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKartuPiutangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kartu_piutangs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pengajuan_id');
            $table->date('tgl_penyaluran')->nullable();
            $table->integer('pinjaman');
            $table->string('no_kontrak')->nullable();
            $table->float('sb_thn')->nullable();
            $table->float('sb_bln', 8,3)->nullable();
            $table->integer('waktu')->nullable();
            $table->integer('jmlhpokok')->nullable();
            $table->integer('jmlhjasa')->nullable();
            $table->integer('totkp')->nullable();
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
        Schema::dropIfExists('kartu_piutangs');
    }
}
