

<?php $__env->startSection('container'); ?>

  <div class="card">
    <div class="card-body">
        <h5 class="card-title">Pengajuan </h5>
            <?php if($user->is_admin ==0 ): ?>
                <?php if(session('success')): ?>
                    <div class="alert alert-success">
                      <?php echo e(session ('success')); ?>, Silahkan tunggu pemberitahuan berikutnya. 
                    </div>
                <?php endif; ?> 
              <?php else: ?>
                <?php if(session('success')): ?>
                  <div class="alert alert-success">
                    <?php echo e(session ('success')); ?>

                  </div>
                <?php endif; ?> 
            <?php endif; ?>
              
            <?php if($user->is_admin ==0 ): ?>
                  <?php if($mitra->scanktp == NULL && $mitra->tpt_lhr == NULL && $mitra->tgl_lhr == NULL && $mitra->sts_prk == NULL && $mitra->jk == NULL && $mitra->almt == NULL && $mitra->no_hp == NULL && $mitra->pddk == NULL && $mitra->jbt == NULL && $mitra->kursus == NULL && $mitra->no_ktp == NULL        ): ?>
                      <div class="alert alert-info"> Silahkan Lengkapi Data Diri Terlebih Dahulu.</div>
                    <?php elseif($ush->jnsush==NULL && $ush->akta_ush ==NULL && $ush->izin_ush==NULL && $ush->thn_bersiri==NULL && $ush->almt_ush==NULL && $ush->almt_ush==NULL && $ush->nohp_ush==NULL && $ush->npwp==NULL && $ush->tmptush==NULL      ): ?>
                      <div class="alert alert-info"> Silahkan Lengkapi Data Usaha Terlebih Dahulu.</div>
                    <?php else: ?>
                      <?php if(empty($last)): ?>
                          <button type="button" class="btn btn-primary"> <a href="/pengajuan/create"  style="color:white;"> Tambah</a></button>
                          <?php else: ?>
                              <?php if($last->status == 'tidak'): ?>
                                    <button type="button" class="btn btn-primary"> <a href="/pengajuan/create"  style="color:white;"> Tambah</a> </button>
                                <?php else: ?>
                              <?php endif; ?>
                      <?php endif; ?>
                  <?php endif; ?>
              
                <table class="table ">
                  <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th> Tanggal</th>
                      <th scope="col">Status</th>
                      <?php if($ket->ket != NULL): ?>
                      <th scope="col">Keterangan</th>
                      <?php endif; ?>
                      <th scope="col">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $__currentLoopData = $pengajuan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td><?php echo e($p->created_at); ?></td>
                        <td>  
                          <?php if($p->status == 'menunggu'): ?> 
                              <span class="badge bg-secondary">Menunggu</span>
                            <?php elseif($p->status == 'lulus'): ?>
                              <span class="badge bg-success">Pengajuan Diterima</span>
                            <?php else: ?>
                              <span class="badge bg-danger">Pengajuan Ditolak</span>
                          <?php endif; ?>
                        </td>
                        <?php if($ket->ket != NULL): ?>
                        <td><?php echo e($p->ket); ?> </td>
                        <?php endif; ?>
                        <td>
                          <a href="/pengajuan/show" class="bi bi-file-earmark-text" ></a>
                          <a href="/cetak/<?php echo e($p->id); ?>" class="bi bi-printer"> </a>
                            
                            
                        </td>
                      </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>
                </table>
              <?php else: ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin')): ?>
                  <!-- pengajua admin -->
                  <button type="button" class="btn btn-primary"><a href="/pengajuan/create"  style="color:white;"> Tambah</a></button>
                    <?php if(session('flash_message_success')): ?>
                      <div class="alert alert-success">
                          <?php echo e(session('flash_message_success')); ?>

                      </div>
                    <?php endif; ?>
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Usaha</th>
                        <th scope="col">Besar Pinjaman</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Status</th>
                        <?php if( $ket->ket != NULL ): ?>
                          <th scope="col">Keterangan</th>
                        <?php endif; ?>
                          <th scope="col">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $__currentLoopData = $pengajuan1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <td><?php echo e($loop->iteration); ?></td>
                          <td><?php echo e(ucwords($p->data_mitra->data_ush->nama_ush)); ?></td>
                          <td><?php echo e($p->formatRupiah('bsr_pinjaman')); ?></td>
                          <td><?php echo e($p->created_at); ?></td>
                          <td>  
                            <?php if($p->status == 'menunggu'): ?> 
                                <button type="button" class="btn  btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#menunggu-<?php echo e($p->id); ?>">
                                Menunggu
                                </button>
                                
                              <?php elseif($p->status == 'lulus'): ?>
                                
                                <span class="badge bg-success">Pengajuan Diterima</span>
                              <?php else: ?>
                                <span class="badge bg-danger">Pengajuan Ditolak</span>
                            <?php endif; ?>
                          </td>
                            <?php if( $p->ket != NULL ): ?>
                              <td scope="col"><?php echo e($p->ket); ?></td>
                            <?php endif; ?>

                          <td>
                            <a href="/show/<?php echo e($p->id); ?>" class="bi bi-file-earmark-text" ></a>
                            <a href="/survei/<?php echo e($p->id); ?>" class="bi bi-file-earmark-check" ></a>
                            <a href="/pengajuan/<?php echo e($p->id); ?>/edit" class="bi bi-pencil-square" ></a>|
                            <a href="/hapus/<?php echo e($p->id); ?>" class="bi bi-trash" onclick="return confirm('Apakah anda yakin ? ')"></a>
                            
                            
                          </td>
                        </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                    </tbody>
                  </table>

                  
                  
                  <?php $__currentLoopData = $pengajuan1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="modal fade" id="menunggu-<?php echo e($p->id); ?>" tabindex="-1">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Basic Modal</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <form class="row g-3  contact-form" action="/konfirmasi/<?php echo e($p->id); ?>" method="post"   >
                            <?php echo method_field('put'); ?>
                            <?php echo csrf_field(); ?>
                            <div class="modal-body">
                                  <div class="col-4 form-group clearfix">
                                    <label class="form-label" for ="status">Status</label>
                                    <div class="col-sm-12">
                                      <select class="form-select" name="statuspeng" id="statuspeng"  aria-label="Default select example">
                                          <?php if( $p->status  == NULL): ?>{
                                              <option >Open this select menu</option>
                                            } <?php else: ?> {
                                              <?php if($p->status == "menunggu"): ?> {
                                                  <option value = "menunggu">Menunggu</option>
                                                } <?php elseif($p->status == "lulus" ): ?>{
                                                  <option value = "lulus">Lulus</option>
                                                }<?php else: ?>{
                                                  <option value = "tidak">Tolak</option>
                                                }<?php endif; ?>
                                            } <?php endif; ?>
                                              <option value = "lulus">Lulus</option>
                                              <option value = "tidak">Tolak</option>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="col-12 " >
                                    <label for="bsrpemin" class="form-label" >Besar Peminjaman yang diberikan </label>
                                    <input type="text" class="form-control hide" name="bsrpemin"  id="bsrpemin">
                                  </div> 
                                  <div class="col-12 ">
                                    <label for="ket" class="form-label">Keterangan </label>
                                    <input type="text" class="form-control hide" name="ket" id="ket">
                                  </div>
                                
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="submit"  class="btn btn-primary">Save changes</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div><!-- End Basic Modal-->
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            <?php endif; ?>
    </div>
  </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
    
      <script type='text/javascript'>
        $('#statuspeng').on('change', function(e){
          console.log(e);
          var status= e.target.value;
          //var status = document.getElementById("statuspeng") ;
          if (status == "menunggu"){
            $('#bsrpemin').hide();
            $('#ket').hide();
          }else{
            $('#bsrpemin').show();
            $('#ket').show();
          }
        });
      </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\applaravel\pumk\resources\views/dashboard/pengajuan/index.blade.php ENDPATH**/ ?>