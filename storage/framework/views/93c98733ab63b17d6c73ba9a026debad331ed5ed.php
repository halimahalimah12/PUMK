

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
              <div class="alert alert-info"> Silahkan Lengkapi <a href="/profil/" class="alert-link" > <ins> Data Diri </ins>  </a>  Terlebih Dahulu.</div>
            <?php elseif($ush->jnsush==NULL && $ush->akta_ush ==NULL && $ush->izin_ush==NULL && $ush->thn_bersiri==NULL && $ush->almt_ush==NULL && $ush->almt_ush==NULL && $ush->nohp_ush==NULL && $ush->npwp==NULL && $ush->tmptush==NULL      ): ?>
              <div class="alert alert-info"> Silahkan Lengkapi Data Usaha Terlebih Dahulu.</div>
            <?php else: ?>
              <?php if(empty($last)): ?>
                <button type="button" class="btn btn-primary" style="margin-bottom:12px"> <a href="/pengajuan/create"  style="color:white;"> Tambah</a></button>
                <?php else: ?>
                  <?php if($last->status == 'tidak' || $last->status == 'lunas'): ?>
                      <button type="button" class="btn btn-primary" style="margin-bottom:12px"> <a href="/pengajuan/create"  style="color:white;"> Tambah</a> </button>
                    <?php else: ?>
                  <?php endif; ?>
              <?php endif; ?>
          <?php endif; ?>
          <div style="overflow-x:auto">
            <table class="table " id="datatable" >
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th> Tanggal</th>
                  <th scope="col">Status</th>
                  <th >Keterangan</th>
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
                        <?php elseif($p->status == 'lulus_survei'): ?>
                          <span class="badge bg-warning">Lulus Survei</span>
                        <?php elseif($p->status == "lunas"): ?>
                            <span class="badge bg-info">Pengajuan Lunas</span>
                        <?php else: ?>
                        <span class="badge bg-danger">Pengajuan Ditolak</span>
                      <?php endif; ?>
                    </td>
                    <td style="width:280px"><?php echo e(ucfirst($p->ket)); ?> </td>
                    <td>
                      <a href="/show/<?php echo e($p->id); ?>" class="bi bi-file-earmark-text" ></a>
                      <a href="/cetak/<?php echo e($p->id); ?>" class="bi bi-printer"> </a>
                    </td>
                  </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
            </table>
          </div>
        <?php else: ?>
          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin')): ?>
            <!-- pengajua admin -->
            <?php if(session('flash_message_success')): ?>
              <div class="alert alert-success">
                <?php echo e(session('flash_message_success')); ?>

              </div>
            <?php endif; ?>
            <div style="overflow-x:auto">
              <table class="table " id="datatable">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Mitra</th>
                    <th scope="col">Besar Pinjaman</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Status</th>
                    <th scope="col" >Keterangan</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $__currentLoopData = $pengajuan1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td><?php echo e($loop->iteration); ?></td>
                      <td><?php echo e(ucwords($p->data_mitra->nm)); ?></td>
                      <td><?php echo e($p->formatRupiah('bsr_pinjaman')); ?></td>
                      <td><?php echo e($p->created_at); ?></td>
                      <td>  
                        
                        <?php if($p->status == 'menunggu'): ?> 
                            <button type="button" class="btn  btn-secondary btn-sm menunggu" data-bs-toggle="modal" data-bs-target="#menunggu-<?php echo e($p->id); ?>" data-id="<?= $p['id']; ?>" >
                            Menunggu
                            </button>
                          <?php elseif($p->status == 'lulus'): ?>
                            <span class="badge bg-success">Pengajuan Diterima</span>
                          <?php elseif($p->status == 'lulus_survei'): ?>
                            <button type="button" class="btn  btn-warning btn-sm menunggu" data-bs-toggle="modal" data-bs-target="#menunggu-<?php echo e($p->id); ?>">
                            Lulus Survei
                            </button>
                          <?php elseif($p->status == "lunas"): ?>
                            <span class="badge bg-info">Pengajuan Lunas</span>
                          <?php else: ?>
                            <span class="badge bg-danger">Pengajuan Ditolak</span>
                        <?php endif; ?>
                      </td>
                      <td scope="col" ><?php echo e(ucfirst($p->ket)); ?></td>
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
            </div>
            
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
                            <select class="form-select" name="status" v-model='selectValue'>
                              <option value = "menunggu">Menunggu</option>
                              <option value = "lulus_survei">Lulus Survei </option> 
                              <option value = "lulus">Pengajuan Diterima</option>
                              <option value = "tidak">Pengajuan Tidak Diterima</option>
                            </select>
                          </div>
                        </div>
                          <div v-if='selectValue == "lulus"' class="col-12">
                            <label for="bsrpemin" class="form-label">Besar Peminjaman yang diberikan </label>
                            <div class="input-group mb-3">
                              <span class="input-group-text">Rp.</span>
                              <input type="text" class="form-control uang" name="bsrpemin"  id="bsrpemin">
                            </div> 
                          </div> 
                          <div v-if='selectValue == "lulus_survei"' class="col-12 ">
                            <label for="ksg_bayar" class="form-label" id="lebksg_bayar">Kesanggupan Bayar Pinjaman </label>
                            <div class="input-group mb-3">
                              <span class="input-group-text">Rp.</span>
                              <input type="text" class="form-control rupiah" name="ksg_bayar" id="ksg_bayar">
                            </div>
                          </div>
                          <div v-if='selectValue == "lulus_survei"' class="col-12 ">
                            <label for="bsr_usulan" class="form-label" id="lebbsr_usulan">Besar Usulan Pinjaman dari Tim Survei </label>
                            <div class="input-group mb-3">
                              <span class="input-group-text rp2">Rp.</span>
                              <input type="text" class="form-control rupiah" name="bsr_usulan" id="bsr_usulan">
                            </div> 
                          </div>
                          <div v-if='selectValue != "menunggu"' class="col-12 ">
                            <label for="ket" class="form-label" id="lebket">Keterangan </label>
                            <input type="text" class="form-control " name="ket" id="ket">
                          </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit"  class="btn btn-primary">Simpan</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <script>
                var modal_<?php echo e($p->id); ?> = new Vue({
                  el: '#menunggu-<?php echo e($p->id); ?>',
                  data: {
                    selectValue: 'menunggu'
                  }
                });
              </script>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

          <?php endif; ?>
      <?php endif; ?>
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.18/vue.min.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
  
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\applaravel\pumk\resources\views/dashboard/pengajuan/index.blade.php ENDPATH**/ ?>