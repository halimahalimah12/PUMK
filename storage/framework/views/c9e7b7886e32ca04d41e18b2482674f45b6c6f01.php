

<?php $__env->startSection('container'); ?>
  <?php if($user->is_admin ==0 ): ?>
      <?php if(session()-> has('success')): ?>
          <?php if($mitra->scanktp == NULL && $mitra->tpt_lhr == NULL && $mitra->tgl_lhr == NULL && $mitra->sts_prk == NULL && $mitra->jk == NULL && $mitra->almt == NULL && $mitra->no_hp == NULL && $mitra->pddk == NULL && $mitra->jbt == NULL && $mitra->kursus == NULL && $mitra->no_ktp == NULL): ?>
              <div class="alert alert-info alert-dismissible fade show" role="alert" style="padding-bottom:1px">
                <p>
                  <i class="bi bi-emoji-smile"></i>
                  <?php echo e(session('success')); ?>  
                  <a href="/profil/" class="alert-link" > <ins> Klik </ins>  </a> untuk melengkapi data diri 
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </p>
              </div>
            <?php else: ?>
              <div class="alert alert-info alert-dismissible fade show" role="alert" style="margin-top:60px">
                <p style="text-align:left;align-items:center">
                  
                  <i class="bi bi-emoji-smile"></i>
                  <?php echo e(session('success')); ?>  
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </p>
              </div>
          <?php endif; ?>
        <?php else: ?>
      <?php endif; ?>

    <section class="section ">
      <section class="section ">
        <div class="section-header">
              <h1>Dashboard</h1>
        </div>
        <div class="section-body">
            <div class="row">
              <div class="row">

                
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                  <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                      <i class="fas fa-clipboard-check"></i>
                    </div>
                    <div class="card-wrap">
                      <div class="card-header">
                        <h4>Pengajuan Diterima</h4>
                      </div>
                      <div class="card-body">
                        <h6><?php echo e($diterima); ?></h6>
                      </div>
                    </div>
                  </div>
                </div>

                
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                  <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                      <i class="fas fa-money-bill-wave"></i>
                    </div>
                    <div class="card-wrap">
                      <div class="card-header">
                        <a href="/pembayaran"><h4>Sisa Piutang</h4></a>
                      </div>
                      <div class="card-body">
                      <?php if($kp != NULL): ?>
                        <?php if($kp->totkp != NULL): ?>
                          <h6><?php echo e($jmlhpem - $kp->totkp); ?></h6>
                          <?php else: ?>
                          <h6>0</h6>
                        <?php endif; ?>
                        <?php else: ?>
                          <h6>0</h6>
                      <?php endif; ?>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
        </div>
      </section>
    </section>

    <?php else: ?>
    <section class="section ">
      <section class="section ">
        <div class="section-header">
              <h1>Dashboard</h1>
        </div>
        <div class="section-body">
            <div class="row">
              <div class="row">

                
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                  <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                      <i class="fas fa-users"></i>
                    </div>
                    <div class="card-wrap">
                      <div class="card-header">
                        <h4>Mitra</h4>
                      </div>
                      <div class="card-body">
                        <?php echo e($jmlhmitra); ?>

                      </div>
                    </div>
                  </div>
                </div>

                
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                  <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                      <i class="fas fa-clipboard-check"></i>
                    </div>
                    <div class="card-wrap">
                      <div class="card-header">
                        <h4>Pengajuan Diterima</h4>
                      </div>
                      <div class="card-body">
                        <h6><?php echo e($diterima); ?></h6>
                      </div>
                    </div>
                  </div>
                </div>
                
                
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                  <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                      <i class="fas fa-clipboard-list"></i>
                    </div>
                    <div class="card-wrap">
                      <div class="card-header">
                        <a href="/pengajuan"><h4>Menunggu Verifikasi Pengajuan</h4></a>
                      </div>
                      <div class="card-body">
                        <h6><?php echo e($menunggu); ?></h6>
                      </div>
                    </div>
                  </div>
                </div>

                
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                  <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                      <i class="fas fa-file-invoice"></i>
                    </div>
                    <div class="card-wrap">
                      <div class="card-header">
                        <a href="/pembayaran"><h4>Menunggu Verifikasi Pembayaran</h4></a>
                      </div>
                      <div class="card-body">
                        <h6><?php echo e($pembayaran); ?></h6>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- diagram grafis -->
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Reports <span>/Today</span></h5>
                      <div id="reportsChart"></div>
                      <script>
                        document.addEventListener("DOMContentLoaded", () => {
                          new ApexCharts(document.querySelector("#reportsChart"), {
                            series: [{
                              name: 'Sales',
                              data: [31, 40, 28, 51, 42, 82, 56],
                            }, {
                              name: 'Revenue',
                              data: [11, 32, 45, 32, 34, 52, 41]
                            }, {
                              name: 'Customers',
                              data: [15, 11, 32, 18, 9, 24, 11]
                            }],
                            chart: {
                              height: 350,
                              type: 'area',
                              toolbar: {
                                show: false
                              },
                            },
                            markers: {
                              size: 4
                            },
                            colors: ['#4154f1', '#2eca6a', '#ff771d'],
                            fill: {
                              type: "gradient",
                              gradient: {
                                shadeIntensity: 1,
                                opacityFrom: 0.3,
                                opacityTo: 0.4,
                                stops: [0, 90, 100]
                              }
                            },
                            dataLabels: {
                              enabled: false
                            },
                            stroke: {
                              curve: 'smooth',
                              width: 2
                            },
                            xaxis: {
                              type: 'datetime',
                              categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
                            },
                            tooltip: {
                              x: {
                                format: 'dd/MM/yy HH:mm'
                              },
                            }
                          }).render();
                        });
                      </script>
                    </div>
                  </div>
                </div><!-- End Reports -->

                <!-- pembayaran -->
                <div class="col-12">
                  <div class="card recent-sales overflow-auto">
                    <div class="card-body">
                      <h5 class="card-title">Pembayaran</h5>
                      <table class="table table-borderless datatable">
                        <thead>
                          <tr>
                            <th scope="col">No</th>
                            <th scope="col">Mitra</th>
                            <th scope="col">Usaha</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Status</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $__currentLoopData = $pembayarans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <tr>
                                <th scope="row"></th>
                                
                                
                                <td class="rupiah"><?php echo e($p->jumlah); ?></td>
                                <td> 
                                    <?php if($p->status == "menunggu"): ?>
                                        <a href="/pembayaran/valid/<?php echo e($p->id); ?>"><button type="button" class="btn btn-success btn-sm"> Valid </button></a>
                                        <a href="/pembayaran/tidak-valid/<?php echo e($p->id); ?>"><button type="button" class="btn btn-danger btn-sm"> Tidak Valid</button></a>
                                      <?php elseif( $p->status == "valid"): ?> <span class="badge bg-success">Valid</span>
                                      <?php else: ?> <span class="badge bg-danger">Tidak Valid</span>
                                    <?php endif; ?>
                                </td>
                              </tr>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div><!-- End Recent Sales -->

              </div>
            </div>
        </div>
      </section>
    </section>
  <?php endif; ?>
  

  

<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\applaravel\pumk\resources\views/dashboard/index.blade.php ENDPATH**/ ?>