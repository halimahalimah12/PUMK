

<?php $__env->startSection('container'); ?>

  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Biodata Mitra</h5>
        <form  method="post" action="<?php echo e(route('profil.update')); ?>" enctype="multipart/form-data" >
          <?php echo csrf_field(); ?>
          <?php if(session('success')): ?>
              <div class="alert alert-success">
                <?php echo e(session ('success')); ?>

              </div>
          <?php endif; ?> 
          <div class="row">  
            
            <div class="col-lg-12">
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <h3 class="panel-title " >Data Diri Pemilik Usaha</h3>
                </div>
                <div class="panel-body">
                  <div class="form-group">
                    <label for="nama" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo e(ucwords($mitra->nm)); ?>" disabled>                 
                  </div>
                  <div class="row gx-3 gy-0">
                    <div class="col-12 col-lg-4 form-group clearfix ">
                      <label for="bangsa" class="form-label">Kebangsaan</label>
                      <input type="text" class="form-control <?php $__errorArgs = ['bangsa'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> "  id="bangsa" name="bangsa" value="<?php echo e(ucwords($mitra->bangsa)); ?>"disabled >
                        <?php $__errorArgs = ['bangsa'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col-12 col-lg-4 form-group clearfix ">
                      <label for="tmptlahir" class="form-label">Tempat Lahir</label>
                      <input type="text" class="form-control <?php $__errorArgs = ['tmptlahir'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> "  id="tmptlahir" name="tmptlahir" value="<?php echo e(old('tmptlahir',ucwords($mitra->tpt_lhr))); ?>" >
                        <?php $__errorArgs = ['tmptlahir'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col-12 col-lg-4 form-group clearfix">
                      <label for="tgllahir" class="form-label">Tanggal Lahir</label>
                      <div class="col-sm-10">
                        <input type="date" class="form-control <?php $__errorArgs = ['tgllahir'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  name="tgllahir" value="<?php echo e(old('tgllahir', $mitra->tgl_lhr)); ?>">
                          <?php $__errorArgs = ['tgllahir'];
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
                  <div class="row gx-5 gy-1  form-group clearfix" >
                    <div class="col-12 col-lg-8">
                        <label for="stsper" class="form-label">Status Pernikahan</label>
                        <div>
                          <div class="form-check form-check-inline">
                              <input class="form-check-input <?php $__errorArgs = ['stsper'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="radio" name="stsper" id="stsper" value="belum"  <?php echo e($mitra->sts_prk == 'belum' ? 'checked':''); ?>  <?php echo e(old('stsper') =="belum" ? 'checked' : ''); ?>>
                              <label class="form-check-label" for="stsper"> Belum Kawin</label>
                          </div>
                          <div class="form-check form-check-inline">
                              <input class="form-check-input <?php $__errorArgs = ['stsper'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="radio" name="stsper" id="stsper" value="kawin"  <?php echo e($mitra->sts_prk == 'kawin' ? 'checked':''); ?> <?php echo e(old('stsper') =="kawin" ? 'checked' : ''); ?>>
                              <label class="form-check-label" for="stsper">Kawin </label>
                          </div>
                          <div class="form-check form-check-inline">
                              <input class="form-check-input <?php $__errorArgs = ['stsper'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="radio" name="stsper" id="stsper" value="cerhidup" <?php echo e($mitra->sts_prk == 'cerhidup' ? 'checked':''); ?>  <?php echo e(old('stsper') =="cerhidup" ? 'checked' : ''); ?>>
                              <label class="form-check-label" for="stsper">Cerai Hidup</label>
                          </div>
                          <div class="form-check form-check-inline">
                              <input class="form-check-input <?php $__errorArgs = ['stsper'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="radio" name="stsper" id="stsper"  value=" cermati" <?php echo e($mitra->sts_prk == 'cermati' ? 'checked':''); ?> <?php echo e(old('stsper') =="cermati" ? 'checked' : ''); ?>>
                              <label class="form-check-label" for="stsper"> Cerai Mati</label>
                          </div>
                        </div>
                        <?php $__errorArgs = ['stsper'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col-12 col-lg-4">
                        <label for="gender" class="form-label">Jenis Kelamin</label>
                        <div class="form-check">
                            <input class="form-check-input <?php $__errorArgs = ['gender'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="radio" name="gender" id="gender" value="L" <?php echo e(old('gender',$mitra->jk) =="L" ? 'checked' : ''); ?>>
                            <label class="form-check-label" for="gender">Laki-Laki </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input <?php $__errorArgs = ['gender'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="radio" name="gender" id="gender" value="P"  <?php echo e(old('gender',$mitra->jk) =="P" ? 'checked' : ''); ?>>
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
                  </div>
                  <div class="row gx-3 gy-0">
                    <div class="col-12 col-lg-6 form-group clearfix" >
                      <label for="pekerjaan" class="form-label">Pekerjaan</label>
                      <input type="text" class="form-control <?php $__errorArgs = ['pekerjaan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="pekerjaan" name="pekerjaan"value="<?php echo e(old('pekerjaan',ucwords($mitra->pekerjaan))); ?>">
                        <?php $__errorArgs = ['pekerjaan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col-12 col-lg-6 form-group clearfix" >
                      <label for="alamat" class="form-label">Alamat</label>
                        <textarea class="form-control  <?php $__errorArgs = ['alamat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="alamat" name="alamat" value="<?php echo e(old('alamat')); ?>" style="height: 100px"><?php echo e(ucwords($mitra->almt)); ?></textarea>
                        <?php $__errorArgs = ['alamat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                  </div>
                  <div class="row gx-3 gy-0">
                    <div class="col-12 col-lg-4 form-group clearfix">
                      <label for="klh" class="form-label">Kelurahan</label>
                      <input type="text" class="form-control <?php $__errorArgs = ['klh'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  id="klh" name="klh" value="<?php echo e(old('klh', ucwords($mitra->kel))); ?>">
                        <?php $__errorArgs = ['klh'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col-12 col-lg-4  form-group clearfix">
                      <label for="kec" class="form-label">Kecamatan </label>
                      <input type="text" class="form-control <?php $__errorArgs = ['kec'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  id="kec" name="kec"value="<?php echo e(old('kec', ucwords($mitra->kec))); ?>">
                        <?php $__errorArgs = ['kec'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col-12 col-lg-4 form-group clearfix">
                      <label for="kab" class="form-label">Kabupaten </label>
                      <input type="text" class="form-control <?php $__errorArgs = ['kab'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"   id="kab" name="kab" value="<?php echo e(old('kab', ucwords($mitra->kab))); ?>">
                        <?php $__errorArgs = ['kab'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                  </div>
                  <div class="row gx-3 gy-0">
                    <div class="col-12 col-lg-4 form-group clearfix">
                      <label for="notlp" class="form-label">No Telephone</label>
                      <input type="text" class="form-control <?php $__errorArgs = ['notlp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  id="notlp" name="notlp" value="<?php echo e(old('notlp', $mitra->no_hp)); ?>">
                        <?php $__errorArgs = ['notlp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>        
                    <div class="col-12 col-lg-4  form-group clearfix">
                      <label for="noktp" class="form-label">No KTP </label>
                      <input type="text" class="form-control <?php $__errorArgs = ['noktp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="noktp" name="noktp" value="<?php echo e(old('noktp', $mitra->no_ktp)); ?>">
                        <?php $__errorArgs = ['noktp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col-12 col-lg-4 form-group clearfix">
                      <label for="tglktp" class="form-label">Tanggal KTP</label>
                      <input type="date" class="form-control <?php $__errorArgs = ['tglktp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  name="tglktp" value="<?php echo e(old('tglktp', $mitra->tgl_ktp)); ?>">
                        <?php $__errorArgs = ['tglktp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                      
                    </div>
                  </div>
                  <div class="row gx-3 gy-0">
                    <div class="col-12 col-lg-4 form-group clearfix">
                      <label class="form-label" for ="pddk">Pendidikan Terakhir</label>
                        <select class="form-select <?php $__errorArgs = ['pddk'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="pddk" aria-label="Default select example">
                            <option value = "">- Pilih -</option>
                            <option value="SD"  <?php echo e(old('pddk',$mitra->pddk)=="SD"  ? 'selected' : ''); ?>>SD</option>
                            <option value="SMP" <?php echo e(old('pddk',$mitra->pddk)=="SMP" ? 'selected' : ''); ?>>SMP</option>
                            <option value="SMA" <?php echo e(old('pddk',$mitra->pddk)=="SMA" ? 'selected' : ''); ?>>SMA</option>
                            <option value="D1"  <?php echo e(old('pddk',$mitra->pddk)=="D1" ? 'selected' : ''); ?> >D1</option>
                            <option value="D1"  <?php echo e(old('pddk',$mitra->pddk)=="D2" ? 'selected' : ''); ?> >D2</option>
                            <option value="D3"  <?php echo e(old('pddk',$mitra->pddk)=="D3" ? 'selected' : ''); ?> >D3</option>
                            <option value="S1"  <?php echo e(old('pddk',$mitra->pddk)=="S1" ? 'selected' : ''); ?> >S1</option>
                            <option value="S2"  <?php echo e(old('pddk',$mitra->pddk)=="S2" ? 'selected' : ''); ?> >S2</option>
                            <option value="S3"  <?php echo e(old('pddk',$mitra->pddk)=="S3" ? 'selected' : ''); ?> >S3</option>
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
                    <div class="col-12 col-lg-4 form-group clearfix">
                      <label for="kursus" class="form-label">Kursus </label>
                      <input type="text" class="form-control <?php $__errorArgs = ['kursus'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  id="kursus" name="kursus" value="<?php echo e(old('kursus', ucwords($mitra->kursus))); ?>">
                        <?php $__errorArgs = ['kursus'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                      <p>* Jika tidak ada, beri tanda strip(-) </p>
                    </div>
                    <div class="col-12 col-lg-4 form-group clearfix">
                      <label for="jbt" class="form-label">Jabatan</label>
                      <input type="text" class="form-control <?php $__errorArgs = ['jbt'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  id="jbt" name="jbt" value="<?php echo e(old('jbt', ucwords($mitra->jbt))); ?>">
                        <?php $__errorArgs = ['jbt'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div> 
                  </div>           
                  <div class="col-10 form-group clearfix">
                    <label for="foto" class="form-label">Pas Foto</label>
                    <div class="row g-3">
                      <div class="col-sm-10">
                        <input class="form-control <?php $__errorArgs = ['foto'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  type="file" id="foto" name="foto" value="<?php echo e(old('foto', $mitra->foto)); ?>">
                          <?php $__errorArgs = ['foto'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                      </div> 
                      <?php if($mitra->foto==NULL): ?>
                        <?php else: ?>
                        <div class="col-sm-2">
                          <button type="button" class="btn btn-primary btn-sm"> <a href="/foto"style="color:white;"> Lihat </a></button>
                        </div>
                      <?php endif; ?>
                    </div>
                  </div>  
                  <div class="col-10 form-group clearfix">
                    <label for="scanktp" class="form-label">Scan KTP</label>
                    <div class="row g-3">
                      <div class="col-sm-10">
                        <input class="form-control <?php $__errorArgs = ['scanktp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  type="file" id="scanktp" name="scanktp" value="<?php echo e(old('scanktp', $mitra->scanktp)); ?>">
                          <?php $__errorArgs = ['scanktp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                      </div> 
                      <?php if($mitra->scanktp==NULL): ?>
                        <?php else: ?>
                          <div class="col-sm-2">
                            <button type="button" class="btn btn-primary btn-sm"> <a href="/scanktp"style="color:white;"> Lihat </a></button>
                          </div>
                      <?php endif; ?>
                    </div>
                  </div>        
                </div>
              </div>
            </div>
            
            <div class="col-lg-12">
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <h3 class="panel-title " >Data Usaha Mitra</h3>
                </div>
                <div class="panel-body">
                  <div class="form-group">
                    <div class="col-12 form-group ">
                      <label for="nmush" class="form-label" value="">Nama Usaha</label>
                      <input type="text" class="form-control " id="nmush" name="nmush" value="<?php echo e(ucwords($ush->nama_ush)); ?>"disabled>
                    </div>
                  </div>
                  <div class="row gy-0 gx-3">
                    <div class="col-12 col-lg-6  form-group clearfix">
                      <label for="sektorush" class="form-label">Sektor Usaha</label>
                      <div class="col-sm-12">
                        <select class="form-select <?php $__errorArgs = ['sektorush'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="sektorush" name="sektorush" >
                            <option selected  value ="">- Pilih -</option>            
                            <option value="industri"    <?php echo e(old('sektorush',$ush->sektorush)=="industri"    ? 'selected' : ''); ?>>Industri</option>
                            <option value="jasa"        <?php echo e(old('sektorush',$ush->sektorush)=="jasa"        ? 'selected' : ''); ?>>Jasa</option>
                            <option value="perdagangan" <?php echo e(old('sektorush',$ush->sektorush)=="perdagangan" ? 'selected' : ''); ?>>Perdagangan</option>
                            <option value="perikanan"   <?php echo e(old('sektorush',$ush->sektorush)=="perikanan"   ? 'selected' : ''); ?>>Perikanan</option>
                            <option value="pertanian"   <?php echo e(old('sektorush',$ush->sektorush)=="pertanian"   ? 'selected' : ''); ?>>Pertanian</option>
                            <option value="perternakan" <?php echo e(old('sektorush',$ush->sektorush)=="perternakan" ? 'selected' : ''); ?>>Perternakan</option>
                        </select>
                        <?php $__errorArgs = ['sektorush'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                      </div>
                    </div>
                    <div class="col-12 col-lg-6 form-group ">
                      <label for="jnsush" class="form-label" value="">Jenis Usaha</label>
                      <input type="text" class="form-control <?php $__errorArgs = ['jnsush'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  id="jnsush" name="jnsush" value="<?php echo e(old('jnsush', ucwords($ush->jnsush))); ?>">
                        <?php $__errorArgs = ['jnsush'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                  </div>
                  <div class="row gx-3 gy-0">
                    <div class="col-12 col-lg-6 form-group ">
                      <label for="thnbrd" class="form-label" value="">Tahun Berdiri</label>
                      <input type="text" class="form-control <?php $__errorArgs = ['thnbrd'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  id="thnbrd" name="thnbrd" value="<?php echo e(old('thnbrd', $ush->thn_berdiri)); ?>">
                        <?php $__errorArgs = ['thnbrd'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class=" form-group col-lg-6 col-12 ">
                      <label for="notlpush" class="form-label" value="">No Telphone Usaha</label>
                      <input type="text" class="form-control <?php $__errorArgs = ['notlpush'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"   id="notlpush" name="notlpush" value="<?php echo e(old('notlpush', $ush->nohp_ush)); ?>">
                        <?php $__errorArgs = ['notlpush'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                  </div>
                  <div class="row gx-3 gy-0">
                    <div class=" form-group col-lg-6 col-12">
                      <label for="almtush" class="form-label" value="">Alamat Usaha</label>
                      <input type="text" class="form-control <?php $__errorArgs = ['almtush'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  id="almtush" name="almtush" value="<?php echo e(old('almtush', ucwords($ush->almt_ush))); ?>">
                        <?php $__errorArgs = ['almtush'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col-12 col-lg-6 form-group ">
                      <label for="npwp" class="form-label" value="">NPWP</label>
                      <input type="text" class="form-control <?php $__errorArgs = ['npwp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  id="npwp" name="npwp" value="<?php echo e(old('npwp', $ush->npwp)); ?>">
                        <?php $__errorArgs = ['npwp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                  </div>
                  <div class="row gx-3 gy-0">
                    <div class="col-lg-6 col-12  form-group ">
                      <label for="izinush" class="form-label" value="">Izin Usaha</label>
                      <input type="text" class="form-control <?php $__errorArgs = ['izinush'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  id="izinush" name="izinush" value="<?php echo e(old('izinush', $ush->izin_ush)); ?>">
                          <?php $__errorArgs = ['izinush'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                      <p>* Jika tidak ada, beri tanda strip(-) </p>
                    </div>
                    <div class="col-lg-6 col-12 form-group ">
                      <label for="aktaush" class="form-label" value="">Akta Usaha</label>
                      <input type="text" class="form-control <?php $__errorArgs = ['aktaush'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="aktaush" name="aktaush" value="<?php echo e(old('aktaush', $ush->akta_ush)); ?>">
                        <?php $__errorArgs = ['aktaush'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                      <p>* Jika tidak ada, beri tanda strip(-) </p>
                    </div>
                  </div>
                  <div class="row gx-3 gy-0">
                    <div class=" col-12 col-lg-6 form-group clearfix " >
                      <label for="tmptush" class="form-label">Tempat Usaha</label> <br>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input <?php $__errorArgs = ['tmptush'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"value="sewa"name="tmptush"id="sewa"type="radio"<?php echo e(old('tmptush',$ush->tmptush) =="sewa" ? 'checked' : ''); ?>>
                          <label class=" form-check-label" for="sewa">Sewa</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input <?php $__errorArgs = ['tmptush'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"value="sendiri"name="tmptush"id="sendiri"type="radio"<?php echo e(old('tmptush',$ush->tmptush) =="sendiri" ? 'checked' : ''); ?> >
                          <label class=" form-check-label" for="sendiri"> Milik Sendiri</label>
                        </div>
                        <?php $__errorArgs = ['tmptush'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>   
                    </div>
                    <div class="col-lg-6 col-12 form-group clearfix">
                        <label class="form-label" for ="bank">Bank</label>
                        <div class="col-sm-12">
                            <select class="form-select <?php $__errorArgs = ['bank'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="bank" aria-label="Default select example">
                                <option value="" >- Pilih -</option>
                                <option value="mandiri" <?php echo e(old('bank') =="mandiri" ? 'selected' : ''); ?> <?php echo e($ush->bank== 'mandiri' ? 'selected':''); ?>>Mandiri</option>
                                <option value="bri" <?php echo e(old('bank') =="bri" ? 'selected' : ''); ?> <?php echo e($ush->bank== 'bri' ? 'selected':''); ?>>BRI</option>
                            </select>
                            <?php $__errorArgs = ['bank'];
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
                  <div class="row gx-3 gy-0">
                    <div class="col-lg-4 col-12 form-group clearfix">
                      <label for="almtbank" class="form-label">Alamat Bank </label>
                      <input type="text" class="form-control <?php $__errorArgs = ['almtbank'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  id="almtbank" name="almtbank" value="<?php echo e(old('almtbank',ucwords($ush->almtbank))); ?>">
                        <?php $__errorArgs = ['almtbank'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col-lg-4 col-12 form-group clearfix">
                      <label for="atsnm" class="form-label">Atas Nama </label>
                      <input type="text" class="form-control <?php $__errorArgs = ['atsnm'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  id="atsnm" name="atsnm" value="<?php echo e(old('atsnm',ucwords($ush->atsnm))); ?>">
                        <?php $__errorArgs = ['atsnm'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col-lg-4 col-12 form-group clearfix">
                      <label for="norek" class="form-label">Nomor Rekening</label>
                      <input type="text" class="form-control <?php $__errorArgs = ['norek'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  id="norek" name="norek" value="<?php echo e(old('norek',$ush->norek)); ?>">
                        <?php $__errorArgs = ['norek'];
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
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="form-group clearfix">
                <label for="confirm1"> </label>
                  <center>
                    <div class="alert alert-warning" style="color:black !important">
                      Sebelum Melakukan Update Data , Periksa Kembali Isian Data , Pastikan Semua Data Telah Terisi Dengan Benar
                      <br>
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i></i> Update Data </button>
                  </center>
              </div>
            </div>
          </div>
        </form>
    </div>
  </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\applaravel\pumk\resources\views/dashboard/profil/index.blade.php ENDPATH**/ ?>