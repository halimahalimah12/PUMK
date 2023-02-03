<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOmzetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('omzets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pengajuan_id')->nullable();
            $table->string('nm_brg');
            $table->string('hrg_satuan')->nullable();
            $table->integer('jmlh');
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
        Schema::dropIfExists('omzets');
    }
}
