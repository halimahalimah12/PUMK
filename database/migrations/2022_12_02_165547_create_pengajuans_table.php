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
            $table->foreignId('pjb_id')->nullable();
            $table->foreignId('aset_id')->nullable();
            $table->foreignId('oprasional_id')->nullable();
          
            $table->enum('status',['menunggu','tidak','lulus'])->default('menunggu');
            $table->text('ket')->nullable(); //

            // Penempatan modal
            $table->integer('modal')->nullable();
            $table->integer('investasi')->nullable(); //
            $table->integer('bsr_pinjaman')->nullable();

            $table->string('kk',100)->nullable();//sca kk
            $table->string('bkt_keseriusan',100)->nullable(); //bukti keseriusan
            $table->string('surat_blmbina',100)->nullable(); //surat belum dibina bumn
            $table->string('surat_pj',100)->nullable();//surat penanggung jawab
            $table->string('surat_ksglns',100)->nullable(); //surat kesanggupan bayar 
            $table->string('surat_ush_rt',100)->nullable(); //surat usaha dari rt
            $table->string('foto_kegiatan',100)->nullable();  //foto kegiatan usaha

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
