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
            $table->integer('transport');
            $table->integer('listrik');
            $table->integer('telpon');
            $table->integer('atk');
            $table->integer('lain');
            $table->integer('totop');
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
