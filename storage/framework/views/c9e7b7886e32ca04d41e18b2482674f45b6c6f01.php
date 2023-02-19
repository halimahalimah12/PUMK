

<?php $__env->startSection('container'); ?>
  <?php if($user->is_admin ==0 ): ?>
      <?php if(session()-> has('success')): ?>
          <?php if($mitra->scanktp == NULL && $mitra->tpt_lhr == NULL && $mitra->tgl_lhr == NULL && $mitra->sts_prk == NULL && $mitra->jk == NULL && $mitra->almt == NULL && $mitra->no_hp == NULL && $mitra->pddk == NULL && $mitra->jbt == NULL && $mitra->kursus == NULL && $mitra->no_ktp == NULL): ?>
              <div class="alert alert-primary alert-dismissible fade show" role="alert" style="padding-bottom:1px">
                <p>
                  <i class="bi bi-emoji-smile"></i>
                  <?php echo e(session('success')); ?>  
                  <a href="/profil/" class="alert-link" > <ins> Klik </ins>  </a> untuk melengkapi data diri 
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </p>
              </div>
            <?php else: ?>
              <div class="alert alert-primary alert-dismissible fade show" role="alert" style="padding-bottom:1px">
                <p>
                  <i class="bi bi-emoji-smile"></i>
                  <?php echo e(session('success')); ?>  
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </p>
              </div>
          <?php endif; ?>
        <?php else: ?>
      <?php endif; ?>
    <?php else: ?>
  <?php endif; ?>
  

  

<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\applaravel\pumk\resources\views/dashboard/index.blade.php ENDPATH**/ ?>