

<?php $__env->startSection('container'); ?>

<div class="card">
            <div class="card-body">
              <h5 class="card-title">Proposal</h5>
           
                <button type="button" class="btn btn-primary">
                  <a href="<?php echo e(route('proposal.create')); ?>"  style="color:white;"> Tambah</a>
                </button>
              
              <!-- Table with stripped rows -->
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Nama Usaha</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td> dada </td>
                    <td>Designer</td>
                    <td>28</td>
                    <td> 
                    <a href="" class="bi bi-file-earmark-text" ></a>
												
												
											</td>
                  </tr>
                  
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\applaravel\pumk\resources\views/dashboard/proposal/index.blade.php ENDPATH**/ ?>