



<?php $__env->startSection('container'); ?>


<div class="col-lg-12">
          <div class="card">
          <div class="card-header text-white bg-primary text-center">
                            <h5>Survei Form</h5>
                        </div>
            <div class="card-body">
              <!-- Vertical Form -->
              <form class="row g-3  contact-form" action="/pengajuan/survei" method="post" >
              <?php echo csrf_field(); ?>
              
              
                  <div class="col-12 ">
                    <label for="nm_ush" class="form-label" style="margin-top:10px;">Nama Usaha</label>
                    <input type="text" class="form-control" name="nm_ush" id="nm_ush">
                  </div> 
                  <div class="col-12 ">
                    <label for="nm_pjstu" class="form-label">Nama Penanggung Jawab Satu</label>
                    <input type="text" class="form-control" name="nm_pjstu" id="nm_pjstu">
                  </div>
                  <div class="col-12 ">
                    <label for="nm_pjdua" class="form-label">Nama Penanggung Jawab Kedua</label>
                    <input type="text" class="form-control" name="nm_pjdua" id="nm_pjdua">
                  </div>
                  <div class="col-12 ">
                    <label for="almt_ush" class="form-label">Alamat Usaha</label>
                    <input type="text" class="form-control" name="almt_ush" id="almt_ush">
                  </div>
                  <div class="col-12 ">
                    <label for="jns_ush" class="form-label">Jenis Usaha</label>
                    <input type="text" class="form-control" name="jns_ush" id="jns_ush">
                  </div>
                
                
                  <div class="col-12 ">
                    <label for="aset" class="form-label">Jumlah Harga Aset </label>
                    <input type="text" class="form-control" name="aset" id="aset">
                  </div>
                  <div class="col-12 ">
                    <label for="omzet" class="form-label">Omzet per Bulan </label>
                    <input type="text" class="form-control" name="omzet" id="omzet">
                  </div>
                  <div class="col-12 ">
                    <label for="pokok" class="form-label">Harga Pokok per Bulan </label>
                    <input type="text" class="form-control" name="pokok" id="pokok">
                  </div>
                  <div class="col-12 ">
                    <label for="bsr_pjm" class="form-label">Besar Pinjaman yang diajukan </label>
                    <input type="text" class="form-control" name="bsr_pjm" id="bsr_pjm">
                  </div>
                  <div class="col-12 ">
                    <label for="ksg_byr" class="form-label"> Kesanggupan Angsura per Bulan</label>
                    <input type="text" class="form-control" name="ksg_byr" id="ksg_byr">
                  </div>
                
                
                  <div class="col-12 ">
                    <label for="sdm_ahli" class="form-label"> Jumlah Tenaga Ahli</label>
                    <input type="text" class="form-control" name="sdm_ahli" id="sdm_ahli">
                  </div>
                  <div class="col-12 ">
                    <label for="sdm_btu" class="form-label"> Jumlah Tenaga Pembantu</label>
                    <input type="text" class="form-control" name="sdm_btu" id="sdm_btu">
                  </div>
                  <div class="col-12 ">
                    <label for="modal" class="form-label"> Modal Usaha</label>
                    <input type="text" class="form-control" name="modal" id="modal">
                  </div>
                  <div class="col-12 ">
                    <label for="invst" class="form-label"> Investasi Usaha</label>
                    <input type="text" class="form-control" name="invst" id="invst">
                  </div>
                  <div class="col-12 ">
                    <label for="bhn_baku" class="form-label"> Bahan Baku</label>
                    <input type="text" class="form-control" name="bhn_baku" id="bhn_baku">
                  </div>
                
                  <div class="col-12 ">
                    <label for="pijm_lain" class="form-label"> Pinjaman dari BUMN/Bank Lain</label>
                    <input type="text" class="form-control" name="pijm_lain" id="pijm_lain">
                  </div>
                  <div class="col-12 ">
                    <label for="kds_psr" class="form-label"> Kondisi Pasar</label>
                    <input type="text" class="form-control" name="kds_psr" id="kds_psr">
                  </div>
                  <div class="col-12 ">
                    <label for="thn_ush" class="form-label">Tahun Mulai Usaha</label>
                    <input type="text" class="form-control" name="thn_ush" id="thn_ush">
                  </div>
                  <div class="col-12 ">
                    <label for="tmpt_psr" class="form-label">Tempat Pemasaran</label>
                    <input type="text" class="form-control" name="tmpt_psr" id="tmpt_psr">
                  </div>
                  <div class="col-12 ">
                    <label for="lm_pjm" class="form-label">Lama Waktu Peminjaman</label>
                    <input type="text" class="form-control" name="lm_pjm" id="lm_pjm">
                  </div>
                
                  <div class="col-12 ">
                    <label for="info" class="form-label">Informasi Kemitraan dengan Angkasa Pura II diperoleh dari</label>
                    <input type="text" class="form-control" name="info" id="info">
                  </div>
                  <div class="col-12 ">
                    <label for="kdl" class="form-label">Kendala yang dihadapi dalam berusaha</label>
                    <input type="text" class="form-control" name="kdl" id="kdl">
                  </div>
                  <div class="col-12 ">
                    <label for="rcna" class="form-label">Rencana dalam usaha</label>
                    <input type="text" class="form-control" name="rcna" id="rcna">
                  </div>
                
                  <div class="col-12 ">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Scan KK </label>
                        <input class="form-control" type="file" id="formFile">
                    </div> 
                </div>    
                <div class="col-12 ">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Scan KTP Penanggung Jawab satu</label>
                        <input class="form-control" type="file" id="formFile">
                    </div> 
                </div>    
                  <div class="col-12 ">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Foto Penanggung Jawab satu</label>
                        <input class="form-control" type="file" id="formFile">
                    </div> 
                </div>   
                <div class="col-12 ">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Scan KTP Penanggung Jawab ke-dua </label>
                        <input class="form-control" type="file" id="formFile">
                    </div> 
                </div>  
                <div class="col-12 ">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Foto Penanggung Jawab ke-dua </label>
                        <input class="form-control" type="file" id="formFile">
                    </div> 
                </div>   
                 <div class="col-12 ">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Foto Kegiatan Usaha</label>
                        <input class="form-control" type="file" id="formFile">
                    </div> 
                </div>
                 <div class="col-12 ">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Scan Surat Keterangan Berusaha dari RT/RW Setingkat</label>
                        <input class="form-control" type="file" id="formFile">
                    </div> 
                </div>
                
                <div class="col-md-4">
                  <label for="inputEmail5" class="form-label">Format surat belum dibina BUMN </label>
                  <button type="button" class="btn btn-success"><i class="bi bi-download"></i> Download</button>
                 
                </div>
                <div class="col-md-8">
                  <label for="inputPassword5" class="form-label">Upload surat belum dibina BUMN </label>
                  <input class="form-control" type="file" id="formFile">
                </div>
                
                <div class="col-md-4">
                  <label for="inputEmail5" class="form-label">Format surat Penanggung Jawab berikutnya </label>
                  <button type="button" class="btn btn-primary">Primary</button>
                </div>
                <div class="col-md-8">
                  <label for="inputPassword5" class="form-label">Upload surat Penanggung Jawab berikutnya  </label>
                  <input class="form-control" type="file" id="formFile">
                </div>
                
                <div class="col-md-4">
                  <label for="inputEmail5" class="form-label">Format surat Kesanggupan melunasi Peminjaman</label>
                  <button type="button" class="btn btn-primary">Primary</button>
                </div>
                <div class="col-md-8">
                  <label for="inputPassword5" class="form-label">Upload surat Kesanggupan melunasi Peminjaman  </label>
                  <input class="form-control" type="file" id="formFile">
                </div>


                <div class="form-navigation">
                
                  
                  <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Submit</button>
                </div>
              </form><!-- Vertical Form -->

            </div>
          </div>

            <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
     
      <div class="modal-body">
      <br>
        <h5 > Apakah data anda sudah benar</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Ya</button>
        <button type="button" class="btn btn-primary">Tidak</button>
      </div>
    </div>
  </div>
</div>
         
<?php $__env->stopSection(); ?>



 

<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\applaravel\pumk\resources\views/dashboard/survei/create.blade.php ENDPATH**/ ?>