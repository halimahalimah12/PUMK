<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOprasionalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oprasionals', function (Blueprint $table) {
            $table->id();
             // Biaya operasional
             $table->integer('transport')->nullable();
             $table->integer('listrik')->nullable();
             $table->integer('telpon')->nullable();
             $table->integer('atk')->nullable();
             $table->integer('lain')->nullable();
             $table->integer('totop')->nullable();
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
        Schema::dropIfExists('oprasionals');
    }
}
