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
            $table->integer('tanah');
            $table->integer('bangunan');
            $table->integer('persediaan');
            $table->integer('alat');
            $table->integer('kas');
            $table->integer('piutang');
            $table->integer('peralatan');
            $table->integer('totaset');
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
