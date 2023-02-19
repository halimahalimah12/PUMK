

<?php $__env->startSection('container'); ?>

  <div class="card">
          <div class="card-body">
                <h5 class="card-title">Data Mitra </h5>
                    <!-- pegajuan admin -->
                  <button type="button" class="btn btn-primary">
                    <a href="/pengajuan/create"  style="color:white;"> Tambah</a>
                  </button>
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Nama Mitra</th>
                      <th scope="col">Nama Usaha</th>
                      <th scope="col">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $__currentLoopData = $mitra; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td><?php echo e($p->nm); ?></td>
                        <td><?php echo e($p->data_ush->nama_ush); ?></td>
                        <td><a href="/datamitra/<?php echo e($p->id); ?>" class="bi bi-file-earmark-text" ></a>
                            <a href="" class="bi bi-trash" ></a>
                        </td>
                      </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>
                </table>
          </div>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\applaravel\pumk\resources\views/dashboard/data_mitra/index.blade.php ENDPATH**/ ?>