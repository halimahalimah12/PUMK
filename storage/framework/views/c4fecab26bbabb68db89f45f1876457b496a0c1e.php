<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
  <ul class="sidebar-nav" id="sidebar-nav">
    <!-- Dashboard Nav -->
    <li class="nav-item">
      <a class="nav-link " href="/dashboard">
        
        <i class="bi bi-layout-wtf"></i>
        <span>Dashboard</span>
      </a>
    </li>
      
    <?php if($user->is_admin ==0 ): ?>
        
        <!-- Tables Nav -->
        <li class="nav-item">
            <a  class="nav-link collapsed" href="/pengajuan">
              <i class="bi bi-telegram"></i><span>Pengajuan</span>
            </a>
        </li>
        <!-- Tables Nav -->
        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#tagihan" data-bs-toggle="collapse" href="#">
            <i class="bi bi-journal-text"></i><span>Tagihan</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="tagihan" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
              <a href="/kartupiutang">
                <i class="bi bi-circle"></i><span>Kartu Piutang</span>
              </a>
            </li>
            <li>
              <a href="/pembayaran">
                <i class="bi bi-circle"></i><span>Data Tagihan</span>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link collapsed" href="pages-register.html">
            <i class="bi bi-clock-history"></i> <span>History</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#pengaturan" data-bs-toggle="collapse" >
            <i class="bi bi-gear-fill"></i></i><span>Pengaturan</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="pengaturan" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
              <a href="/profil">
                <i class="bi bi-circle"></i><span>Profil</span>
              </a>
            </li>
            <li>
              <a href="">
                <i class="bi bi-circle"></i><span>Akun</span>
              </a>
            </li>
          </ul>
        </li>
      <?php else: ?>
        
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin')): ?>
          <!--  Icons Nav -->
          <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#datamaster" data-bs-toggle="collapse" href="#">
              <i class="bi bi-server"></i><span>Data Master</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="datamaster" class="nav-content collapse " data-bs-parent="#sidebar-nav">
              <li>
                <a href="icons-bootstrap.html">
                  <i class="bi bi-circle"></i><span>Data Admin</span>
                </a>
              </li>
              <li>
                <a href="/datamitra">
                  <i class="bi bi-circle"></i><span>Data Mitra</span>
                </a>
              </li>
              <li>
                <a href="/pengajuan">
                  <i class="bi bi-circle"></i><span>Data Pengajuan</span>
                </a>
              </li>
              <li>
                <a href="/kartupiutang">
                  <i class="bi bi-circle"></i><span>Kartu Piutang</span>
                </a>
              </li>
            </ul>
          </li>
          <!-- Profile Page Nav -->
          <li class="nav-item">
            <a class="nav-link collapsed" href="/pembayaran">
              <i class="bi bi-ui-checks"></i>
              <span>Approve Pembayaran</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#laporan" data-bs-toggle="collapse" href="#">
              <i class="bi bi-file-earmark-bar-graph-fill"></i><span>Laporan</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="laporan" class="nav-content collapse " data-bs-parent="#sidebar-nav">
              <li>
                <a href="/laporan-survei">
                  <i class="bi bi-circle"></i><span>Survei</span>
                </a>
              </li>
              <li>
                <a href="/laporan-angsuran">
                  <i class="bi bi-circle"></i><span>Angsuran Mitra</span>
                </a>
              </li> 
            </ul>
          </li>
        <?php endif; ?>
    <?php endif; ?>
    <li class="nav-item" >
      <ul class="nav-link collapsed"   >
        <form action="/logout" method="post" >
          <?php echo csrf_field(); ?>
            <button type="submit" class="dropdown-item menu collapsed" style="float:left;" >
              <i class="bi bi-box-arrow-right"></i>
              <span>Sign Out</span>
            </button>
        </form>
      </ul>
    </li>
  </ul>
</aside><?php /**PATH D:\applaravel\pumk\resources\views/dashboard/layouts/sidebar.blade.php ENDPATH**/ ?>