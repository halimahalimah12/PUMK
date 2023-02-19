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
            $table->string('nm',60);
            $table->string('tpt_lhr',60);
            $table->date('tgl_lhr');
            $table->text('hub');
            $table->text('bangsa')->default('indonesia');
            $table->enum('jk',['L','P']);
            $table->text('almt');
            $table->string('pekerjaan',15)->nullable();
            $table->string('no_hp');
            $table->string('no_ktp');
            $table->date('tgl_ktp');
            $table->enum('pddk',['SD','SMP','SMA','D1','D2','D3','S1','S2','S3']);
            $table->string('kursus',60)->nullable();
            $table->string('jbt',60);
            $table->string('foto',60);
            $table->string('scanktp',60);
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
