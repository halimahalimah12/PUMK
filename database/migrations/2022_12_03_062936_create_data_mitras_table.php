<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataMitrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_mitras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('data_ush_id');
            $table->string('nm',60);
            $table->string('tpt_lhr',60)->nullable();
            $table->date('tgl_lhr')->nullable();
            $table->enum('sts_prk',['belum','kawin','cerhidup','cermati'])->nullable();
            $table->enum('jk',['L','P'])->nullable();
            $table->text('bangsa')->default('indonesia');
            $table->text('almt')->nullable();
            $table->string('kel',60)->nullable();
            $table->string('kec',60)->nullable();
            $table->string('kab',60)->nullable();
            $table->string('no_hp')->nullable();
            $table->string('no_ktp')->nullable();
            $table->date('tgl_ktp')->nullable();
            $table->enum('pddk',['SD','SMP','SMA','D1','D2','D3','S1','S2','S3'])->nullable();
            $table->string('kursus',60)->nullable();
            $table->string('jbt',60)->nullable();
            $table->string('foto',60)->nullable();
            $table->string('scanktp',60)->nullable();
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
        Schema::dropIfExists('data_mitras');
    }
}
