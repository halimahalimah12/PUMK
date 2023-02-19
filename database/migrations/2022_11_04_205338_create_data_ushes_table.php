<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataUshesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_ushes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('nama_ush',60);
            $table->enum('sektorush',['industri','perdagangan','jasa','perikanan','peternakan','pertanian'])->nullable();
            $table->string('jnsush')->nullable();
            $table->string('akta_ush',60)->nullable();
            $table->string('izin_ush',60)->nullable();
            $table->string('thn_berdiri',4)->nullable();
            $table->text('almt_ush')->nullable();
            $table->bigInteger('nohp_ush')->nullable();
            $table->string('npwp',20)->nullable();
            $table->enum('tmptush',['sendiri','sewa'])->nullable();
            $table->enum('bank',['mandiri','bri'])->nullable();
            $table->text('almtbank')->nullable();
            $table->text('atsnm')->nullable();
            $table->text('norek')->nullable();
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
        Schema::dropIfExists('data_ushes');
    }
}
