<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengajuansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajuans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('data_mitra_id');
            $table->foreignId('pjb_id');
            $table->foreignId('aset_id');
            $table->foreignId('oprasional_id');
            $table->enum('status',['menunggu','tidak','lulus','lulus_survei','lunas'])->default('menunggu');
            $table->text('ket')->nullable(); 

            // Penempatan modal
            $table->integer('modal');
            $table->integer('investasi'); 
            $table->integer('bsr_pinjaman');
            $table->integer('ksg_bayar')->nullable();
            $table->integer('bsr_usulan')->nullable();
        
            $table->string('kk',100);//scan kk
            $table->string('bkt_keseriusan',100); //bukti keseriusan
            $table->string('surat_blmbina',100); //surat belum dibina bumn
            $table->string('surat_pj',100);//surat penanggung jawab
            $table->string('surat_ksglns',100); //surat kesanggupan bayar 
            $table->string('surat_ush_rt',100); //surat usaha dari rt
            $table->string('foto_kegiatan',100);  //foto kegiatan usaha

            $table->rememberToken();

            $table->timestamp('created_at')->useCurrent();

            $table->timestamp('updated_at')->nullable();
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengajuans');
    }
}
