
<nav class="navbar navbar-expand-lg main-navbar">
    
      <form class="form-inline mr-auto" style="width:65%">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><img src="{{ asset ('assets/img/logoap2.png')   }}" alt="" style="width:100px"></li>
        </ul>
      </form>
      <ul class="navbar-nav navbar-right "  style="margin-right:80px">
        {{-- notifikasi --}}
        <li class="dropdown dropdown-list-toggle" width=><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
          <div class="dropdown-menu dropdown-list dropdown-menu-right " style="width:260px" >
            <div class="dropdown-header">
                @if($user->is_admin == 1)
                    Anda memiliki {{ auth()->user()->unreadNotifications->count() }} notifikasi baru.
                  @else
                    Anda memiliki {{ $mitra->unreadNotifications->count() }} notifikasi baru.
                @endif
            </div>
            <div class="dropdown-list-content dropdown-list-icons">
              @if($user->is_admin == 1 )
                  @foreach ( auth()->user()->unreadNotifications as $notification )
                    @if($notification->data['title'] == 'Pembayaran Tagihan')
                          <a href="{{ $notification->data['url']}}" class="dropdown-item">
                            <div class="dropdown-item-icon bg-info text-white">
                              <i class="fas fa-paper-plane"></i>
                            </div>
                            <div class="dropdown-item-desc">
                              <b style="font-weight: bold;">{{ $notification->data['title'] }} </b><br>
                              <b>{{ ucwords($notification->data['messages']) }}</b>
                              <div class="time">{{ $notification->created_at->diffForHumans() }}</div>
                            </div>
                          </a>
                        @elseif($notification->data['title'] == 'Pengajuan Pendanaan.')
                          <a href="{{ $notification->data['url'].'?id='.$notification->id}}" class="dropdown-item">
                            <div class="dropdown-item-icon bg-info text-white">
                              <i class="fas fa-money-bill-wave-alt"></i>
                            </div>
                            <div class="dropdown-item-desc">
                              <b style="font-weight: bold;">{{ $notification->data['title'] }} </b><br>
                              <b>{{ ucwords($notification->data['messages']) }}</b>
                              <div class="time">{{ $notification->created_at->diffForHumans() }}</div>
                            </div>
                          </a>
                      @endif
                  @endforeach
                @else
                  @foreach (  $mitra->unreadNotifications as $notification )
                          <a href="{{ $notification->data['url']}}" class="dropdown-item">
                            <div class="dropdown-item-icon bg-info text-white">
                              <i class="fal fa-info-circle"></i>
                            </div>
                            <div class="dropdown-item-desc">
                              <b style="font-weight: bold;">{{ $notification->data['title'] }} </b><br>
                              <b>{{ ucwords($notification->data['messages']) }}</b>
                              <div class="time">{{ $notification->created_at->diffForHumans() }}</div>
                            </div>
                          </a>
                  @endforeach
              @endif
            </div>
          </div>
        </li>

        {{-- profil --}}
        <li class="dropdown">
          <a href="#" data-toggle="dropdown" class="nav-link nav-link-lg nav-link-user">
            @if($user->is_admin == 0)
              <div class="round">
                @if($mitra->foto != NULL)
                    <img alt="image" src="{{ asset('storage/dokumen/'.$mitra->foto) }}" style="margin-right:30px;"height="100px" width=auto>
                  @else
                    <img alt="image" src="{{ asset('assets/img/avatar-1.png') }}">
                @endif
              </div>
            @endif
          </a>
        </li>
        <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link  nav-link-lg nav-link-user" style="maring-bottom:0px">
            <div class="d-sm-none d-lg-inline-block">
                @if($user->is_admin == 0) 
                    <span class="d-none d-md-block " style="color:white" >{{ ucwords($mitra->nm) }} <i class="fas fa-sort-down"></i></span>
                  @else
                    <span class="d-none d-md-block " style="color:white" >{{ ucwords($user->email) }} <i class="fas fa-sort-down"></i></span>
                @endif
            </div>
            <div class="dropdown-menu dropdown-menu-right" style="width:200px;">
              <div class="dropdown-title" >
                @if($user->is_admin == 0)
                    <center>{{ $mitra->nm }}</center> <br>
                    <center>{{ $mitra->data_ush->nama_ush }}</center>
                  @else
                    <span>{{ $user->email }}</span>
                @endif
              </div>
              <a class="dropdown-item d-flex align-items-center" href="/akun">
                <i class="bi bi-gear"></i>
                <span>Pengaturan Akun</span>
              </a>
              <a class="dropdown-item d-flex align-items-center" href="/logout">
                <i class="bi bi-box-arrow-right"></i>
                <span>Logout</span>
              </a>
              
            </div>
          </li>
      </ul>
  </nav>