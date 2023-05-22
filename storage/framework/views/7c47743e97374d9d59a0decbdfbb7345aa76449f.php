
<nav class="navbar navbar-expand-lg main-navbar">
    
      <form class="form-inline mr-auto" style="width:72%">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><img src="<?php echo e(asset ('assets/img/logoap2.png')); ?>" alt="" style="width:100px"></li>

        </ul>
      </form>
      <ul class="navbar-nav navbar-right " >
        
        <li class="dropdown dropdown-list-toggle" width=><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
          <div class="dropdown-menu dropdown-list dropdown-menu-right " style="width:260px;height:400px">
            <div class="dropdown-header">Notifications
              <div class="float-right">
                <?php if($user->is_admin == 1): ?>
                    Anda memiliki <?php echo e(auth()->user()->unreadNotifications->count()); ?> notifikasi baru.
                  <?php else: ?>
                    Anda memiliki <?php echo e($mitra->unreadNotifications->count()); ?> notifikasi baru.
                <?php endif; ?>
              </div>
            </div>
            <div class="dropdown-list-content dropdown-list-icons">
              <?php if($user->is_admin == 1 ): ?>
                  <?php $__currentLoopData = auth()->user()->unreadNotifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($notification->data['title'] == 'Pembayaran Tagihan'): ?>
                          <a href="<?php echo e($notification->data['url']); ?>" class="dropdown-item">
                            <div class="dropdown-item-icon bg-info text-white">
                              <i class="fas fa-paper-plane"></i>
                            </div>
                            <div class="dropdown-item-desc">
                              <b style="font-weight: bold;"><?php echo e($notification->data['title']); ?> </b><br>
                              <b><?php echo e(ucwords($notification->data['messages'])); ?></b>
                              <div class="time"><?php echo e($notification->created_at->diffForHumans()); ?></div>
                            </div>
                          </a>
                        <?php elseif($notification->data['title'] == 'Pengajuan Pendanaan.'): ?>
                          <a href="<?php echo e($notification->data['url'].'?id='.$notification->id); ?>" class="dropdown-item">
                            <div class="dropdown-item-icon bg-info text-white">
                              <i class="fas fa-money-bill-wave-alt"></i>
                            </div>
                            <div class="dropdown-item-desc">
                              <b style="font-weight: bold;"><?php echo e($notification->data['title']); ?> </b><br>
                              <b><?php echo e(ucwords($notification->data['messages'])); ?></b>
                              <div class="time"><?php echo e($notification->created_at->diffForHumans()); ?></div>
                            </div>
                          </a>
                      <?php endif; ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                  <?php $__currentLoopData = $mitra->unreadNotifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <a href="<?php echo e($notification->data['url']); ?>" class="dropdown-item">
                            <div class="dropdown-item-icon bg-info text-white">
                              <i class="fal fa-info-circle"></i>
                            </div>
                            <div class="dropdown-item-desc">
                              <b style="font-weight: bold;"><?php echo e($notification->data['title']); ?> </b><br>
                              <b><?php echo e(ucwords($notification->data['messages'])); ?></b>
                              <div class="time"><?php echo e($notification->created_at->diffForHumans()); ?></div>
                            </div>
                          </a>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php endif; ?>
            </div>
          </div>
        </li>
        <li class="dropdown">
          <a href="#" data-toggle="dropdown" class="nav-link nav-link-lg nav-link-user">
            <?php if($user->is_admin == 0): ?>
              <div class="round">
                <?php if($mitra->foto != NULL): ?>
                    <img alt="image" src="<?php echo e(asset('storage/dokumen/'.$mitra->foto)); ?>" style="margin-right:30px;"height="100px" width=auto>
                  <?php else: ?>
                    <img alt="image" src="<?php echo e(asset('assets/img/avatar-1.png')); ?>">
                <?php endif; ?>
              </div>
            <?php endif; ?>
          </a>
        </li>
        <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <div class="d-sm-none d-lg-inline-block">
                <?php if($user->is_admin == 0): ?> 
                    <span class="d-none d-md-block " style="color:white"><?php echo e(ucwords($mitra->nm)); ?></span>
                  <?php else: ?>
                    <span class="d-none d-md-block " style="color:white"><?php echo e(ucwords($user->email)); ?></span>
                <?php endif; ?>
            </div>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-title" >
                <?php if($user->is_admin == 0): ?>
                    <span><?php echo e($mitra->nm); ?></span>
                    <span><?php echo e($mitra->data_ush->nama_ush); ?></span>
                  <?php else: ?>
                    <span><?php echo e($user->email); ?></span>
                <?php endif; ?>
              </div>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-gear"></i>
                <span>Pengaturan Akun</span>
              </a>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-box-arrow-right"></i>
                <span>Logout</span>
              </a>
              
            </div>
          </li>
      </ul>
  </nav><?php /**PATH D:\applaravel\pumk\resources\views/dashboard/layouts/header.blade.php ENDPATH**/ ?>