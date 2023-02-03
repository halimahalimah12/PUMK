



<?php $__env->startSection('container'); ?>

    <div class="col-lg-12">
      <div class="card">
        <div class="card-header text-white bg-primary text-center">
          <h5>Pengajuan Form</h5>
        </div>
        <div class="card-body">
            <form class="row g-3  contact-form" action="/pengajuan" method="POST" enctype="multipart/form-data"  >
              <?php echo csrf_field(); ?>    
              <?php if($user->is_admin ==0 ): ?>
                  <div class="col-12 ">
                    <label for="nm_ush" class="form-label" style="margin-top:10px;">Nama Usaha</label>
                    <input type="text" class="form-control" name="nm_ush" id="nm_ush" value="<?php echo e(old('nmush', $ush->nama_ush)); ?>" disabled>
                  </div> 
                  <div class="col-12 ">
                    <label for="nm_pjstu" class="form-label" >Nama Penanggung Jawab Satu</label>
                    <input type="text" class="form-control" name="nm_pjstu" id="nm_pjstu" value="<?php echo e(old('nama', $mitra->nm)); ?>" disabled>
                  </div>
                <?php else: ?>
                  <div class="col-12 ">
                    <label for="nama_ush" class="form-label" style="margin-top:10px;">Nama Usaha</label>
                    <input type="text" class="form-control" name="nama_ush" id="nama_ush" value="<?php echo e(old('namaush')); ?>" disabled>
                  </div> 
                  <div class="col-12 ">
                    <label for="nm" class="form-label" >Nama Mitra</label>
                    <input type="text" class="form-control" name="nm" id="nm" value="<?php echo e(old('nm')); ?>" onkeyup="isi_otomatis()" >
                  </div>
              <?php endif; ?>
              
              <div class="card-body">
                  <h5 class="card-title" style="padding-top:5px; padding-bottom:5px">Biodata Penanggung Jawab Berikutnya</h5>
                      <div class="col-12 "> 
                        <label for="nm_pjb" class="form-label" >Nama  </label>
                        <input type="text" class="form-control <?php $__errorArgs = ['nm_pjb'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="nm_pjb" id="nm_pjb" value="<?php echo e(old('nm_pjb')); ?>"  >
                          <?php $__errorArgs = ['nm_pjb'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                      </div>
                      <div class="row ">
                          <div class="col-6 form-group clearfix ">
                              <label for="tpt_lhr" class="form-label">Tempat Lahir</label>
                              <input type="text" class="form-control <?php $__errorArgs = ['tpt_lhr'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> "  id="tpt_lhr" name="tpt_lhr" value="<?php echo e(old('tpt_lhr')); ?>" >
                                <?php $__errorArgs = ['tpt_lhr'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                          </div>
                          <div class="col-6 form-group clearfix">
                              <label for="tgl_lhr" class="form-label">Tanggal Lahir</label>
                              <div class="col-sm-10">
                                <input type="date" class="form-control <?php $__errorArgs = ['tgl_lhr'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  name="tgl_lhr" value="<?php echo e(old('tgl_lhr')); ?>">
                                  <?php $__errorArgs = ['tgl_lhr'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-6">
                              <label for="gender" class="form-label">Jenis Kelamin</label>
                              <div class="form-check " >
                                  <input class="form-check-input <?php $__errorArgs = ['gender'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="radio" name="gender" id="gender" value="L" <?php echo e(old('gender') == 'L' ? 'checked':''); ?>>
                                  <label class="form-check-label" for="gender">Laki-Laki</label>
                              </div>
                              <div class="form-check">
                                  <input class="form-check-input <?php $__errorArgs = ['gender'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="radio" name="gender" id="gender" value="P"  <?php echo e(old('gender') == 'P' ? 'checked':''); ?>>
                                  <label class="form-check-label" for="gender">Perempuan</label>
                              </div>                                  
                              <?php $__errorArgs = ['gender'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                          </div>
                          <div class="col-6 form-group clearfix">
                              <label for="hub" class="form-label">Status Hubungan dengan Penanggung Jawab Usaha </label>
                              <input type="text" class="form-control <?php $__errorArgs = ['hub'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="hub" name="hub"value="<?php echo e(old('hub')); ?>">
                              <?php $__errorArgs = ['hub'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                          </div>
                      </div>
                      <div class="col-12 form-group clearfix">
                          <label for="almt" class="form-label">Alamat</label>
                          <input type="text" class="form-control <?php $__errorArgs = ['almt'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="almt" name="almt"value="<?php echo e(old('almt')); ?>">
                            <?php $__errorArgs = ['almt'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                      </div>
                      <div class="col-12 form-group clearfix">
                          <label for="bangsa" class="form-label">Kebangsaan</label>
                          <input type="text" class="form-control <?php $__errorArgs = ['bangsa'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="bangsa" name="bangsa" value="Indonesia" disabled>
                            <?php $__errorArgs = ['bangsa'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback" ><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                      </div>
                      <div class="row">
                          <div class="col-4 form-group clearfix">
                              <label for="no_hp" class="form-label">No Telephone</label>
                              <input type="text" class="form-control <?php $__errorArgs = ['no_hp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  id="no_hp" name="no_hp" value="<?php echo e(old('no_hp')); ?>">
                                <?php $__errorArgs = ['no_hp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                          </div>
                          <div class="col-4 form-group clearfix">
                              <label for="no_ktp" class="form-label">No KTP </label>
                              <input type="text" class="form-control <?php $__errorArgs = ['no_ktp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="no_ktp" name="no_ktp" value="<?php echo e(old('no_ktp')); ?>">
                                <?php $__errorArgs = ['no_ktp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                          </div>
                          <div class="col-4 form-group clearfix">
                              <label for="tgl_ktp" class="form-label">Tanggal KTP</label>
                              <div class="col-sm-12">
                                <input type="date" class="form-control <?php $__errorArgs = ['tgl_ktp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  name="tgl_ktp" value="<?php echo e(old('tgl_ktp')); ?>">
                                  <?php $__errorArgs = ['tgl_ktp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-4 form-group clearfix">
                              <label class="form-label " for ="pddk">Pendidikan Terakhir</label>
                              <div class="col-sm-12">
                                  <select class="form-select <?php $__errorArgs = ['pddk'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> " name="pddk" aria-label="Default select example">
                                          <option value = "" >- Pilih -</option>
                                          <option value="SD" <?php echo e(old('pddk') =="SD" ? 'selected' : ''); ?>>SD</option>
                                          <option value="SMP" <?php echo e(old('pddk') =="SMP" ? 'selected' : ''); ?>>SMP</option>
                                          <option value="SMA" <?php echo e(old('pddk') =="SMA" ? 'selected' : ''); ?>>SMA</option>
                                          <option value="D1" <?php echo e(old('pddk') =="D1" ? 'selected' : ''); ?>>D1</option>
                                          <option value="D1" <?php echo e(old('pddk') =="D2" ? 'selected' : ''); ?>>D2</option>
                                          <option value="D3" <?php echo e(old('pddk') =="D3" ? 'selected' : ''); ?>>D3</option>
                                          <option value="S1" <?php echo e(old('pddk') =="S1" ? 'selected' : ''); ?>>S1</option>
                                          <option value="S2" <?php echo e(old('pddk') =="S2" ? 'selected' : ''); ?>>S2</option>
                                          <option value="S3" <?php echo e(old('pddk') =="S3" ? 'selected' : ''); ?>>S3</option>
                                  </select>
                                  <?php $__errorArgs = ['pddk'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                              </div>
                          </div>
                          <div class="col-4 form-group clearfix">
                              <label for="kursus" class="form-label">Kursus </label>
                              <input type="text" class="form-control <?php $__errorArgs = ['kursus'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  id="kursus" name="kursus" value="<?php echo e(old('kursus')); ?>">
                                <?php $__errorArgs = ['kursus'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                              <p>* Jika tidak ada, dikosongkan saja </p>
                          </div>
                          <div class="col-4 form-group clearfix">
                              <label for="jbt" class="form-label">Jabatan</label>
                              <input type="text" class="form-control <?php $__errorArgs = ['jbt'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  id="jbt" name="jbt" value="<?php echo e(old('jbt')); ?>">
                                <?php $__errorArgs = ['jbt'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  <div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                          </div> 
                      </div>
                      <div class="col-10 form-group clearfix">
                          <label for="foto" class="form-label">Pas Foto</label>
                          <div class="row">
                            <div class="col-sm-10">
                              <input class="form-control <?php $__errorArgs = ['foto'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  type="file" id="foto" name="foto" value="<?php echo e(old('foto')); ?>">
                                <?php $__errorArgs = ['foto'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div> 
                          </div>
                      </div>  
                      <div class="col-10 form-group clearfix">
                          <label for="scanktp" class="form-label">Scan KTP</label>
                          <div class="row">
                            <div class="col-sm-10">
                              <input class="form-control <?php $__errorArgs = ['scanktp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  type="file" id="scanktp" name="scanktp" value="<?php echo e(old('scanktp')); ?>">
                                <?php $__errorArgs = ['scanktp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div> 
                          </div>
                      </div> 
              </div>
              
              <div class="card-body">
                  <h5 class="card-title" style="padding-top:5px; padding-bottom:5px">Asset</h5>
                  <h6>Asset (Aktiva) yang berkaitan langsung dengan kegiatan usaha</h6>
                      <div class="row mb-3">
                        <label for="tanah" class="col-sm-2 col-form-label">Tanah</label>
                        <div class="col-sm-10">
                          <input type="text" class="rupiah form-control <?php $__errorArgs = ['tanah'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="tanah" id="tanah"  onkeyup="sum();" value="<?php echo e(old('tanah')); ?>">
                          <?php $__errorArgs = ['tanah'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="bangunan" class="col-sm-2 col-form-label">Bangunan</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control <?php $__errorArgs = ['bangunan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="bangunan" id="bangunan" onkeyup="sum();" value="<?php echo e(old('bangunan')); ?>">
                          <?php $__errorArgs = ['bangunan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="tanah" class="col-sm-2 col-form-label">Persediaan</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control <?php $__errorArgs = ['persediaan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="persediaan" id="persediaan" onkeyup="sum();" value="<?php echo e(old('persediaan')); ?>">
                          <?php $__errorArgs = ['persediaan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="alat" class="col-sm-2 col-form-label">Peralatan Usaha</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control <?php $__errorArgs = ['alat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="alat" id="alat" onkeyup="sum();" value="<?php echo e(old('alat')); ?>">
                          <?php $__errorArgs = ['alat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="kas" class="col-sm-2 col-form-label">kas</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control <?php $__errorArgs = ['kas'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="kas" id="kas" onkeyup="sum();" value="<?php echo e(old('kas')); ?>">
                          <?php $__errorArgs = ['kas'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div>  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="piutang" class="col-sm-2 col-form-label">Piutang</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control <?php $__errorArgs = ['piutang'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="piutang" id="piutang" onkeyup="sum();" value="<?php echo e(old('piutang')); ?>">
                          <?php $__errorArgs = ['piutang'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div>  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="peralatan" class="col-sm-2 col-form-label">Peralatan Produksi</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control <?php $__errorArgs = ['peralatan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="peralatan" id="peralatan" onkeyup="sum();" value="<?php echo e(old('peralatan')); ?>">
                          <?php $__errorArgs = ['peralatan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div>  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label  for="totaset" class="col-sm-2 col-form-label">Total Aset</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control <?php $__errorArgs = ['totaset'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="totaset" id="totaset" style="padding-bottom:5px" value="<?php echo e(old('totaset')); ?>">
                          <?php $__errorArgs = ['totaset'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                      </div>
              </div>
              
              <div class="card-body">
                  <h5 class="card-title" style="padding-top:5px; padding-bottom:5px">Alat kerja dan alat bantu</h5>
                  <table class="table table-striped" >
                      <thead >
                        <tr>
                          <th> Nama Barang </th>
                          <th> Harga Satuan (Rp)</th>
                          <th> Jumlah Harga (Rp)</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $__currentLoopData = range(0,3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $x): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <tr>        
                            <td > <input type="text" name="nm_brg[]" id="nm_brg-<?php echo e($x); ?>" class="form-control <?php $__errorArgs = ['nm_brg[]'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> " value="<?php echo e(old('nm_brg[]')); ?>">    
                            <?php $__errorArgs = ['nm_brg[]'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </td>  
                            <td > <input type="text" name=" hrg_satuan[]" id="hrg_satuan-<?php echo e($x); ?>" class="form-control " value="<?php echo e(old('hrg_satuan[]')); ?>"></td>
                            <td > <input type="text" name="jmlh[]" id="jmlh-<?php echo e($x); ?>" class="form-control " value="<?php echo e(old('jmlh[]')); ?>"></td>
                          </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </tbody>
                  </table>  
              </div>
              
              <div class="card-body">
                  <h5 class="card-title" style="padding-top:5px; padding-bottom:5px">Tenaga Kerja</h5>
                  <table class="table table-striped" >
                      <thead >
                        <tr>
                          <th> Nama  </th>
                          <th> Jabatan</th>
                          <th> Gaji (Rp)</th>
                          <th> <a href="javascript:void(0);" class="addtenagakerja btn btn-primary" style="float:right;" name="addtenagakerja" id="addtenagakerja">+ </a></th>
                        </tr>
                      </thead>
                      <tbody id="tngkerja" class="tngkerja">
                        <tr>
                          <td > <input type="text" name="nmkry[]" class="form-control <?php $__errorArgs = ['nmkry'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> " value="<?php echo e(old('nmkry[]')); ?>">
                                <?php $__errorArgs = ['nmkry[]'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                          </td>
                          <td > <input type="text" name="jbtkry[]" class="form-control <?php $__errorArgs = ['jbtkry[]'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('jbtkry[]')); ?>"></td>
                          <td > <input type="text" name="gaji[]" class="form-control <?php $__errorArgs = ['gaji[]'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('gaji[]')); ?>"> </td>
                          <td > <a href="javascript:void(0);" class="deleterow btn btn-danger" style="float:right;" name="deleterow">- </a> </td>
                        </tr>
                      </tbody >
                  </table> 
              </div>
              
              <div class="card-body">
                  <h5 class="card-title" style="padding-top:5px; padding-bottom:5px">Biaya Oprasional</h5>
                  <div class="row mb-3">
                    <label for="transport" class="col-sm-2 col-form-label">Transport</label>
                    <div class="col-sm-10">
                      <input type="text" class="uang form-control <?php $__errorArgs = ['transport'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="transport" id="transport" onkeyup="sum1();" value="<?php echo e(old('transport')); ?>">
                        <?php $__errorArgs = ['transport'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="listrik"  class="col-sm-2 col-form-label">Listrik</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control <?php $__errorArgs = ['listrik'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="listrik" id="listrik" onkeyup="sum1();" value="<?php echo e(old('listrik')); ?>" >
                      <?php $__errorArgs = ['listrik'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="telp"  class="col-sm-2 col-form-label">Telepon</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control <?php $__errorArgs = ['telp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="telp" id="telp" onkeyup="sum1();" value="<?php echo e(old('telp')); ?>">
                      <?php $__errorArgs = ['telp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="atk" class="col-sm-2 col-form-label">ATK</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control <?php $__errorArgs = ['atk'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="atk" id="atk" onkeyup="sum1();" value="<?php echo e(old('atk')); ?>">
                      <?php $__errorArgs = ['atk'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="lain" class="col-sm-2 col-form-label">Lain-Lain</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control <?php $__errorArgs = ['lain'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="lain" id="lain" onkeyup="sum1();" value="<?php echo e(old('lain')); ?>">
                      <?php $__errorArgs = ['lain'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label  for="totop" class="col-sm-2 col-form-label">Total Oprasional</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control <?php $__errorArgs = ['totop'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="totop" id="totop" style="padding-bottom:5px" value="<?php echo e(old('totop')); ?>">
                      <?php $__errorArgs = ['totop'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                  </div>
              </div>
              
              <div class="card-body">
                  <h5 class="card-title" style="padding-top:5px; padding-bottom:5px">Penjualan (Omzet)</h5>
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
                        <tr>
                          <td > <input type="text" name="nmomzet[]" class="form-control <?php $__errorArgs = ['nmomzet'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> " value="<?php echo e(old('nmomzet[]')); ?>"> 
                                  <?php $__errorArgs = ['nmomzet[]'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                          </td>
                          <td > <input type="text" name="hrgomzet[]" class="form-control" value="<?php echo e(old('hrgomzet[]')); ?>"> </td>
                          <td > <input type="text" name="jmlhomzet[]" class=" form-control" value="<?php echo e(old('jmlhomzet[]')); ?>" onkeyup="getItems()"> </td>
                          <td > <a href="javascript:void(0);" class="deleterow btn btn-danger" style="float:right;" name="deleterow">- </a> </td>
                        </tr>
                      </tbody > 
                      
                  </table> 
              </div> 
              
              <div class="card-body">
                  <h5 class="card-title" style="padding-top:5px; padding-bottom:5px">Penempatan Modal</h5>
                  <div class="col-12 ">
                    <label for="modal" class="form-label"> Modal Usaha</label>
                    <input type="text" class="form-control <?php $__errorArgs = ['modal'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="modal" id="modal" onkeyup="sum_modal();" value="<?php echo e(old('modal')); ?>">
                      <?php $__errorArgs = ['modal'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
                  <div class="col-12 ">
                    <label for="invst" class="form-label"> Investasi Usaha</label>
                    <input type="text" class="form-control " name="invest" id="invest" onkeyup="sum_modal();" value="<?php echo e(old('invest')); ?>">
                    <p>* Isi strip (-) jika tidak ada Investasi Usaha</p>
                  </div>
                  <div class="col-12 ">
                    <label for="bsr_pjm" class="form-label">Besar Pinjaman yang Diajukan </label>
                    <input type="text" class="form-control <?php $__errorArgs = ['bsr_pjm'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="bsr_pjm" id="bsr_pjm" value="<?php echo e(old('bsr_pjm')); ?>">
                      <?php $__errorArgs = ['bsr_pjm'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
              </div>
              
              <div class="card-body">
                    <h5 class="card-title" style="padding-top:5px; padding-bottom:5px">Manfaat</h5>
                    <table class="table table-striped" id="tabel1">
                      <thead >

                      <table class="table table-striped" >
                        <thead >
                          <tr>
                            <th> Manfaat </th>
                            <th> <a href="javascript:void(0);" class="addmanfaat btn btn-primary" style="float:right;" name="addmanfaat">+ </a></th>
                          </tr>
                        </thead>
                        <tbody id="manfaat" class="manfaat">
                          <tr>
                            <td > <input type="text" name="manfaat[]" class="form-control" value="<?php echo e(old('manfaat[]')); ?>"> </td>
                            <td > <a href="javascript:void(0);" class="deleterow btn btn-danger" style="float:right;" name="deleterow">- </a> </td>
                          </tr>
                        </tbody >
                      </table>              
              </div>
              
              <div class="col-12  " style="margin-top:15px">
                    <div class="mb-3">
                        <label for="bkt_serius" class="form-label">Bukti tanda keseriusan </label>
                        <input class="form-control <?php $__errorArgs = ['bkt_serius'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="file" id="bkt_serius" name="bkt_serius">
                          <?php $__errorArgs = ['bkt_serius'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div> 
              </div>
              
              <div class="col-12  " style="margin-top:15px">
                    <div class="mb-3">
                        <label for="kk" class="form-label">Scan KK </label>
                        <input class="form-control <?php $__errorArgs = ['kk'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="file" id="kk" name="kk">
                          <?php $__errorArgs = ['kk'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div> 
              </div>    
              
              <div class="col-12 " style="margin-top:0px">
                    <div class="mb-3">
                        <label for="foto_kegiatan" class="form-label">Foto Kegiatan Usaha</label>
                        <input class="form-control <?php $__errorArgs = ['foto_kegiatan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="file" id="foto_kegiatan" name="foto_kegiatan">
                        <?php $__errorArgs = ['foto_kegiatan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div> 
              </div>
              
              <div class="col-12 " style="margin-top:0px">
                    <div class="mb-3">
                        <label for="surat_ush" class="form-label">Scan Surat Keterangan Berusaha dari RT/RW Setingkat</label>
                        <input class="form-control <?php $__errorArgs = ['surat_ush'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="file" id="surat_ush" name="surat_ush">
                          <?php $__errorArgs = ['surat_ush'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div> 
              </div> 
              
              <div class="col-md-4" style="margin-top:0px">
                    <label for="inputEmail5" class="form-label">Format Surat Belum Dibina BUMN </label>
                    <button type="button" class="btn btn-success"><i class="bi bi-download"></i> Download</button>
              </div>
              <div class="col-md-8" >
                    <label for="srt_blmbina" class="form-label">Upload Surat Belum Dibina BUMN </label>
                    <input class="form-control <?php $__errorArgs = ['srt_blmbina'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="file" id="srt_blmbina" name="srt_blmbina">
                      <?php $__errorArgs = ['srt_blmbina'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div>
              
              <div class="col-md-4">
                    <label for="inputEmail5" class="form-label">Format Surat Penanggung Jawab berikutnya </label>
                    <button type="button" class="btn btn-success"><i class="bi bi-download"></i> Download</button>
              </div>
              <div class="col-md-8">
                    <label for="srt_pjb" class="form-label">Upload Surat Penanggung Jawab berikutnya  </label>
                    <input class="form-control <?php $__errorArgs = ['srt_pjb'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="file" id="srt_pjb" name="srt_pjb">
                      <?php $__errorArgs = ['srt_pjb'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div>
              
              <div class="col-md-4">
                    <label for="inputEmail5" class="form-label">Format Surat Kesanggupan Melunasi Peminjaman</label>
                    <button type="button" class="btn btn-success"><i class="bi bi-download"></i> Download</button>
              </div>
              <div class="col-md-8">
                    <label for="srt_ksglns" class="form-label">Upload Surat Kesanggupan Melunasi Peminjaman  </label>
                    <input class="form-control <?php $__errorArgs = ['srt_ksglns'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="file" id="srt_ksglns" name="srt_ksglns">
                        <?php $__errorArgs = ['srt_ksglns'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
    
    <script type='text/javascript'>

      $('thead').on('click','.addtenagakerja',function(){
        var tr = "<tr>"+
                    "<td> <input type='text' name='nmkry[]'   class='form-control' value='<?php echo e(old('nmkry[]')); ?>' > </td>"+
                    "<td> <input type='text' name='jbtkry[]'  class='form-control' value='<?php echo e(old('jbtkry[]')); ?>' > </td>"+
                    "<td> <input type='text' name='gaji[]'    class='form-control' value='<?php echo e(old('gaji[]')); ?>' > </td>"+
                    "<td> <a href='javascript:;' class='deleterow btn btn-danger' style='float:right;' name='deleterow'> - </a> </td>"+
                  "</tr>"
            $('#tngkerja').append(tr);
      });
      $('thead').on('click','.addomzet',function(){
        var tr = "<tr>"+                         
                    "<td> <input type='text' name='nmomzet[]'   class='form-control' > </td>"+
                    "<td> <input type='text' name='hrgomzet[]'  class='form-control'> </td>"+
                    "<td> <input type='text' name='jmlhomzet[]' class='form-control'> </td>"+
                    "<td> <a href='javascript:;' class='deleterow btn btn-danger' style='float:right;' name='deleterow'> - </a> </td>"+
                  "</tr>"
            $('#omzet').append(tr);
      });
      $('thead').on('click','.addmanfaat',function(){
        var tr = "<tr>"+
                    "<td> <input type='text' name='jmlh[]' class='form-control'> </td>"+
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
        var result          = parseInt(tanahValue)+parseInt(bangunanValue)+parseInt(persediaanValue)+parseInt(alatValue)+parseInt(kasValue)+parseInt(piutangValue)+parseInt(peralatranValue);
          if (!isNaN(result)){
            document.getElementById('totaset').value=result;
          }
      }

      function sum1(){
        var transportValue  = document.getElementById('transport').value;
        var listrikValue    = document.getElementById('listrik').value;
        var telpValue       = document.getElementById('telp').value;
        var atkValue        = document.getElementById('atk').value;
        var lainValue       = document.getElementById('lain').value;
        var result          = parseInt(transportValue)+parseInt(listrikValue)+parseInt(telpValue)+parseInt(atkValue)+parseInt(lainValue);
          if (!isNaN(result)){
            document.getElementById('totop').value=result;
          }
      }

      function sum_modal(){
        var modalValue  = document.getElementById('modal').value;
        var investValue    = document.getElementById('invest').value;
        var result          = parseInt(modalValue)+parseInt(investValue);
          if (!isNaN(result)){
            document.getElementById('bsr_pjm').value=result;
          }
      }
    </script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\applaravel\pumk\resources\views/dashboard/pengajuan/create.blade.php ENDPATH**/ ?>