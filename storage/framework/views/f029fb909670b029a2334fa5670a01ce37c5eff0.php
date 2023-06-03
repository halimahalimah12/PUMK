

<?php $__env->startSection('container'); ?>
  <div class="card">
    <div class="card-body">
      <h5 class="card-title"><?php echo e(ucwords($kp->pengajuan->data_mitra->data_ush->nama_ush)); ?></h5>
      <?php if(session('flash_message_success')): ?>
        <div class="alert alert-success">
          <?php echo e(session('flash_message_success')); ?>

        </div>
      <?php endif; ?>

      <ul class="nav nav-tabs d-flex" id="myTabjustified" role="tablist">
        <li class="nav-item flex-fill" role="presentation">
          <button class="nav-link w-100 active" id="kartupiutang-tab" data-bs-toggle="tab" data-bs-target="#kartupiutang-justified" type="button" role="tab" aria-controls="kartupiutang" aria-selected="true">Kartu Piutang</button>
        </li>
        <li class="nav-item flex-fill" role="presentation">
          <button class="nav-link w-100" id="angsuran-tab" data-bs-toggle="tab" data-bs-target="#angsuran-justified" type="button" role="tab" aria-controls="angsuran" aria-selected="false">Angsuran</button>
        </li>
        <li class="nav-item flex-fill" role="presentation">
          <button class="nav-link w-100" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-justified" type="button" role="tab" aria-controls="contact" aria-selected="false">Detail Angsuran</button>
        </li>
      </ul>

      <div class="tab-content pt-2" id="myTabjustifiedContent">
        <div class="tab-pane fade show active" id="kartupiutang-justified" role="tabpanel" aria-labelledby="kartupiutang-tab">
          <div calss="card">
            <form class="row g-3  contact-form" action="/kartupiutang/<?php echo e($kp->id); ?>" method="POST" enctype="multipart/form-data"  >
              <?php echo method_field('put'); ?>
              <?php echo csrf_field(); ?>
              <div class="row mb-3" style="padding-top:25px">
                <label for="tgl_penyaluran" class="col-sm-3 col-form-label">Tanggal Penyaluran</label>
                <div class="col-sm-9">
                  <input type="date" class="form-control <?php $__errorArgs = ['tgl_penyaluran'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  name="tgl_penyaluran"  value="<?php echo e(old('tgl_penyaluran',$kp->tgl_penyaluran)); ?>">
                    <?php $__errorArgs = ['tgl_penyaluran'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
              </div>
              <div class="row mb-3" >
                <label for="no_kontrak" class="col-sm-3 col-form-label">Nomor Kontrak</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control <?php $__errorArgs = ['no_kontrak'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="no_kontrak" name="no_kontrak" value="<?php echo e(old('no_kontrak', $kp->no_kontrak)); ?>" >
                    <?php $__errorArgs = ['no_kontrak'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
              </div>
              <div class="row mb-3" >
                <label for="inputEmail3" class="col-sm-3 col-form-label">Besar Pinjaman</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control " id="inputText" value="<?php echo e($kp->formatRupiah('pinjaman')); ?>" disabled>
                </div>
              </div>
              <div class="row mb-3">
                <label for="sbbln" class="col-sm-3 col-form-label">Jangka Waktu Peminjaman (Bulan)</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control <?php $__errorArgs = ['waktu'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="waktu"  value=" <?php echo e(old('waktu',$kp->waktu)); ?>"  >
                    <?php $__errorArgs = ['waktu'];
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
                <label for="sbthn" class="col-sm-3 col-form-label">Suku Bunga Efektif /Tahun (%) </label>
                <div class="col-sm-9">
                  <input type="text" class="form-control <?php $__errorArgs = ['sb_thn'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="sb_thn" onkeyup="bagi();" id="sb_thn" value="  <?php echo e(old('sb_thn',$kp->sb_thn)); ?>" > 
                    <?php $__errorArgs = ['sb_thn'];
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
                <label for="sbbln" class="col-sm-3 col-form-label">Suku Bunga Efektif /Bulan (%)</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control  <?php $__errorArgs = ['sb_bln'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="sb_bln" id="sb_bln"style="background-color: #e9ecef; cursor:auto;"  value=" <?php echo e(old('sb_bln',$kp->sb_bln)); ?>" readonly>
                    <?php $__errorArgs = ['sb_bln'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
              </div>
              <button type="submit" class="btn btn-primary"><i class="ri-send-plane-fill"></i></i> Simpan </button>
            </form>
          </div>
          <?php if($kp->sb_bln != null): ?>
            
        <form class="row g-3  contact-form" action="/detailkartupiutang" method="POST" enctype="multipart/form-data"  >
                <?php echo csrf_field(); ?>    
          <?php echo e(method_field('post')); ?>

          <?php if($iddetailkp == NULL): ?>
            <div >
              <button type="submit" class="btn btn-primary" style="float:right; float: right;display: block;margin-top:15px;"><i class="ri-send-plane-fill"></i></i> Simpan </button>
            </div>
            <?php else: ?>
              <?php if( $iddetailkp->kartupiutang_id != $kp->id ): ?>
                <div >
                  <button type="submit" class="btn btn-primary" style="float:right; float: right;display: block;margin-top:15px;"><i class="ri-send-plane-fill"></i></i> Simpan </button>
                </div>
              <?php endif; ?>
          <?php endif; ?>
              <div style="padding-top:25px; overflow-x:auto"> 
                <table class="table table-bordered" style="text-align:center">
                  <thead>
                    <tr>
                      <th rowspan="2" valign="middle">ANG ke</th>
                      <th colspan="2" scope="col">Tajuh Tempo</th>
                      <th colspan="3">Rincian Anggaran</th>
                      <th rowspan="2">Saldo (Rp.)</th>
                    </tr>
                    <tr>
                      <th scope="col">Bulan</th>
                      <th scope="col">Tahun</th>
                      <th scope="col">Pokok (Rp.)</th>
                      <th scope="col">Jasa Pinj 0.25% (Rp.)</th>
                      <th scope="col">Jumlah (Rp.) </th>
                    <tr>
                  </thead>
                  <tbody>
                    <tr>
                      <?php for( $n=0 ; $n<6 ; $n++): ?>
                      <td>0</td>
                      <?php endfor; ?>
                      <td><?php echo e(number_format($kp->pinjaman, 0, ',','.')); ?></td>
                    </tr>
                    <?php if($iddetailkp == NULL): ?>
                        <?php for( 
                              $i =1,
                              $sumjasa =0,
                              $sum = 0,
                              $uanglebih = 0,
                              $sumpokok =0,
                              $saldo = $kp->pinjaman;
                              $i <= 24  ; $i++): ?>
                                <tr>
                                <td style="display:none"><input type="hidden" name="kartupiutang_id[]" value="<?php echo e($kp->id); ?>" ></td>
                                <td scope="row"><?php echo e($i); ?></td>
                                <td><input name="bulan[]" id="bulan"value="<?php echo e(Carbon\Carbon::parse($kp->tgl_penyaluran)->startOfMonth()->addMonth($i)->format("F")); ?>" style="border:none; width:90px" readonly></td>
                                <td><input name="tahun[]" value="<?php echo e(Carbon\Carbon::parse($kp->tgl_penyaluran)->startOfMonth()->addMonth($i)->format("Y")); ?>" style="border:none; width:90px" readonly></td>
                                <td><input name="pokok[]" value="<?php echo e(number_format(round($pokok), 0, ',','.')); ?>" style="border:none; width:100px" readonly> </td>
                                <?php if($i <= 12 ): ?>
                                    <td><input name="jasa[]" value="<?php echo e(number_format(round($jasa), 0, ',','.')); ?> " style="border:none; width:100px" readonly></td>
                                    <td><input name="jumlah[]" value="<?php echo e(number_format( round($jumlah), 0, ',','.')); ?>" style="border:none; width:100px" readonly > </td>
                                    <?php  $sumjasa += $jasa; 
                                          $sum += $jumlah;
                                    ?>
                                  <?php else: ?> 
                                    <td><input name="jasa[]" value="<?php echo e(number_format(round($jasa1), 0, ',','.')); ?> " style="border:none; width:100px" readonly ></td>
                                    <td><input name="jumlah[]" value="<?php echo e(number_format(round($jumlah1), 0, ',','.')); ?>" style="border:none; width:100px" readonly > </td>
                                    <?php  $sumjasa += $jasa1; 
                                          $sum += $jumlah1;
                                    ?>
                                <?php endif; ?>
                                <td><input readonly name="sisasaldo[]" value="<?php echo e(number_format(round(abs($saldo = $saldo-$pokok)), 0, ',','.')); ?>" style="border:none; width:100px" readonly ></td>
                                
                              </tr>
                              <?php 
                                $sumpokok += $pokok;
                              ?>
                              
                          <?php endfor; ?>
                          <tr>
                              <th colspan="3">Jumlah </th>
                              <th><input name="sumpokok" value="<?php echo e(number_format($sumpokok, 0, ',','.')); ?>" style="border:none; width:100px"  ></th>
                              <th><input name="sumjasa"value="<?php echo e(number_format($sumjasa, 0, ',','.')); ?>" style="border:none; width:100px"></th>
                              <th><input name="sum" value="<?php echo e(number_format($sum, 0, ',','.')); ?>" style="border:none; width:100px"></th>
                              <th></th>
                              </tr>
                      <?php else: ?>
                        <?php if( $iddetailkp->kartupiutang_id != $kp->id ): ?>
                            <?php for( 
                              $i =1,
                              $sumjasa =0,
                              $sum = 0,
                              $uanglebih = 0,
                              $sumpokok =0,
                              $saldo = $kp->pinjaman;
                              $i <= 24  ; $i++): ?>
                                <tr>
                                <td style="display:none"><input type="hidden" name="kartupiutang_id[]" value="<?php echo e($kp->id); ?>" ></td>
                                <td scope="row"><?php echo e($i); ?></td>
                                <td><input  name="bulan[]" id="bulan"value="<?php echo e(Carbon\Carbon::parse($kp->tgl_penyaluran)->startOfMonth()->addMonth($i)->format("F")); ?>" ></td>
                                <td><input name="tahun[]" value="<?php echo e(Carbon\Carbon::parse($kp->tgl_penyaluran)->startOfMonth()->addMonth($i)->format("Y")); ?>"></td>
                                <td><input name="pokok[]" value="<?php echo e(round($pokok)); ?>"> </td>
                                <?php if($i <= 12 ): ?>
                                    <td><input name="jasa[]" value="<?php echo e(round($jasa)); ?> " ></td>
                                    <td><input name="jumlah[]" value="<?php echo e(round($jumlah)); ?>" > </td>
                                    <?php  $sumjasa += $jasa; 
                                          $sum += $jumlah;
                                    ?>
                                  <?php else: ?> 
                                    <td><input name="jasa[]" value="<?php echo e(round($jasa1)); ?> " ></td>
                                    <td><input name="jumlah[]" value="<?php echo e(round($jumlah1)); ?>" > </td>
                                    <?php  $sumjasa += $jasa1; 
                                          $sum += $jumlah1;
                                    ?>
                                <?php endif; ?>
                                <td><input name="sisasaldo[]" value="<?php echo e(round(abs($saldo = $saldo-$pokok))); ?>" ></td>
                                
                              </tr>
                              <?php 
                                $sumpokok += $pokok;
                              ?>
                            <?php endfor; ?>
                          <?php else: ?>
                            <?php $__currentLoopData = $detailkp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                  <td scope="row"><?php echo e($loop->iteration); ?></td>
                                  <td><?php echo e($d->bulan); ?></td>
                                  <td><?php echo e($d->tahun); ?></td>
                                  <td><?php echo e(number_format($d->pokok, 0, ',','.')); ?> </td>
                                      <td> <?php echo e(number_format($d->jasa, 0, ',','.')); ?> </td>
                                      <td> <?php echo e(number_format($d->jumlah , 0, ',','.')); ?> </td>
                                  <td><?php echo e(number_format($d->sisasaldo , 0, ',','.')); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                          <th colspan="3">Jumlah </th>
                          <th> <?php echo e(number_format($kp->jmlhpokok, 0, ',','.')); ?></th>
                          <th> <?php echo e(number_format($kp->jmlhjasa, 0, ',','.')); ?></th>
                          <th> <?php echo e(number_format($kp->totkp, 0, ',','.')); ?></th>
                          <th></th>
                          </tr>
                            
                        <?php endif; ?>
                    <?php endif; ?>
                  </tbody>
                </table>
              </div>
        </form>
          <?php endif; ?>
        </div>
        <div class="tab-pane fade" id="angsuran-justified" role="tabpanel" aria-labelledby="angsuran-tab">
          <div style="margin-top:35px">
            <table class="table table-striped">
              <thead>
                <th> No </th>
                <th> Tanggal Pembayaran </th>
                <th> Bank </th>
                <th> Jumlah </th>
                <th> Bukti </th>
                <th> Status </th>
              </thead>
              <tbody>
              <?php if($pembayaran != NULL && $totpembayaran !=NULL ): ?>
                <?php $__currentLoopData = $pembayaran; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td> <?php echo e($loop->iteration); ?> </td>
                    <td> <?php echo e(date('d M Y',strtotime($p->tgl))); ?> </td>
                    <td> <?php if($p->bank == 'bri'): ?> BRI
                            <?php else: ?> Mandiri
                          <?php endif; ?>
                    </td>
                    <td> <?php echo e($p->formatRupiah('jumlah')); ?></td>
                    <td><button type="button" class="btn btn-primary btn-sm"> <a href="/bukti/<?php echo e($p->id); ?>"style="color:white;"> Lihat </a></button></td>
                    <td> <?php if( $p->status == "menunggu"): ?>
                            <button type="button" class="btn btn-success btn-sm">Valid</button>
                            <button type="button" class="btn btn-danger btn-sm">Tidak Valid</button>
                          <?php elseif( $p->status == "valid"): ?> <span class="badge bg-success">Valid</span>
                          <?php else: ?> <span class="badge bg-danger">Tidak Valid</span>
                        <?php endif; ?>
                    </td>
                  </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <p style="visibility: hidden;display: none;"><?php echo e($uanglebih = $kp->totkp-$totpembayaran); ?></p>
                  <tr>
                    <th colspan="3">Total Pembayaran</th>
                    <th>Rp. <?php echo e(number_format($totpembayaran,0,',','.' )); ?></th>
                  </tr>
                  <tr>
                    <th colspan="3">Sisa Tagihan</th>
                    <?php if($totpembayaran  < $kp->totkp ): ?>
                        <th>Rp. <?php echo e(number_format($sisatagihan= $kp->totkp-$totpembayaran,0,',','.')); ?></th>
                      <?php else: ?> 
                        <th>Rp. <?php echo e(number_format($sisatagihan= $kp->totkp-$totpembayaran - $uanglebih,0,',','.')); ?></th>
                    <?php endif; ?>
                  </tr>
                    <?php if($totpembayaran > $kp->totkp ): ?>
                      <tr>
                        <th colspan="3">Uang Lebih</th>
                        <th>Rp. <?php echo e(number_format(abs($uanglebih),0,',','.')); ?></th>
                      </tr>
                    <?php endif; ?>
              <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="tab-pane fade" id="contact-justified" role="tabpanel" aria-labelledby="contact-tab">
          <div style="padding-top:25px; overflow-x:auto"> 
              <table class="table table-bordered" style="text-align:center">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Jumlah Bayar</th>
                    <th>Jumlah Bulan</th>
                    <th>Pokok</th>
                    <th>Jasa Pinj 0.25%</th>
                    <th>Sisa Pinjaman</th>
                    <th>Ket</th>
                  </tr>
                </thead>
                <tbody>
                <?php if($pembayaran != NULL && $totpembayaran !=NULL ): ?>
                  <tr>
                    <?php for( $n=0 ; $n<6 ; $n++): ?>
                      <td>0</td>
                    <?php endfor; ?>
                    <td><?php echo e(number_format($kp->totkp,0,',','.')); ?></td>
                      <td></td>
                  </tr>
                    <?php for(  $n=1,$jmlhpokok=0 ,$jmlhjasa=0, $jumlahbayar=0 , $jmlhbulan=0 ; $n<=1 ; $n++): ?>
                        <?php $__currentLoopData = $pembayaranvalid; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <tr>
                            <td><?php echo e($loop->iteration); ?></td>
                            <td><?php echo e($p->tgl); ?></td>
                            <td><?php echo e(number_format($p->jumlah,0,',','.')); ?></td>
                                <?php $jumlahbayar += $p->jumlah ?> 
                            <td><?php echo e($p->bulan); ?></td>
                                <?php $jmlhbulan += $p->bulan ?> 
                            <td><?php echo e(number_format($p->pokok,0,',','.')); ?></td>
                                <?php $jmlhpokok += $p->pokok ?> 
                            <td><?php echo e(number_format($p->jasa,0,',','.')); ?></td>
                                <?php $jmlhjasa += $p->jasa ?> 
                            <?php if( $kp->totkp > $p->jumlah): ?>
                                <td><?php echo e(number_format($kp->totkp=$kp->totkp - $p->jumlah ,0,',','.')); ?></td>
                              <?php else: ?> 
                                <td><?php echo e(number_format($kp->totkp=$kp->totkp - $p->jumlah-$uanglebih ,0,',','.')); ?></td>
                            <?php endif; ?>
                            <td><?php if($p->bank == 'bri'): ?> BRI
                                <?php else: ?> Mandiri
                                <?php endif; ?>
                            </td>
                          </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endfor; ?>
                    <tr>
                      <th colspan="2"> Jumlah </th>
                      <th >  <?php echo e(number_format($jumlahbayar,0,',','.')); ?></th>
                      <th > <?php echo e(number_format($jmlhbulan,0,',','.')); ?> </th>
                      <th > <?php echo e(number_format($jmlhpokok,0,',','.')); ?> </th>
                      <th > <?php echo e(number_format($jmlhjasa ,0,',','.')); ?> </th>
                      <?php if($p->jumlah > $kp->totkp): ?>
                        <th colspan="2" > Uang Lebih: <?php echo e(number_format(abs($uanglebih) ,0,',','.')); ?> </th>
                      <?php endif; ?>
                    </tr>
                <?php endif; ?>
                </tbody>
              </table>
            </div>
        </div>
      </div>
    </div>
  </div>

    <script type='text/javascript'>
      function bagi(){
        var sb_thn = document.getElementById('sb_thn').value; 
        var result = parseFloat(sb_thn)/12;
        if (!isNaN(result)){
          document.getElementById('sb_bln').value=result;
        }
      }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\applaravel\pumk\resources\views/dashboard/kartu_piutang/view.blade.php ENDPATH**/ ?>