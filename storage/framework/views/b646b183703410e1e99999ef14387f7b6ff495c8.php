

<?php $__env->startSection('container'); ?>
  <div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title">Pengajuan Form</h3>
          </div>

        

          <div class="panel-body">
          <?php if(session()-> has('gagal')): ?>
              <div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin-top:10px; ">
                <p style="text-align:left;align-items:center">
                  <i class="bi bi-emoji-smile"></i>
                  <?php echo e(session('gagal')); ?>  
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </p>
              </div>
          <?php endif; ?>
            <form  class="row contact-form" method="POST" enctype="multipart/form-data" id="form"  name="form"  >
              <?php echo csrf_field(); ?>    
              <?php echo e(method_field('post')); ?>

              <div class="col-12 ">
                <label for="nm_ush" class="form-label" style="margin-top:10px;">Nama Usaha</label>
                <input type="text" class="form-control" name="nm_ush" id="nm_ush" value="<?php echo e(ucwords($ush->nama_ush)); ?>" disabled>
              </div> 
              <div class="col-12 ">
                <label for="nm_pjstu" class="form-label" >Nama Penanggung Jawab Satu</label>
                <input type="text" class="form-control" name="nm_pjstu" id="nm_pjstu" value="<?php echo e(ucwords($mitra->nm)); ?>" disabled>
              </div>
              
              <div class="card-body">
                <h5 class="card-title" style="padding-top:5px; padding-bottom:5px">Biodata Penanggung Jawab Berikutnya</h5>
                  <div class="col-12 "> 
                    <label for="nm_pjb" class="form-label" >Nama  </label>
                    <input type="text" class="form-control " name="nm_pjb" id="nm_pjb" value="<?php echo e(old('nm_pjb')); ?> <?php if($pengajuan != NULL ): ?> <?php echo e(ucwords($last->pjb->nm)); ?> <?php endif; ?> "   >
                    <span class="text-danger error-text nm_pjb_error"> </span>
                  </div>
                  <div class="row gx-3 gy-0">
                    <div class="col-lg-6 col-12  form-group clearfix ">
                      <label for="tpt_lhr" class="form-label">Tempat Lahir</label>
                      <input type="text" class="form-control "  id="tpt_lhr" name="tpt_lhr" value="<?php echo e(old('tpt_lhr')); ?><?php if($pengajuan != NULL ): ?> <?php echo e(ucwords($last->pjb->tpt_lhr)); ?> <?php endif; ?> " >
                      <span class="text-danger error-text tpt_lhr_error"> </span>
                    </div>
                    <div class="col-lg-6 col-12 form-group clearfix">
                      <label for="tgl_lhr" class="form-label">Tanggal Lahir</label>
                      <div class="col-sm-10">
                        <?php if($pengajuan != NULL ): ?>
                            <input type="date" class="form-control"  id="tgl_lhr"  name="tgl_lhr"  value="<?php echo e(old('tgllahir', $last->pjb->tgl_lhr)); ?>">
                          <?php else: ?>
                            <input type="date" class="form-control"  id="tgl_lhr"  name="tgl_lhr"  value="<?php echo e(old('tgllahir')); ?>">
                        <?php endif; ?>
                        <span class="text-danger error-text tgl_lhr_error"> </span>
                      </div>
                    </div>
                  </div>
                  <div class="row gx-3 gy-0">
                    <div class="col-lg-6 col-12 ">
                      <label for="gender" class="form-label">Jenis Kelamin</label>
                      <div>
                        <div class="form-check form-check-inline" >
                          <input class="form-check-input" type="radio" name="gender" id="gender" value="L" <?php echo e(old('gender') == 'L' ? 'checked':''); ?> <?php if($pengajuan != NULL ): ?> <?php echo e($last->pjb->jk == 'L' ? 'checked':''); ?> <?php endif; ?>>
                          <label class="form-check-label" for="gender">Laki-Laki</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="gender" id="gender" value="P"  <?php echo e(old('gender') == 'P' ? 'checked':''); ?> <?php if($pengajuan != NULL ): ?> <?php echo e($last->pjb->jk == 'P' ? 'checked':''); ?> <?php endif; ?>>
                          <label class="form-check-label" for="gender">Perempuan</label>
                        </div>                                  
                        <span class="text-danger error-text gender_error"> </span>
                      </div>
                    </div>
                    <div class="col-lg-6 col-12 form-group clearfix">
                      <label for="hub" class="form-label">Status Hubungan dengan Penanggung Jawab Usaha </label>
                      <input type="text" class="form-control" id="hub" name="hub" value="<?php echo e(old('hub')); ?> <?php if($pengajuan != NULL ): ?> <?php echo e(ucwords($last->pjb->hub)); ?> <?php endif; ?>">
                      <span class="text-danger error-text hub_error"> </span>
                    </div>
                  </div>
                  <div class="row gx-3 gy-0">
                    <div class="col-12 col-lg-6 form-group clearfix" >
                      <label for="pekerjaan" class="form-label">Pekerjaan</label>
                      <input type="text" class="form-control" id="pekerjaan" name="pekerjaan"value="<?php echo e(old('pekerjaan')); ?> <?php if($pengajuan != NULL ): ?> <?php echo e(ucwords($last->pjb->pekerjaan)); ?> <?php endif; ?>">
                      <span class="text-danger error-text pekerjaan_error"> </span>
                    </div>
                    <div class="col-12 col-lg-6 form-group clearfix" >
                      <label for="almt" class="form-label">Alamat</label>
                        <textarea class="form-control  <?php $__errorArgs = ['almt'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="almt" name="almt" value="<?php echo e(old('almt')); ?>" style="height: 100px"><?php if($pengajuan != NULL ): ?><?php echo e(ucwords($last->pjb->almt)); ?><?php endif; ?></textarea>
                        <span class="text-danger error-text almt_error"> </span>
                    </div>
                  </div>
                  <div class="col-12 form-group clearfix">
                    <label for="bangsa" class="form-label">Kebangsaan</label>
                    <input type="text" class="form-control" id="bangsa" name="bangsa" value="Indonesia" disabled>
                  </div>
                  <div class="row gx-3 gy-0">
                    <div class="col-lg-4 col-12 form-group clearfix">
                      <label for="no_hp" class="form-label">No Telephone</label>
                      <input type="text" class="form-control"  id="no_hp" name="no_hp" value="<?php echo e(old('no_hp')); ?> <?php if($pengajuan != NULL ): ?> <?php echo e(ucwords($last->pjb->no_hp)); ?> <?php endif; ?>">
                      <span class="text-danger error-text no_hp_error"> </span>
                    </div>
                    <div class="col-lg-4 col-12 form-group clearfix">
                      <label for="no_ktp" class="form-label">No KTP </label>
                      <input type="text" class="form-control" id="no_ktp" name="no_ktp" value="<?php echo e(old('no_ktp')); ?><?php if($pengajuan != NULL ): ?> <?php echo e(ucwords($last->pjb->no_ktp)); ?> <?php endif; ?>">
                      <span class="text-danger error-text no_ktp_error"> </span>
                    </div>
                    <div class="col-lg-4 col-12 form-group clearfix">
                      <label for="tgl_ktp" class="form-label">Tanggal KTP</label>  
                      <div class="col-sm-12">
                        <?php if($pengajuan != NULL ): ?>
                            <input type="date" class="form-control"  id="tgl_ktp"  name="tgl_ktp" value="<?php echo e(old('tgl_ktp',$last->pjb->tgl_ktp)); ?>">
                          <?php else: ?>
                            <input type="date" class="form-control"  id="tgl_ktp"  name="tgl_ktp" value="<?php echo e(old('tgl_ktp')); ?>">
                        <?php endif; ?>
                        <span class="text-danger error-text tgl_ktp_error"> </span>
                      </div>
                    </div>
                  </div>
                  <div class="row gx-3 gy-0">
                    <div class="col-lg-4 col-12 form-group clearfix">
                      <label class="form-label " for ="pddk">Pendidikan Terakhir</label>
                        <select class="form-select" name="pddk" id="pddk" aria-label="Default select example">
                          <div class="col-sm-6">
                            <option value = "" >- Pilih -</option>
                            <option value="SD" <?php echo e(old('pddk') =="SD" ? 'selected' : ''); ?> <?php if($pengajuan != NULL ): ?> <?php echo e($last->pjb->pddk =="SD" ? 'selected' : ''); ?> <?php endif; ?> name="pddk" id="pddk" >SD</option>
                            <option value="SMP" <?php echo e(old('pddk') =="SMP" ? 'selected' : ''); ?> <?php if($pengajuan != NULL ): ?> <?php echo e($last->pjb->pddk =="SMP" ? 'selected' : ''); ?> <?php endif; ?> name="pddk" id="pddk">SMP</option>
                            <option value="SMA" <?php echo e(old('pddk') =="SMA" ? 'selected' : ''); ?> <?php if($pengajuan != NULL ): ?> <?php echo e($last->pjb->pddk =="SMA" ? 'selected' : ''); ?> <?php endif; ?> name="pddk" id="pddk">SMA</option>
                            <option value="D1" <?php echo e(old('pddk') =="D1" ? 'selected' : ''); ?> <?php if($pengajuan != NULL ): ?> <?php echo e($last->pjb->pddk =="D1" ? 'selected' : ''); ?> <?php endif; ?> name="pddk" id="pddk">D1</option>
                            <option value="D1" <?php echo e(old('pddk') =="D2" ? 'selected' : ''); ?> <?php if($pengajuan != NULL ): ?> <?php echo e($last->pjb->pddk =="D2" ? 'selected' : ''); ?> <?php endif; ?> name="pddk" id="pddk">D2</option>
                            <option value="D3" <?php echo e(old('pddk') =="D3" ? 'selected' : ''); ?> <?php if($pengajuan != NULL ): ?> <?php echo e($last->pjb->pddk =="D3" ? 'selected' : ''); ?> <?php endif; ?> name="pddk" id="pddk">D3</option>
                            <option value="S1" <?php echo e(old('pddk') =="S1" ? 'selected' : ''); ?> <?php if($pengajuan != NULL ): ?> <?php echo e($last->pjb->pddk =="S1" ? 'selected' : ''); ?> <?php endif; ?> name="pddk" id="pddk">S1</option>
                            <option value="S2" <?php echo e(old('pddk') =="S2" ? 'selected' : ''); ?> <?php if($pengajuan != NULL ): ?> <?php echo e($last->pjb->pddk =="S2" ? 'selected' : ''); ?> <?php endif; ?> name="pddk" id="pddk">S2</option>
                            <option value="S3" <?php echo e(old('pddk') =="S3" ? 'selected' : ''); ?> <?php if($pengajuan != NULL ): ?> <?php echo e($last->pjb->pddk =="S3" ? 'selected' : ''); ?> <?php endif; ?>  name="pddk" id="pddk">S3</option>
                          </div>
                        </select>
                        <span class="text-danger error-text pddk_error"> </span>
                    </div>
                    <div class="col-lg-4 col-12 form-group clearfix">
                      <label for="kursus" class="form-label">Kursus </label>
                      <input type="text" class="form-control"  id="kursus" name="kursus" value="<?php echo e(old('kursus')); ?><?php if($pengajuan != NULL ): ?> <?php echo e(ucwords($last->pjb->kursus)); ?> <?php endif; ?>">
                      <p>* Jika tidak ada, beri tanda strip(-) </p>
                    </div>
                    <div class="col-lg-4 col-12 form-group clearfix">
                      <label for="jbt" class="form-label">Jabatan</label>
                      <input type="text" class="form-control"  id="jbt" name="jbt" value="<?php echo e(old('jbt')); ?><?php if($pengajuan != NULL ): ?> <?php echo e(ucwords($last->pjb->jbt)); ?> <?php endif; ?>">
                      <span class="text-danger error-text jbt_error"> </span>
                    </div> 
                  </div>
                  <div class="col-12 form-group clearfix">
                    <label for="foto" class="form-label">Pas Foto</label>
                    <div class="row">
                      <div class="col-sm-10">
                        <input class="form-control"  type="file" id="foto" name="foto" value="<?php echo e(old('foto')); ?>">
                        <span class="text-danger error-text foto_error"> </span>
                        <span style="font-style: italic;">Format foto (.jpg, .png, .jpeg) </span> 
                      </div> 
                    </div>
                  </div>  
                  <div class="col-12 form-group clearfix">
                    <label for="scanktp" class="form-label">Scan KTP</label>
                    <div class="row">
                      <div class="col-sm-10">
                        <input class="form-control"  type="file" id="scanktp" name="scanktp" value="<?php echo e(old('scanktp')); ?>">
                        <span class="text-danger error-text scanktp_error"> </span>
                        <span style="font-style: italic;">Format foto (.jpg, .png, .jpeg) </span> 
                      </div> 
                    </div>
                  </div> 
              </div>
              
              <div class="card-body">
                <h5 class="card-title" style="padding-top:5px; padding-bottom:5px">Asset</h5>
                <h6>Asset (Aktiva) yang berkaitan langsung dengan kegiatan usaha</h6>
                <p style="font-style: italic;">Jangan kosongkan jawaban, jika tidak ada ketik angka nol ( 0 )</p>
                  <div class="row mb-2">
                    <label for="tanah" class="col-sm-2 col-form-label">Tanah</label>
                    <div class="col-sm-10">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Rp.</span>
                            <input type="text" class="form-control rupiah " name="tanah" id="tanah"  onkeyup="sum();" value="<?php echo e(old('tanah')); ?> <?php if($pengajuan != NULL ): ?> <?php echo e(ucwords($last->aset->tanah)); ?> <?php endif; ?>" >
                        </div>
                        <span class="text-danger error-text tanah_error"> </span>
                    </div>
                  </div>
                  <div class="row mb-3" style="margin-top:0px">
                    <label for="bangunan" class="col-sm-2 col-form-label">Bangunan</label>
                    <div class="col-sm-10">
                      <div class="input-group mb-3">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" class="rupiah  form-control" name="bangunan" id="bangunan" onkeyup="sum();" value="<?php echo e(old('bangunan')); ?> <?php if($pengajuan != NULL ): ?> <?php echo e(ucwords($last->aset->bangunan)); ?> <?php endif; ?>">
                      </div>
                      <span class="text-danger error-text bangunan_error"> </span>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="tanah" class="col-sm-2 col-form-label">Persediaan</label>
                    <div class="col-sm-10">
                      <div class="input-group mb-3">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" class="rupiah  form-control" name="persediaan" id="persediaan" onkeyup="sum();" value="<?php echo e(old('persediaan')); ?><?php if($pengajuan != NULL ): ?> <?php echo e(ucwords($last->aset->persediaan)); ?> <?php endif; ?>">
                      </div>
                      <span class="text-danger error-text persediaan_error"> </span>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="alat" class="col-sm-2 col-form-label">Peralatan Usaha</label>
                    <div class="col-sm-10">
                      <div class="input-group mb-3">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" class="rupiah  form-control" name="alat" id="alat" onkeyup="sum();" value="<?php echo e(old('alat')); ?><?php if($pengajuan != NULL ): ?> <?php echo e(ucwords($last->aset->alat)); ?> <?php endif; ?>">
                      </div>
                      <span class="text-danger error-text alat_error"> </span>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="kas" class="col-sm-2 col-form-label">kas</label>
                    <div class="col-sm-10">
                      <div class="input-group mb-3">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" class="rupiah form-control" name="kas" id="kas" onkeyup="sum();" value="<?php echo e(old('kas')); ?><?php if($pengajuan != NULL ): ?> <?php echo e(ucwords($last->aset->kas)); ?> <?php endif; ?>">
                      </div>
                      <span class="text-danger error-text kas_error"> </span>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="piutang" class="col-sm-2 col-form-label">Piutang</label>
                    <div class="col-sm-10">
                      <div class="input-group mb-3">
                          <span class="input-group-text">Rp.</span>
                          <input type="text" class=" rupiah form-control" name="piutang" id="piutang" onkeyup="sum();" value="<?php echo e(old('piutang')); ?><?php if($pengajuan != NULL ): ?> <?php echo e(ucwords($last->aset->piutang)); ?> <?php endif; ?>">
                        </div>
                        <span class="text-danger error-text piutang_error"> </span>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="peralatan" class="col-sm-2 col-form-label">Peralatan Produksi</label>
                    <div class="col-sm-10">
                      <div class="input-group mb-3">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" class=" rupiah form-control" name="peralatan" id="peralatan" onkeyup="sum();" value="<?php echo e(old('peralatan')); ?><?php if($pengajuan != NULL ): ?> <?php echo e(ucwords($last->aset->peralatan)); ?> <?php endif; ?>">
                      </div>
                      <span class="text-danger error-text peralatan_error"> </span>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label  for="totaset" class="col-sm-2 col-form-label">Total Aset</label>
                    <div class="col-sm-10">
                      <div class="input-group mb-3">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" class="rupiah form-control" name="totaset" id="totaset" style="padding-bottom:5px;background-color: #e9ecef; cursor:auto;" value="<?php echo e(old('totaset')); ?> <?php if($pengajuan != NULL ): ?> <?php echo e(ucwords($last->aset->totaset)); ?> <?php endif; ?>" readonly>
                      </div>
                    </div>
                  </div>
              </div>
              
              <div class="card-body">
                <h5 class="card-title" style="padding-top:5px; padding-bottom:5px">Alat kerja dan alat bantu</h5>
                <p style="font-style: italic;">Jangan kosongkan jawaban, Minimal beri 1 jawaban </p>
                <div style="overflow-x:auto">
                  <table class="table table-striped table-responsive" >
                    <thead >
                      <tr>
                        <th> Nama Barang </th>
                        <th> Harga Satuan (Rp)</th>
                        <th> Jumlah Harga (Rp)</th>
                        <th> <a href="javascript:void(0);" class="addalat btn btn-primary" style="float:right;" name="addalat" id="addalat">+ </a></th>
                      </tr>
                    </thead>
                    <tbody id="alats" class="alats">
                      <?php if($pengajuan == NULL): ?>
                          <tr>
                            <td> <input type="text" name="nm_brg[]" class="form-control" value="<?php echo e(old('nm_brg[]')); ?>"></td>
                            <td> <input type="text" name="hrg_satuan[]" class="rupiah form-control" value="<?php echo e(old('hrg_satuan[]')); ?>"> </td>
                            <td> <input type="text" name="jmlh[]" class="rupiah form-control" id="jmlh" value="<?php echo e(old('jmlh[]')); ?>"> </td>
                            <td> <a href="javascript:void(0);" class="deleterow btn btn-danger" style="float:right;" name="deleterow">- </a> </td>
                          </tr>
                        <?php else: ?>
                          <?php $__currentLoopData = $lastalat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $x): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <tr>        
                                <td> <input type="text" name="nm_brg[]" class="form-control " value="<?php echo e(old('nm_brg[]', $x->nm_brg)); ?>">    </td>  
                                <td> <input type="text" name=" hrg_satuan[]"  class="rupiah form-control" value="<?php echo e(old('hrg_satuan[]', $x->hrg_satuan)); ?>"> </td>
                                <td> <input type="text" name="jmlh[]" class="rupiah form-control" value="<?php echo e(old('jmlh[]', $x->jmlh)); ?>"> </td>
                                <td> <a href="javascript:void(0);" class="deleterow btn btn-danger" style="float:right;" name="deleterow">- </a> </td>
                              </tr>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </tbody>
                  </table> 
                </div>
              </div> 
              
              <div class="card-body">
                <h5 class="card-title" style="padding-top:5px; padding-bottom:5px">Tenaga Kerja</h5>
                <p style="font-style: italic;">Jangan kosongkan jawaban, Minimal beri 1 jawaban </p>
                <div style="overflow-x:auto">
                  <table class="table table-striped" >
                    <thead>
                      <tr>
                        <th> Nama  </th>
                        <th> Jabatan</th>
                        <th> Gaji (Rp)</th>
                        <th> <a href="javascript:void(0);" class="addtenagakerja btn btn-primary" style="float:right;" name="addtenagakerja" id="addtenagakerja">+ </a></th>
                      </tr>
                    </thead>
                    <tbody id="tngkerja" class="tngkerja">
                        <?php if($pengajuan == NULL): ?>
                            <tr>
                              <td> <input type="text" name="nmkry[]" class="form-control " value="<?php echo e(old('nmkry[]')); ?>"></td>
                              <td> <input type="text" name="jbtkry[]" class="form-control " value="<?php echo e(old('jbtkry[]')); ?>"></td>
                              <td> <input type="text" name="gaji[]" class="rupiah form-control " value="<?php echo e(old('gaji[]')); ?>"></td>
                              <td> <a href="javascript:void(0);" class="deleterow btn btn-danger" style="float:right;" name="deleterow">- </a> </td>
                            </tr>
                          <?php else: ?>
                            <?php $__currentLoopData = $lasttk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $x): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <tr>
                                <td > <input type="text" name="nmkry[]" class="form-control" value="<?php echo e(old('nmkry[]', $x->nm_tngk)); ?>"> </td>
                                <td > <input type="text" name="jbtkry[]" class="form-control" value="<?php echo e(old('jbtkry[]', $x->jbt)); ?>"> </td>
                                <td > <input type="text" name="gaji[]" class="rupiah form-control" value="<?php echo e(old('gaji[]', $x->gaji)); ?>"> </td>
                                <td > <a href="javascript:void(0);" class="deleterow btn btn-danger" style="float:right;" name="deleterow">- </a> </td>
                              </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </tbody >
                  </table> 
                </div>
              </div>
              
              <div class="card-body">
                <h5 class="card-title" style="padding-top:5px; padding-bottom:5px">Biaya Oprasional</h5>
                <h6>Biaya oprasional tiap bulannya.</h6>
                <p style="font-style: italic;">Jangan kosongkan jawaban, jika tidak ada ketik angka nol ( 0 )</p>
                <div class="row mb-3">
                  <label for="transport" class="col-sm-2 col-form-label">Transport</label>
                  <div class="col-sm-10">
                    <div class="input-group mb-3">
                      <span class="input-group-text">Rp.</span>
                      <input type="text" class="rupiah form-control" name="transport" id="transport" onkeyup="sum1();" value="<?php echo e(old('transport')); ?> <?php if($pengajuan != NULL ): ?> <?php echo e($last->oprasional->transport); ?> <?php endif; ?>">
                    </div>
                    <span class="text-danger error-text transport_error"> </span>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="listrik"  class="col-sm-2 col-form-label">Listrik</label>
                  <div class="col-sm-10">
                    <div class="input-group mb-3">
                      <span class="input-group-text">Rp.</span>
                      <input type="text" class="rupiah form-control" name="listrik" id="listrik" onkeyup="sum1();" value="<?php echo e(old('listrik')); ?> <?php if($pengajuan != NULL ): ?> <?php echo e($last->oprasional->listrik); ?> <?php endif; ?>" >
                    </div>
                    <span class="text-danger error-text listrik_error"> </span>                    
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="telp"  class="col-sm-2 col-form-label">Telepon</label>
                  <div class="col-sm-10">
                    <div class="input-group mb-3">
                      <span class="input-group-text">Rp.</span>
                      <input type="text" class="rupiah form-control" name="telp" id="telp" onkeyup="sum1();" value="<?php echo e(old('telp')); ?> <?php if($pengajuan != NULL ): ?> <?php echo e($last->oprasional->telpon); ?> <?php endif; ?>">
                    </div>
                    <span class="text-danger error-text telp_error"> </span>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="atk" class="col-sm-2 col-form-label">ATK</label>
                  <div class="col-sm-10">
                    <div class="input-group mb-3">
                      <span class="input-group-text">Rp.</span>
                      <input type="text" class="rupiah form-control" name="atk" id="atk" onkeyup="sum1();" value="<?php echo e(old('atk')); ?> <?php if($pengajuan != NULL ): ?> <?php echo e($last->oprasional->atk); ?> <?php endif; ?>">
                    </div>
                    <span class="text-danger error-text atk_error"> </span>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="lain" class="col-sm-2 col-form-label">Lain-Lain</label>
                  <div class="col-sm-10">
                    <div class="input-group mb-3">
                      <span class="input-group-text">Rp.</span>
                      <input type="text" class="rupiah form-control" name="lain" id="lain" onkeyup="sum1();" value="<?php echo e(old('lain')); ?> <?php if($pengajuan != NULL ): ?> <?php echo e($last->oprasional->lain); ?> <?php endif; ?>">
                    </div>
                    <span class="text-danger error-text lain_error"> </span>
                  </div>
                </div>
                <div class="row mb-3">
                  <label  for="totop" class="col-sm-2 col-form-label">Total Oprasional</label>
                  <div class="col-sm-10">
                    <div class="input-group mb-3">
                      <span class="input-group-text">Rp.</span>
                      <input type="text" class="rupiah form-control" name="totop" id="totop" style="padding-bottom:5px;background-color: #e9ecef; cursor:auto;" value="<?php echo e(old('totop')); ?> <?php if($pengajuan != NULL ): ?> <?php echo e($last->oprasional->totop); ?> <?php endif; ?>" readonly>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="card-body">
                <h5 class="card-title" style="padding-top:5px; padding-bottom:5px">Penjualan (Omzet)</h5>
                <h6>Omzet tiap bulannya.</h6>
                <p style="font-style: italic;">Jangan kosongkan jawaban, Mininal beri 1 jawaban </p>
                  <div style="overflow-x:auto">
                    <table class="table table-striped" >
                      <thead >
                        <tr>
                          <th> Nama Barang </th>
                          <th> Harga Satuan (Rp)</th>
                          <th> Jumlah Harga (Rp)</th>
                          <th> <a href="javascript:void(0);" class="addomzet btn btn-primary" style="float:right;" name="addomzet" id="addomzet">+ </a></th>
                        </tr>
                      </thead>
                      <tbody id="omzet" class="omzet">
                            <?php if($pengajuan == NULL): ?>
                                <tr>
                                  <td> <input type="text" name="nmomzet[]" class="form-control " >  </td>
                                  <td> <input type="text" name="hrgomzet[]" class="rupiah form-control" > </td>
                                  <td> <input type="text" name="jmlhomzet[]" class="rupiah form-control" > </td>
                                  <td> <a href="javascript:void(0);" class="deleterow btn btn-danger" style="float:right;" name="deleterow">- </a> </td>
                                </tr>
                              <?php else: ?>
                                <?php $__currentLoopData = $lastomzet; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $x): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <tr>
                                    <td> <input type="text" name="nmomzet[]" class="form-control" value="<?php echo e(old('nmomzet[]',$x->nm_brg)); ?>"> </td>
                                    <td> <input type="text" name="hrgomzet[]" class="rupiah form-control" value="<?php echo e(old('hrgomzet[]',$x->hrg_satuan)); ?>"> </td>
                                    <td> <input type="text" name="jmlhomzet[]" class="rupiah form-control" value="<?php echo e(old('jmlhomzet[]',$x->jmlh)); ?>" onkeyup="getItems()"> </td>
                                    <td> <a href="javascript:void(0);" class="deleterow btn btn-danger" style="float:right;" name="deleterow">- </a> </td>
                                  </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                      </tbody> 
                    </table> 
                  </div>
              </div> 
              
              <div class="card-body">
                <h5 class="card-title" style="padding-top:5px; padding-bottom:5px">Penempatan Modal</h5>
                <p style="font-style: italic;">Jangan kosongkan jawaban, jika tidak ada ketik angka nol ( 0 )</p>
                <div class="col-12 ">
                  <label for="modal" class="form-label"> Modal Usaha</label>
                  <div class="input-group mb-3">
                    <span class="input-group-text">Rp.</span>
                    <input type="text" class="rupiah form-control " name="modal" id="modal" onkeyup="sum_modal();" value="<?php echo e(old('modal')); ?> <?php if($pengajuan != NULL ): ?> <?php echo e(ucwords($last->modal)); ?> <?php endif; ?>">
                  </div>  
                  <span class="text-danger error-text modal_error"> </span>
                </div>
                <div class="col-12 ">
                  <label for="invst" class="form-label"> Investasi Usaha</label>
                  <div class="input-group mb-3">
                    <span class="input-group-text">Rp.</span>
                    <input type="text" class="rupiah form-control " name="invest" id="invest" onkeyup="sum_modal();" value="<?php echo e(old('invest')); ?> <?php if($pengajuan != NULL ): ?> <?php echo e(ucwords($last->investasi)); ?> <?php endif; ?>">
                  </div>
                  <span class="text-danger error-text invest_error"> </span>
                </div>
                <div class="col-12 ">
                  <label for="bsr_pjm" class="form-label">Besar Pinjaman yang Diajukan </label>
                  <div class="input-group mb-3">
                    <span class="input-group-text">Rp.</span>
                    <input type="text" class="rupiah form-control " name="bsr_pjm" id="bsr_pjm" value="<?php echo e(old('bsr_pjm')); ?> <?php if($pengajuan != NULL ): ?> <?php echo e(ucwords($last->bsr_pinjaman)); ?> <?php endif; ?>"style="background-color: #e9ecef; cursor:auto;" readonly>
                  </div>
                  <span class="text-danger error-text bsr_pjm_error"> </span>
                </div>
              </div>
              
              <div class="card-body">
                <h5 class="card-title" style="padding-top:5px; padding-bottom:5px">Manfaat</h5>
                <h6>Manfaat yang mitra dapat ketika pengajuan diterima.</h6>
                <p style="font-style: italic;">Jangan kosongkan jawaban, Mininal beri 1 jawaban </p>
                <table class="table table-striped" >
                  <thead >
                    <tr>
                      <th> Manfaat </th>
                      <th> <a href="javascript:void(0);" class="addmanfaat btn btn-primary" style="float:right;" name="addmanfaat">+ </a></th>
                    </tr>
                  </thead>
                  <tbody id="manfaat" class="manfaat">
                    <?php if($pengajuan == NULL): ?>
                        <tr>
                          <td> <input type="text" name="manfaat[]" class="form-control" value="<?php echo e(old('manfaat[]')); ?>"> </td>
                          <td> <a href="javascript:void(0);" class="deleterow btn btn-danger" style="float:right;" name="deleterow">- </a> </td>
                        </tr>
                      <?php else: ?>
                        <?php $__currentLoopData = $lastmanfaat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $x): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <tr>
                            <td > <input type="text" name="manfaat[]" class="form-control" value="<?php echo e(old('manfaat[]', $x->manfaat)); ?>" > </td>
                            <td > <a href="javascript:void(0);" class="deleterow btn btn-danger" style="float:right;" name="deleterow">- </a> </td>
                          </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <?php endif; ?>
                  </tbody>
                </table>              
              </div>
              
              <div class="col-12  ">
                <div class="mb-3">
                  <label for="bkt_serius" class="form-label">Bukti tanda keseriusan </label>
                  <span>Foto bukti tanda keseriusan anda, seperti BPKB</span>
                  <input class="form-control " type="file" id="bkt_serius" name="bkt_serius">
                  <span class="text-danger error-text bkt_serius_error"> </span>
                  <span style="font-style: italic;">Format foto (.jpg, .png, .jpeg, pdf) </span>
                </div> 
              </div>
              
              <div class="col-12  " >
                <div class="mb-3">
                  <label for="kk" class="form-label">Scan KK </label>
                  <input class="form-control" type="file" id="kk" name="kk">
                  <span class="text-danger error-text kk_error"> </span>
                  <span style="font-style: italic;">Format foto (.jpg, .png, .jpeg) </span>
                </div> 
              </div>    
              
              <div class="col-12 " >
                <div class="mb-3">
                  <label for="foto_kegiatan" class="form-label">Foto Kegiatan Usaha</label>
                  <input class="form-control " type="file" id="foto_kegiatan" name="foto_kegiatan">
                  <span class="text-danger error-text foto_kegiatan_error"> </span>
                  <span style="font-style: italic;">Format foto (.jpg, .png, .jpeg) </span>
                </div> 
              </div>
              
              <div class="col-12 ">
                <div class="mb-3">
                  <label for="surat_ush" class="form-label">Scan Surat Keterangan Berusaha dari RT/RW Setingkat</label>
                  <input class="form-control" type="file" id="surat_ush" name="surat_ush">
                  <span class="text-danger error-text surat_ush_error"> </span>
                  <span style="font-style: italic;">Format file (.jpg, .png, .jpeg, .pdf) </span>
                </div> 
              </div> 
              
                <div class="col-md-4">
                  <div class="row">
                    <label for="inputEmail5" class="form-label">Format Surat Belum Dibina BUMN </label>
                  </div>
                  <div class="row">
                    <a href="/download"> <button type="button" class="btn btn-success"><i class="bi bi-download"></i>  Download</button></a>
                  </div>
                </div>
                <div class="col-md-8">
                  <label for="srt_blmbina" class="form-label">Surat Belum Dibina BUMN </label>
                  <input class="form-control" type="file" id="srt_blmbina" name="srt_blmbina"></a>
                  <span class="text-danger error-text srt_blmbina_error"> </span>
                  <span style="font-style: italic;">Format file (.jpg, .png, .jpeg, .pdf) </span>
                </div>
              
              <div class="col-md-4">
                <div class="row">
                  <label for="inputEmail5" class="form-label">Format Surat Penanggung Jawab berikutnya </label>
                </div>
                <div class="row">
                  <a href="/downloadpjb"> <button type="button" class="btn btn-success"><i class="bi bi-download"></i> Download</button></a>
                </div>
              </div>
              <div class="col-md-8">
                <label for="srt_pjb" class="form-label">Upload Surat Penanggung Jawab berikutnya  </label>
                <input class="form-control" type="file" id="srt_pjb" name="srt_pjb">
                <span class="text-danger error-text srt_pjb_error"> </span>
                <span style="font-style: italic;">Format file (.jpg, .png, .jpeg, .pdf) </span>
              </div>
              
              <div class="col-md-4">
                <div class="row">
                  <label for="inputEmail5" class="form-label">Format Surat Kesanggupan Melunasi Peminjaman</label>
                </div>
                <div class="row">
                  <a href="/download-melunasi"> <button type="button" class="btn btn-success"><i class="bi bi-download"></i> Download</button>   </a>                
                </div>
              </div>
              <div class="col-md-8">
                <label for="srt_ksglns" class="form-label">Upload Surat Kesanggupan Melunasi Peminjaman  </label>
                <input class="form-control" type="file" id="srt_ksglns" name="srt_ksglns">
                <span class="text-danger error-text srt_ksglns_error"> </span>
                <span style="font-style: italic;">Format file (.jpg, .png, .jpeg, .pdf) </span>
              </div>
              <hr>
              <div class="row">
                <div class="form-group form-navigation">
                  <label for="confirm1"> </label>
                  <center>
                    <div class="alert alert-warning" style="color:black !important">
                      Sebelum Melakukan Pengiriman Pengajuan , Periksa Kembali Isian Data. 
                      <br>
                      <b>Data Tidak Dapat Diperbarui, Maka Pastikan Semua Data Telah Terisi Dengan Benar.</b>
                    </div>
                    <button type="submit" class="btn btn-primary" name="simpan" id="simpan"><i class="ri-send-plane-fill"></i></i> Kirim </button>
                  </center>
                </div>
              </div>
              <?php echo e(csrf_field()); ?>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
  <script type='text/javascript'>
    
    $('thead').on('click','.addalat',function(){
      var tr = "<tr>"+
                  "<td> <input type='text'    name='nm_brg[]'   class='form-control ' > </td>"+
                  "<td> <input type='text'  name='hrg_satuan[]'  class='rupiah form-control '> </td>"+
                  "<td> <input type='text'  name='jmlh[]'    class='rupiah form-control ' > </td>"+
                  "<td> <a href='javascript:;' class='deleterow btn btn-danger' style='float:right;' name='deleterow'> - </a> </td>"+
                "</tr>"
          $('#alats').append(tr);
    });
    $('thead').on('click','.addtenagakerja',function(){
      var tr = "<tr>"+
                  "<td> <input type='text' name='nmkry[]'   class='form-control' > </td>"+
                  "<td> <input type='text' name='jbtkry[]'  class='form-control' > </td>"+
                  "<td> <input type='text' name='gaji[]'    class='rupiah form-control' > </td>"+
                  "<td> <a href='javascript:;' class='deleterow btn btn-danger' style='float:right;' name='deleterow'> - </a> </td>"+
                "</tr>"
          $('#tngkerja').append(tr);
    });
    $('thead').on('click','.addomzet',function(){
      var tr = "<tr>"+                         
                  "<td> <input type='text' name='nmomzet[]'   class='form-control' > </td>"+
                  "<td> <input type='text' name='hrgomzet[]'  class='rupiah form-control'> </td>"+
                  "<td> <input type='text' name='jmlhomzet[]' class='rupiah form-control'> </td>"+
                  "<td> <a href='javascript:;' class='deleterow btn btn-danger' style='float:right;' name='deleterow'> - </a> </td>"+
                "</tr>"
          $('#omzet').append(tr);
    });
    $('thead').on('click','.addmanfaat',function(){
      var tr = "<tr>"+
                  "<td> <input type='text' name='manfaat[]' class='form-control'> </td>"+
                  "<td> <a href='javascript:;' class='deleterow btn btn-danger' style='float:right;' name='deleterow'> - </a> </td>"+
              "</tr>"
          $('#manfaat').append(tr);
    });
    $('tbody').on('click','.deleterow',function(){
      $(this).parent().parent().remove();
    });
    function sum(){
      var tanahValue      = document.getElementById('tanah').value;
      var bangunanValue   = document.getElementById('bangunan').value;
      var persediaanValue = document.getElementById('persediaan').value;
      var alatValue       = document.getElementById('alat').value;
      var kasValue        = document.getElementById('kas').value;
      var piutangValue    = document.getElementById('piutang').value;
      var peralatranValue = document.getElementById('peralatan').value;
      var tes1 = tanahValue.split("")
			for( var i = 0; i < tes1.length; i++){ 
          if ( tes1[i] === ',' || tes1[i] === '.') {
          tes1.splice(i, 1); 
        }
			}
			var tes2 = bangunanValue.split("")
			for( var i = 0; i < tes2.length; i++){ 
          if ( tes2[i] === ',' || tes2[i] === '.') {
          tes2.splice(i, 1); 
        }
      }
      var tes3 = persediaanValue .split("")
			for( var i = 0; i < tes3.length; i++){ 
          if ( tes3[i] === ',' || tes3[i] === '.') {
          tes3.splice(i, 1); 
        }
      }
      var tes4 = alatValue.split("")
			for( var i = 0; i < tes4.length; i++){ 
          if ( tes4[i] === ',' || tes4[i] === '.') {
          tes4.splice(i, 1); 
        }
      }
      var tes5 = kasValue.split("")
			for( var i = 0; i < tes5.length; i++){ 
          if ( tes5[i] === ',' || tes5[i] === '.') {
          tes5.splice(i, 1); 
        }
      }
      var tes6 = piutangValue.split("")
			for( var i = 0; i < tes6.length; i++){ 
          if ( tes6[i] === ',' || tes6[i] === '.') {
          tes6.splice(i, 1); 
        }
      }
      var tes7 = peralatranValue.split("")
			for( var i = 0; i < tes7.length; i++){ 
          if ( tes7[i] === ',' || tes7[i] === '.') {
          tes7.splice(i, 1); 
        }
      }

      var result          = parseInt(tes1.join(""))+parseInt(tes2.join(""))+parseInt(tes3.join(""))+parseInt(tes4.join(""))+parseInt(tes5.join(""))+parseInt(tes6.join(""))+parseInt(tes7.join(""));

      if (!isNaN(result)){
        document.getElementById('totaset').value=currency(result).format();
      }
    }

    function sum1(){
      var transportValue  = document.getElementById('transport').value;
      var listrikValue    = document.getElementById('listrik').value;
      var telpValue       = document.getElementById('telp').value;
      var atkValue        = document.getElementById('atk').value;
      var lainValue       = document.getElementById('lain').value;
      var test1 = transportValue.split("")
			for( var i = 0; i < test1.length; i++){ 
          if ( test1[i] === ',' || test1[i] === '.') {
          test1.splice(i, 1); 
        }
			}
			var test2 = listrikValue.split("")
			for( var i = 0; i < test2.length; i++){ 
          if ( test2[i] === ',' || test2[i] === '.') {
          test2.splice(i, 1); 
        }
      }
      var test3 = telpValue.split("")
			for( var i = 0; i < test3.length; i++){ 
          if ( test3[i] === ',' || test3[i] === '.') {
          test3.splice(i, 1); 
        }
      }
      var test4 = atkValue.split("")
			for( var i = 0; i < test4.length; i++){ 
          if ( test4[i] === ',' || test4[i] === '.') {
          test4.splice(i, 1); 
        }
      }
      var test5 = lainValue.split("")
			for( var i = 0; i < test5.length; i++){ 
          if ( test5[i] === ',' || test5[i] === '.') {
          test5.splice(i, 1); 
        }
      }
      var result          = parseInt(test1.join(""))+parseInt(test2.join(""))+parseInt(test3.join(""))+parseInt(test4.join(""))+parseInt(test5.join(""));

        if (!isNaN(result)){
          document.getElementById('totop').value=currency(result).format();
        }
    }

    function sum_modal(){
      var modalValue  = document.getElementById('modal').value;
      var investValue    = document.getElementById('invest').value;
      var test1 = modalValue.split("")
			for( var i = 0; i < test1.length; i++){ 
          if ( test1[i] === ',' || test1[i] === '.') {
          test1.splice(i, 1); 
        }
			}
			var test2 = investValue.split("")
			for( var i = 0; i < test2.length; i++){ 
          if ( test2[i] === ',' || test2[i] === '.') {
          test2.splice(i, 1); 
        }
      }
      var result          = parseInt(test1.join(""))+parseInt(test2.join(""));
        if (!isNaN(result)){
          document.getElementById('bsr_pjm').value=currency(result).format();
        }
    }

        $('#form').on('submit',function(e){
          e.preventDefault();
          var form = this;
          
          $.ajax({
            url: "<?php echo e(route('pengajuan.store')); ?>",
            method:$(form).attr('method'),
            data:new FormData(form),
            processData:false,
            dataType:'json',
            contentType:false,
            beforeSend:function(){
                $(form).find('span.error-text').text('');
            },
            success:function(data){
              if(data.code == 0 ){
                
                $.each(data.error, function(prefix,val){
                  $(form).find('span.'+prefix+'_error').text(val[0]);
                });
                
              }else{
                $(form)[0].reset();
                Swal.fire(
                  'Good job!',
                  'Data berhasil dimasukan.',
                  'success'
                );
                window.location ="/pengajuan";
              }
            }
          });
        });
        


      
  </script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\applaravel\pumk\resources\views/dashboard/pengajuan/create.blade.php ENDPATH**/ ?>