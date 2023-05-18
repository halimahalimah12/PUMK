<!-- ======= Sidebar ======= -->
{{-- <aside id="sidebar" class="sidebar">
  <ul class="sidebar-nav" id="sidebar-nav">
    
    <li class="nav-item">
      <a class="nav-link {{ request()->is('/dashboard') ? 'active' : '' }} " href="/dashboard">
        
        <i class="bi bi-layout-wtf"></i>
        <span>Dashboard</span>
      </a>
    </li>
    @if($user->is_admin ==0 )
        <li class="nav-item  ">
            <a  class=" nav-link collapsed active" href="/pengajuan">
              <i class="bi bi-telegram"></i><span>Pengajuan</span>
            </a>
        </li>
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
            <li class="{{ request()->is('/dashboard') ? 'active' : '' }}">
              <a href="/profil">
                <i class="bi bi-circle"></i><span>Profil</span>
              </a>
            </li>
            <li>
              <a href="/akun">
                <i class="bi bi-circle"></i><span>Akun</span>
              </a>
            </li>
          </ul>
        </li>
      @else
        @can('admin')
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
        @endcan
    @endif
    <li class="nav-item" >
      <ul class="nav-link collapsed"   >
        <form action="/logout" method="post" >
          @csrf
            <button type="submit" class="dropdown-item menu collapsed" style="float:left;" >
              <i class="bi bi-box-arrow-right"></i>
              <span>Sign Out</span>
            </button>
        </form>
      </ul>
    </li>
  </ul>
</aside> --}}
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
            <li class="nav-item  {{ set_active(['dashboard']) }} " href="/dashboard">
              <a class="nav-link " href="/dashboard">
                <i class="fas fa-tachometer-alt"></i>
                <span>Dashboard</span>
              </a>
            </li>
            @if($user->is_admin ==0 )
                <li class="menu-header">Pengajuan</li>
                <li class="nav-item  {{ set_active(['pengajuan']) }} ">
                    <a  class=" nav-link collapsed " href="/pengajuan">
                      <i class="fas fa-paper-plane"></i><span>Pengajuan</span>
                    </a>
                </li>
                <li class="menu-header">Kartu Piutang</li>
                <li class="nav-item {{ set_active(['kartupiutang']) }} ">
                  <a href="/kartupiutang">
                  <i class="far fa-file-alt"></i><span>Kartu Piutang</span>
                  </a>
                </li>
                <li class="nav-item {{ set_active(['pembayaran']) }} ">
                    <a href="/pembayaran">
                      <i class="fas fa-file-invoice"></i><span>Pembayaran</span>
                    </a>
                </li>
                <li class="menu-header">Pengaturan</li>
                <li class="dropdown {{ set_active(['profil','akun']) }}">
                  <a href="#" class="nav-link has-dropdown   "><i class="fas fa-cog"></i><span>Pengaturan</span></a>
                  <ul class="dropdown-menu">
                    <li class="{{ set_active(['profil']) }} "><a href="/profil"><span>Profil</span></a></li>                
                    <li class="{{ set_active(['akun']) }} "> <a href="/akun"><span>Akun</span></a></li>                
                  </ul>
                </li>
              @else
              @can('admin')
                <li class="nav-item {{ set_active(['datamitra']) }} ">
                    <a  class=" nav-link collapsed " href="/datamitra">
                      <i class="fas fa-users"></i><span>Data Mitra</span>
                    </a>
                </li>
                <li class="nav-item {{ set_active(['pengajuan']) }} ">
                    <a  class=" nav-link collapsed " href="/pengajuan">
                      <i class="fas fa-paper-plane"></i><span>Pengajuan</span>
                    </a>
                </li>
                <li class="nav-item {{ set_active(['kartupiutang']) }}  ">
                    <a href="/kartupiutang">
                      <i class="fas fa-file-invoice"></i><span>Kartu Piutang</span>
                    </a>
                </li>
                <li class="nav-item {{ set_active(['pembayaran']) }} ">
                    <a class="nav-link collapsed" href="/pembayaran">
                      <i class="fas fa-tasks"></i>
                      <span>Approve Pembayaran</span>
                    </a>
                </li>
                <li class="dropdown {{ set_active(['laporan-survei','laporan-angsuran']) }}">
                  <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i></i><span>Laporan</span></a>
                  <ul class="dropdown-menu">
                    <li class="{{ set_active(['laporan-survei']) }}"><a class="nav-link" href="/laporan-survei">Laporan Survei</a></li>                
                    <li class="{{ set_active(['laporan-angsuran']) }}"><a class="nav-link " href="/laporan-angsuran">Laporan Angsuran Mitra </a></li>                
                  </ul>
                </li>
              @endcan
            @endif
            
            
          </ul>

          <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <form action="/logout" method="post" >
              @csrf
                <button type="submit" class="btn btn-primary btn-lg btn-block btn-icon-split" style="width:100%" >
                  <i class="fas fa-sign-out-alt" style="margin-left:20px"></i> <span >Logout</span>
                </button>
            </form>
          </div>        
  </aside>
</div>  

