

<?php $__env->startSection('container'); ?>
  <div class="card">
    <div class="card-body">
      <?php if( $user->is_admin == 0 ): ?>
            <?php if($pengajuan == NULL ): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin-top:30px">
                  <i class="bi bi-exclamation-octagon me-1"></i>Kartu piutang anda belum ada , Silahkan <a href="/pengajuan" class="alert-link" > <ins> pengajuan </ins> </a>lakukan  terlebih dahulu.
                </div>
              <?php else: ?>
                <?php if($pengajuan->status == "menunggu"): ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert" style="margin-top:30px">
                      <i class="bi bi-exclamation-triangle me-1"></i>
                      Kartu piutang anda belum ada.
                      Saat ini pengajuan anda masih ditahap menunggu verifikasi, Mohon tunggu hingga pengajuan disetujui.
                    </div>
                  <?php elseif($pengajuan->status == "lulus_survei"): ?>
                    <div class="alert alert-info alert-dismissible fade show" role="alert" style="margin-top:30px">
                      <i class="bi bi-info-circle me-1"></i>
                      Kartu piutang anda belum ada.
                      Saat ini pengajuan anda masih ditahap lulus survei dan berkas, Mohon tunggu hingga pengajuan disetujui.
                    </div>
                  <?php else: ?>
                    <?php if($kp->tgl_penyaluran == NULL && $kp->sb_bln == NULL && $kp->sb_thn == NULL && $kp->no_kontrak == NULL): ?>
                        <h5 class="card-title1">KARTU PIUTANG</h5>
                          <h5 class="card-title1">PROGRAM KEMITRAAN BANDARA SULTAN THAHA</h5>
                          <?php if($kp->tgl_penyaluran ==  NULL): ?>
                            <?php else: ?>
                              <p >Tanggal Penyaluran : <?php echo e(date('d-m-Y',strtotime($kp->tgl_penyaluran))); ?></p>
                          <?php endif; ?>
                          <p >Besar Pinjaman     : <?php echo e(($kp->formatRupiah('pinjaman'))); ?></p>
                          <div class="alert alert-info alert-dismissible fade show" role="alert" style="margin-top:30px">
                          <i class="bi bi-info-circle me-1"></i>
                          Mohon tunggu karena kartu piutang anda belum dibuat.
                        </div>
                      <?php else: ?>
                        <button class="btn btn-primary" style="margin-top:12px; float:right" >
                          <a href="/cetak-kartu-piutang/<?php echo e($kp->id); ?>" class="bi bi-printer" style="color:white" > </a>
                        </button>
                          <h5 class="card-title1">KARTU PIUTANG</h5>
                          <h5 class="card-title1">PROGRAM KEMITRAAN BANDARA SULTAN THAHA</h5>
                          <p >Tanggal Penyaluran : <?php echo e(date('d-m-Y',strtotime($kp->tgl_penyaluran))); ?></p>
                          <p >Besar Pinjaman     : <?php echo e(($kp->formatRupiah('pinjaman'))); ?></p>
                        <div style="padding-top:25px; overflow-x:auto">
                          <table class="table table-bordered " style="text-align:center">
                            <thead>
                              <tr >
                                <th rowspan="2" valign="middle">ANG ke</th>
                                <th colspan="2" scope="col">Tajuh Tempo</th>
                                <th colspan="3">Rincian Anggaran</th>
                                <th rowspan="2">Saldo</th>
                              </tr>
                              <tr>
                                <th scope="col">Bulan</th>
                                <th scope="col">Tahun</th>
                                <th scope="col">Jasa Pinj 0.25%</th>
                                <th scope="col">Pokok</th>
                                <th scope="col">Jumlah </th>
                              <tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td><?php echo e($kp->formatRupiah('pinjaman')); ?></td>
                              </tr>
                              <?php $sumpokok = 0;
                                    $sumjasa = 0;
                                    $sum = 0;
                                    $sumsaldo =0;
                                    ?>
                                <?php for( 
                                  $i =1, 
                                  $saldo = $kp->pinjaman,
                                  $sb_bln = $kp->sb_bln/100,
                                  $waktu = $kp->waktu,
                                  $pembagi = 1-1/pow(1+$sb_bln,$waktu),
                                  $jumlah = $saldo*$sb_bln/ $pembagi;
                                  $i  <= 24 ; $i++): ?>
                                  <tr>
                                    <td scope="row"><?php echo e($i); ?></td>
                                    <td><?php echo e(Carbon\Carbon::parse($kp->tgl_penyaluran)->startOfMonth()->addMonth($i)->format("F ")); ?></td>
                                    <td><?php echo e(Carbon\Carbon::parse($kp->tgl_penyaluran)->startOfMonth()->addMonth($i)->format("Y ")); ?></td>
                                    <td>Rp. <?php echo e(number_format(round($jasa=$saldo*$sb_bln), 0, ',','.')); ?> </td>
                                    <td>Rp.<?php echo e(number_format(round($pokok=$jumlah-$jasa), 0, ',','.')); ?> </td>
                                    <td>Rp. <?php echo e(number_format(round($jumlah), 0, ',','.')); ?> </td>
                                    <td>Rp.<?php echo e(number_format(round($saldo = $saldo-$pokok), 0, ',','.')); ?></td>
                                  </tr>
                                  <?php 
                                    $sumpokok += $pokok;
                                    $sumjasa += $jasa;
                                    $sum += $jumlah;
                                    $sumsaldo += $saldo;
                                  ?>
                                <?php endfor; ?>
                                <tr>
                                  <th colspan="3">Jumlah </th>
                                  <th>Rp. <?php echo e(number_format(round($sumjasa), 0, ',','.')); ?></th>
                                  <th>Rp. <?php echo e(number_format(round($sumpokok), 0, ',','.')); ?></th>
                                  <th>Rp. <?php echo e(number_format(round($sum), 0, ',','.')); ?></th>
                                  <th></th>
                                </tr>
                            </tbody>
                          </table>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            <?php endif; ?>
        <?php else: ?>
            <h5 class="card-title">Kartu Piutang</h5>
            <?php if(session('flash_message_success')): ?>
                <div class="alert alert-success">
                    <?php echo e(session('flash_message_success')); ?>

                </div>
            <?php endif; ?>
            <div style="overflow-x:auto">
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
                            <a href="/cetak-kartu-piutang/<?php echo e($p->id); ?>" class="bi bi-printer" > </a>
                            <a href="/kartupiutang/hapus/<?php echo e($p->id); ?>" class="bi bi-trash" onclick="return confirm('Apakah anda yakin ? ')"></a>
                          </td> 
                      </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>
              </table>
            </div>
      <?php endif; ?>
    </div>
  </div
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\applaravel\pumk\resources\views/dashboard/kartu_piutang/index.blade.php ENDPATH**/ ?>