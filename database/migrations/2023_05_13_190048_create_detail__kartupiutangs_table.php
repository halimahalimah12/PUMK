<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailKartupiutangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail__kartupiutangs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kartupiutang_id');
            $table->string('bulan',10);
            $table->year('tahun');
            $table->integer('pokok');
            $table->integer('jasa');
            $table->integer('jumlah');
            $table->integer('sisasaldo');
            $table->enum('status',['belumbayar','sudahbayar'])->default('belumbayar');
            
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
        Schema::dropIfExists('detail__kartupiutangs');
    }
}
