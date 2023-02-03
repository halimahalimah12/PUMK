

<?php $__env->startSection('container'); ?>
    <div class="card">
        <div class="card-body">
          <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Nama Mitra</th>
                  <th scope="col">Nama Usaha</th>
                  <th >Besar Pinjaman </th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $kp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td><?php echo e($loop->iteration); ?></td>
                    <td><?php echo e(ucwords($p->pengajuan->data_mitra->nm)); ?></td>
                    <td><?php echo e(ucwords($p->pengajuan->data_mitra->data_ush->nama_ush)); ?></td>
                    <td><?php echo e($p->formatRupiah('pinjaman')); ?></td>                    
                    <td>
                        <a href="/kartupiutang/<?php echo e($p->id); ?>/edit" class="bi bi-file-earmark-text" ></a>
												<a href="" class="bi bi-trash" ></a>
											</td>
                  </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
          </table>
      </div>
    </div
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\applaravel\pumk\resources\views/dashboard/kartu_piutang/index.blade.php ENDPATH**/ ?>