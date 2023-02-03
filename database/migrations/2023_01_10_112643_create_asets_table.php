<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asets', function (Blueprint $table) {
            $table->id();
             // Aset
            $table->integer('tanah')->nullable();
            $table->integer('bangunan')->nullable();
            $table->integer('persediaan')->nullable();
            $table->integer('alat')->nullable();
            $table->integer('kas')->nullable();
            $table->integer('piutang')->nullable();
            $table->integer('peralatan')->nullable();
            $table->integer('totaset')->nullable();
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
        Schema::dropIfExists('asets');
    }
}
