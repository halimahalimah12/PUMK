



<?php $__env->startSection('container'); ?>
      <div class="col-lg-12">
          <div class="card">
            <div class="card-header text-white bg-primary text-center">
              <h5>Pengajuan Form</h5>
            </div>
            <div class="card-body">
              <form class="row g-3  contact-form" action="/pengajuan/<?php echo e($pengajuan->id); ?>" method="POST"   >
                <?php echo method_field('put'); ?>
                <?php echo csrf_field(); ?>
                  <div class="col-12 ">
                    <label for="nm_ush" class="form-label" style="margin-top:10px;">Nama Usaha</label>
                    <input type="text" class="form-control" name="nm_ush" id="nm_ush" value="<?php echo e(old('nmush', $pengajuan->data_mitra->data_ush->nama_ush)); ?>" disabled>
                  </div> 
                  <div class="col-12 ">
                    <label for="nm_pjstu" class="form-label" >Nama Mitra</label>
                    <input type="text" class="form-control" name="nm_pjstu" id="nm_pjstu" value="<?php echo e(old('nama', $pengajuan->data_mitra->nm)); ?>" disabled>
                  </div>
                  <div class="col-12 ">
                    <label for="tgl" class="form-label">Tanggal Pengajuan </label>
                    <input type="text" class="form-control " name="tgl" id="tgl" value="<?php echo e(old('tgl', $pengajuan->created_at)); ?>" disabled>
                  </div>
                  <div class="col-12 ">
                    <label for="bsr_pinjaman" class="form-label">Besar Pinjaman </label>
                    <input type="text" class="form-control " name="bsr_pinjaman" id="bsr_pinjaman" value="<?php echo e(old('bsr_pinjaman', $pengajuan->bsr_pinjaman)); ?>" disabled>
                  </div>
                  <hr>
              
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
unset($__errorArgs, $__bag); ?>" name="nm_pjb" id="nm_pjb" value="<?php echo e(old('nm_pjb', $pengajuan->pjb->nm)); ?>"  >
                          <?php $__errorArgs = ['nm_pengajuan->pjb'];
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
unset($__errorArgs, $__bag); ?> "  id="tpt_lhr" name="tpt_lhr" value="<?php echo e(old('tpt_lhr', $pengajuan->pjb->tpt_lhr)); ?>" >
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
unset($__errorArgs, $__bag); ?>"  name="tgl_lhr" value="<?php echo e(old('tgl_lhr', $pengajuan->pjb->tgl_lhr)); ?>">
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
unset($__errorArgs, $__bag); ?>" type="radio" name="gender" id="gender" value="L" <?php echo e($pengajuan->pjb->jk == 'L' ? 'checked':''); ?>>
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
unset($__errorArgs, $__bag); ?>" type="radio" name="gender" id="gender" value="P"  <?php echo e($pengajuan->pjb->jk == 'P' ? 'checked':''); ?>>
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
unset($__errorArgs, $__bag); ?>" id="hub" name="hub"value="<?php echo e(old('hub', $pengajuan->pjb->hub)); ?>">
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
unset($__errorArgs, $__bag); ?>" id="almt" name="almt"value="<?php echo e(old('almt', $pengajuan->pjb->almt)); ?>">
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
unset($__errorArgs, $__bag); ?>"  id="no_hp" name="no_hp" value="<?php echo e(old('no_hp',$pengajuan->pjb->no_hp)); ?>">
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
unset($__errorArgs, $__bag); ?>" id="no_ktp" name="no_ktp" value="<?php echo e(old('no_ktp',$pengajuan->pjb->no_ktp)); ?>">
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
unset($__errorArgs, $__bag); ?>"  name="tgl_ktp" value="<?php echo e(old('tgl_ktp',$pengajuan->pjb->tgl_ktp)); ?>">
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
                              <label class="form-label" for ="pddk">Pendidikan Terakhir</label>
                              <div class="col-sm-12">
                                  <select class="form-select " name="pddk" aria-label="Default select example">
                                    <?php if( $pengajuan->pjb->pddk  != NULL): ?>{
                                            <option  ><?php echo e(old('pddk',$pengajuan->pjb->pddk )); ?></option>
                                            
                                        } 
                                      <?php endif; ?>
                                      <option >-  Pilih -</option>
                                      <option value="SD">SD</option>
                                      <option value="SMP">SMP</option>
                                      <option value="SMA">SMA</option>
                                      <option value="D1">D1</option>
                                      <option value="D1">D2</option>
                                      <option value="D3">D3</option>
                                      <option value="S1">S1</option>
                                      <option value="S2">S2</option>
                                      <option value="S3">S3</option>
                                  </select>
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
unset($__errorArgs, $__bag); ?>"  id="kursus" name="kursus" value="<?php echo e(old('kursus',$pengajuan->pjb->kursus)); ?>">
                                <?php $__errorArgs = ['kursus'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
unset($__errorArgs, $__bag); ?>"  id="jbt" name="jbt" value="<?php echo e(old('jbt',$pengajuan->pjb->jbt)); ?>">
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
                              <input type="hidden" name="oldfoto" value="<?php echo e($pengajuan->pjb->foto); ?>">
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
                              <input type="hidden" name="oldscanktp" value="<?php echo e($pengajuan->pjb->scanktp); ?>">
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
unset($__errorArgs, $__bag); ?>" name="tanah" id="tanah"  onkeyup="sum();" value="<?php echo e(old('tanah', $pengajuan->aset->tanah)); ?>" >
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
                        <label for="tanah" class="col-sm-2 col-form-label">Bangunan</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control <?php $__errorArgs = ['bangunan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="bangunan" id="bangunan" onkeyup="sum();" value="<?php echo e(old('bangunan', $pengajuan->aset->bangunan)); ?>" >
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
unset($__errorArgs, $__bag); ?>" name="persediaan" id="persediaan" onkeyup="sum();" value="<?php echo e(old('persediaan', $pengajuan->aset->persediaan)); ?>" >
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
                        <label for="tanah" class="col-sm-2 col-form-label">Peralatan Usaha</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control <?php $__errorArgs = ['alat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="alat" id="alat" onkeyup="sum();" value="<?php echo e(old('alat', $pengajuan->aset->alat)); ?>" >
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
unset($__errorArgs, $__bag); ?>" name="kas" id="kas" onkeyup="sum();" value="<?php echo e(old('kas', $pengajuan->aset->kas)); ?>" >
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
unset($__errorArgs, $__bag); ?>" name="piutang" id="piutang" onkeyup="sum();" value="<?php echo e(old('piutang', $pengajuan->aset->piutang)); ?>" >
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
unset($__errorArgs, $__bag); ?>" name="peralatan" id="peralatan" onkeyup="sum();" value="<?php echo e(old('peralatan', $pengajuan->aset->peralatan)); ?>" >
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
unset($__errorArgs, $__bag); ?>" name="totaset" id="totaset" style="padding-bottom:5px" value="<?php echo e(old('totaset', $pengajuan->aset->totaset)); ?>" >
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
                        <?php $__currentLoopData = $alat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $x): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <tr>        
                            <td > <input type="text" name="nm_brg[]" class="form-control " value="<?php echo e(old('nm_brg[]', $x->nm_brg)); ?>">    </td>  
                            <td > <input type="text" name=" hrg_satuan[]"  class="form-control" value="<?php echo e(old('hrg_satuan[]', $x->hrg_satuan)); ?>"> </td>
                            <td > <input type="text" name="jmlh[]" class="form-control" value="<?php echo e(old('jmlh[]', $x->jmlh)); ?>"> </td>
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
                          <th> <a href="javascript:void(0);" class="addtenagakerja btn btn-primary" style="float:right;" name="addbarang">+ </a></th>
                        </tr>
                      </thead>
                      <tbody id="tngkerja" class="tngkerja">
                        <?php $__currentLoopData = $tenaga; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $x): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <tr>
                            <td > <input type="text" name="nmkry[]" class="form-control" value="<?php echo e(old('nmkry[]', $x->nm_tngk)); ?>"> </td>
                            <td > <input type="text" name="jbtkry[]" class="form-control" value="<?php echo e(old('jbtkry[]', $x->jbt)); ?>"> </td>
                            <td > <input type="text" name="gaji[]" class="form-control" value="<?php echo e(old('gaji[]', $x->gaji)); ?>"> </td>
                            <td > <a href="javascript:void(0);" class="deleterow btn btn-danger" style="float:right;" name="deleterow">- </a> </td>
                          </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
unset($__errorArgs, $__bag); ?>" name="transport" id="transport" onkeyup="sum1();"value="<?php echo e(old('transport',$pengajuan->oprasional->transport)); ?>">
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
unset($__errorArgs, $__bag); ?>" name="listrik" id="listrik" onkeyup="sum1();" value="<?php echo e(old('listrik',$pengajuan->oprasional->listrik)); ?>" >
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
unset($__errorArgs, $__bag); ?>" name="telp" id="telp" onkeyup="sum1();" value="<?php echo e(old('telp',$pengajuan->oprasional->telpon)); ?>">
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
unset($__errorArgs, $__bag); ?>" name="atk" id="atk" onkeyup="sum1();" value="<?php echo e(old('atk', $pengajuan->oprasional->atk)); ?>">
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
unset($__errorArgs, $__bag); ?>" name="lain" id="lain" onkeyup="sum1();" value="<?php echo e(old('lain',$pengajuan->oprasional->lain)); ?>"> 
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
unset($__errorArgs, $__bag); ?>" name="totop" id="totop" style="padding-bottom:5px" value="<?php echo e($pengajuan->oprasional->totop); ?>">
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
                      <?php $__currentLoopData = $omzet; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $x): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <td > <input type="text" name="nmomzet[]" class="form-control" value="<?php echo e(old('nmomzet[]',$x->nm_brg)); ?>"> </td>
                          <td > <input type="text" name="hrgomzet[]" class="form-control" value="<?php echo e(old('hrgomzet[]',$x->hrg_satuan)); ?>"> </td>
                          <td > <input type="text" name="jmlhomzet[]" class=" form-control" value="<?php echo e(old('jmlhomzet[]',$x->jmlh)); ?>" onkeyup="getItems()"> </td>
                          <td > <a href="javascript:void(0);" class="deleterow btn btn-danger" style="float:right;" name="deleterow">- </a> </td>
                        </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      
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
unset($__errorArgs, $__bag); ?>" name="modal" id="modal" onkeyup="sum_modal();" value="<?php echo e($pengajuan->modal); ?>">
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
                    <input type="text" class="form-control " name="invest" id="invest" onkeyup="sum_modal();" value="<?php echo e($pengajuan->investasi); ?>">
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
unset($__errorArgs, $__bag); ?>" name="bsr_pjm" id="bsr_pjm" value="<?php echo e($pengajuan->bsr_pinjaman); ?>">
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
                              <th> <a href="javascript:void(0);" class="addmanfaat btn btn-primary" style="float:right;" name="addmanfaat" >+ </a></th>
                            </tr>
                          
                          
                        </thead>
                        <tbody id="manfaat" class="manfaat">
                          <?php $__currentLoopData = $manfaat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $x): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                              <td > <input type="text" name="manfaat[]" class="form-control" value="<?php echo e(old('manfaat[]', $x->manfaat)); ?>" > </td>
                              <td > <a href="javascript:void(0);" class="deleterow btn btn-danger" style="float:right;" name="deleterow">- </a> </td>
                            </tr>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody >
                      </table>              
              </div>
              <div class="col-12  " style="margin-top:15px">
                    <div class="mb-3">
                        <label for="bkt_serius" class="form-label">Bukti tanda keseriusan </label>
                        <input type="text" name="oldbktserius" value="<?php echo e($pengajuan->bkt_keseriusan); ?>">
                        <input class="form-control <?php $__errorArgs = ['bkt_serius'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="file" id="bkt_serius" name="bkt_serius" value="<?php echo e(old('bkt_serius', $pengajuan->bkt_keseriusan)); ?>">
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
                        <input type="hidden" name="oldkk" value="<?php echo e($pengajuan->kk); ?>">
                        <input class="form-control <?php $__errorArgs = ['kk'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="file" id="kk" name="kk" value="<?php echo e(old('kk')); ?>">
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
                        <input type="hidden" name="oldftkegt" value="<?php echo e($pengajuan->foto_kegiatan); ?>">
                        <input class="form-control <?php $__errorArgs = ['foto_kegiatan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="file" id="foto_kegiatan" name="foto_kegiatan" value="<?php echo e(old('foto_kegiatan')); ?>">
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
                        <input type="hidden" name="oldsrtush" value="<?php echo e($pengajuan->surat_ush_rt); ?>">
                        <input class="form-control <?php $__errorArgs = ['surat_ush'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="file" id="surat_ush" name="surat_ush" value="<?php echo e(old('surat_ush')); ?>">
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

              
              <div class="col-md-12" >
                    <label for="srt_blmbina" class="form-label">Upload Surat Belum Dibina BUMN </label>
                    <input type="hidden" name="oldbumn" value="<?php echo e($pengajuan->surat_blmbina); ?>">
                    <input class="form-control <?php $__errorArgs = ['srt_blmbina'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="file" id="srt_blmbina" name="srt_blmbina" value="<?php echo e(old('srt_blmbina')); ?>">
                      <?php $__errorArgs = ['srt_blmbina'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div>

              
              <div class="col-md-12">
                    <label for="srt_pjb" class="form-label">Upload Surat Penanggung Jawab berikutnya  </label>
                    <input type="hidden" name="oldpjb" value="<?php echo e($pengajuan->surat_pjb); ?>">
                    <input class="form-control <?php $__errorArgs = ['srt_pjb'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="file" id="srt_pjb" name="srt_pjb" value="<?php echo e(old('srt_pjb')); ?>">
                      <?php $__errorArgs = ['srt_pjb'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div>

              
              <div class="col-md-12">
                    <label for="srt_ksglns" class="form-label">Upload Surat Kesanggupan Melunasi Peminjaman  </label>
                    <input type="hidden" name="oldlunas" value="<?php echo e($pengajuan->surat_ksglns); ?>">
                    <input class="form-control <?php $__errorArgs = ['srt_ksglns'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="file" id="srt_ksglns" name="srt_ksglns" value="<?php echo e(old('srt_ksglns')); ?>">
                        <?php $__errorArgs = ['srt_ksglns'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div>

                <button type="submit" class="btn btn-primary"><i class="ri-send-plane-fill"></i></i> Kirim </button>
              </form>
            </div>
          </div>
      </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
    
    <script type='text/javascript'>
    //$("#tanah").inputmask({
      //      prefix : 'Rp ',
      //      radixPoint: ',',
      //      groupSeparator: ".",
      //      alias: "numeric",
      //      autoGroup: true,
      //      digits: 0
      //  });

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

    $("#simpan").on('click',function(){
      var totaset    = $('#totaset').val();         
    })

  </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\applaravel\pumk\resources\views/dashboard/pengajuan/edit.blade.php ENDPATH**/ ?>