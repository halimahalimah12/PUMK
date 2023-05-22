<!-- ======= Sidebar ======= -->
<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">PUMK</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">PUMK</a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item  <?php echo e(set_active(['dashboard'])); ?> " href="/dashboard">
              <a class="nav-link " href="/dashboard">
                <i class="fas fa-tachometer-alt"></i>
                <span>Dashboard</span>
              </a>
            </li>
            <?php if($user->is_admin ==0 ): ?>
                <li class="menu-header">Pengajuan</li>
                <li class="nav-item  <?php echo e(set_active(['pengajuan'])); ?> ">
                    <a  class=" nav-link collapsed " href="/pengajuan">
                      <i class="fas fa-paper-plane"></i><span>Pengajuan</span>
                    </a>
                </li>
                <li class="menu-header">Kartu Piutang</li>
                <li class="nav-item <?php echo e(set_active(['kartupiutang'])); ?> ">
                  <a href="/kartupiutang">
                  <i class="far fa-file-alt"></i><span>Kartu Piutang</span>
                  </a>
                </li>
                <li class="nav-item <?php echo e(set_active(['pembayaran'])); ?> ">
                    <a href="/pembayaran">
                      <i class="fas fa-file-invoice"></i><span>Pembayaran</span>
                    </a>
                </li>
                <li class="menu-header">Pengaturan</li>
                <li class="dropdown <?php echo e(set_active(['profil','akun'])); ?>">
                  <a href="#" class="nav-link has-dropdown   "><i class="fas fa-cog"></i><span>Pengaturan</span></a>
                  <ul class="dropdown-menu">
                    <li class="<?php echo e(set_active(['profil'])); ?> "><a href="/profil"><span>Profil</span></a></li>                
                    <li class="<?php echo e(set_active(['akun'])); ?> "> <a href="/akun"><span>Akun</span></a></li>                
                  </ul>
                </li>
              <?php else: ?>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin')): ?>
                <li class="nav-item <?php echo e(set_active(['datamitra'])); ?> ">
                    <a  class=" nav-link collapsed " href="/datamitra">
                      <i class="fas fa-users"></i><span>Data Mitra</span>
                    </a>
                </li>
                <li class="nav-item <?php echo e(set_active(['pengajuan'])); ?> ">
                    <a  class=" nav-link collapsed " href="/pengajuan">
                      <i class="fas fa-paper-plane"></i><span>Pengajuan</span>
                    </a>
                </li>
                <li class="nav-item <?php echo e(set_active(['kartupiutang'])); ?>  ">
                    <a href="/kartupiutang">
                      <i class="fas fa-file-invoice"></i><span>Kartu Piutang</span>
                    </a>
                </li>
                <li class="nav-item <?php echo e(set_active(['pembayaran'])); ?> ">
                    <a class="nav-link collapsed" href="/pembayaran">
                      <i class="fas fa-tasks"></i>
                      <span>Approve Pembayaran</span>
                    </a>
                </li>
                <li class="dropdown <?php echo e(set_active(['laporan-survei','laporan-angsuran'])); ?>">
                  <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i></i><span>Laporan</span></a>
                  <ul class="dropdown-menu">
                    <li class="<?php echo e(set_active(['laporan-survei'])); ?>"><a class="nav-link" href="/laporan-survei">Laporan Survei</a></li>                
                    <li class="<?php echo e(set_active(['laporan-angsuran'])); ?>"><a class="nav-link " href="/laporan-angsuran">Laporan Angsuran Mitra </a></li>                
                  </ul>
                </li>
              <?php endif; ?>
            <?php endif; ?>
            
            
          </ul>

          <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <form action="/logout" method="post" >
              <?php echo csrf_field(); ?>
                <button type="submit" class="btn btn-primary btn-lg btn-block btn-icon-split" style="width:100%" >
                  <i class="fas fa-sign-out-alt" style="margin-left:20px"></i> <span >Logout</span>
                </button>
            </form>
          </div>        
  </aside>
</div>  

<?php /**PATH D:\applaravel\pumk\resources\views/dashboard/layouts/sidebar.blade.php ENDPATH**/ ?>