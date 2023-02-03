<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePjbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pjbs', function (Blueprint $table) {
            $table->id();
            $table->string('nm',60)->nullable();
            $table->string('tpt_lhr',60)->nullable();
            $table->date('tgl_lhr')->nullable();
            $table->text('hub')->nullable();
            $table->text('bangsa')->default('indonesia');
            $table->enum('jk',['L','P']);
            $table->text('almt')->nullable();
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
        Schema::dropIfExists('pjbs');
    }
}
