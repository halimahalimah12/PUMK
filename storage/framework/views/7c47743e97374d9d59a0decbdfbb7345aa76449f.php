<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">
  <!-- Logo -->
  <div class="d-flex align-items-center justify-content-between">
    <a href="index.html" class="logo d-flex align-items-center">
      <span class="d-none d-lg-block">PUMK</span>
    </a>
    <i class="bi bi-list toggle-sidebar-btn"></i>
  </div>
  <!-- Icons Navigation -->
  <nav class="header-nav ms-auto">
    <ul class="d-flex align-items-center">
      <!-- Notification Nav -->
      <li class="nav-item dropdown">
        <!-- Notification Icon -->
        <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
          <i class="bi bi-bell"></i>
          <?php if( $user->is_admin ==1 ): ?>
              <span class="badge bg-primary badge-number"><?php echo e($countnotifikasi); ?></span>
            <?php else: ?> 
              <span class="badge bg-primary badge-number"><?php echo e($countnotifikasi); ?></span>
          <?php endif; ?>
          
        </a>
        <!-- Notification Dropdown Items -->
        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
          <li class="dropdown-header">
            You have <?php echo e($countnotifikasi); ?> new notifications
            <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <?php if($user->is_admin == 1 ): ?>
            <?php $__currentLoopData = $notification; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notif): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li class="notification-item">
                <i class="bi bi-info-circle text-primary"></i>
                  <div>
                    <?php if($notif->type == "Pengajuan Proposal"): ?>
                      <h4> <a href= "/pengajuan" ><?php echo e($notif->type); ?> </a></h4>
                    <?php else: ?>
                      <h4> <a href= "/pembayaran" ><?php echo e($notif->type); ?> </a></h4>
                    <?php endif; ?>
                    <p><?php echo e($notif->data); ?></p>
                  </div>  
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?> 
            <?php $__currentLoopData = $notification; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notif): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li class="notification-item">
                <i class="bi bi-info-circle text-primary"></i>
                  <div>
                    <?php if($notif->type == "Pengajuan Proposal"): ?>
                      <h4> <a href= "/pengajuan" ><?php echo e($notif->type); ?> </a></h4>
                    <?php else: ?>
                      <h4> <a href= "/pembayaran" ><?php echo e($notif->type); ?> </a></h4>
                    <?php endif; ?>
                    <p><?php echo e($notif->data); ?></p>
                  </div>  
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

          <?php endif; ?>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li class="dropdown-footer">
            <a href="#">Show all notifications</a>
          </li>
        </ul>
      </li>
      <!--Messages Nav -->
      <li class="nav-item dropdown">
        <!--  Messages Icon -->
        
        <!-- Messages Dropdown Items -->
        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
          <li class="dropdown-header">
            You have 3 new messages
            <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>

          <li class="message-item">
            <a href="#">
              <img src="assets/img/messages-1.jpg" alt="" class="rounded-circle">
              <div>
                <h4>Maria Hudson</h4>
                <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                <p>4 hrs. ago</p>
              </div>
            </a>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>

          <li class="message-item">
            <a href="#">
              <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
              <div>
                <h4>Anna Nelson</h4>
                <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                <p>6 hrs. ago</p>
              </div>
            </a>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>

          <li class="message-item">
            <a href="#">
              <img src="assets/img/messages-3.jpg" alt="" class="rounded-circle">
              <div>
                <h4>David Muldon</h4>
                <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                <p>8 hrs. ago</p>
              </div>
            </a>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>

          <li class="dropdown-footer">
            <a href="#">Show all messages</a>
          </li>

        </ul>
      </li>
      <!-- Profile Nav -->
      <li class="nav-item dropdown pe-3">
        <!--Profile Iamge Icon -->
        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
          <?php if($user->is_admin == 0): ?>
            
            <span class="d-none d-md-block dropdown-toggle ps-2" style="color:white"><?php echo e(ucwords($mitra->nm)); ?></span>
          <?php else: ?>
            <span class="d-none d-md-block dropdown-toggle ps-2" style="color:white"><?php echo e(ucwords($user->email)); ?></span>
          <?php endif; ?>
        </a>
        <!-- Profile Dropdown Items -->
        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
          <li class="dropdown-header">
            <?php if($user->is_admin == 0): ?>
                <h6><?php echo e($mitra->nm); ?></h6>
                <span><?php echo e($mitra->data_ush->nama_ush); ?></span>
              <?php else: ?>
            <?php endif; ?>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li>
            <a class="dropdown-item d-flex align-items-center" href="/profil">
              <i class="bi bi-person"></i> <span>My Profile</span>
            </a>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li>
            <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
              <i class="bi bi-gear"></i>
              <span>Account Settings</span>
            </a>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li>
            <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
              <i class="bi bi-question-circle"></i>
              <span>Need Help?</span>
            </a>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li>
            <a class="dropdown-item d-flex align-items-center" href="#">
              <i class="bi bi-box-arrow-right"></i>
              <span>Sign Out</span>
            </a>
          </li>
        </ul>
      </li>
    </ul>
  </nav>
</header><?php /**PATH D:\applaravel\pumk\resources\views/dashboard/layouts/header.blade.php ENDPATH**/ ?>