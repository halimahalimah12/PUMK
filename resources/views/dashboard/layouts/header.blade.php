<!-- ======= Header ======= -->
{{-- <header id="header" class="header fixed-top d-flex align-items-center"> --}}
  <!-- Logo -->
  {{-- <div class="d-flex align-items-center justify-content-between">
    <a href="" class="logo1 d-flex align-items-center">
      <span class="d-none d-lg-block">PUMK</span>
    </a>
    <i class="bi bi-list toggle-sidebar-btn"></i>
  </div> --}}
  <!-- Icons Navigation -->
  {{-- <nav class="header-nav ms-auto">
    <ul class="d-flex align-items-center"> --}}
      <!-- Notification Nav -->
      {{-- <li class="nav-item dropdown"> --}}
        <!-- Notification Icon -->
        {{-- <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
          <i class="bi bi-bell"></i>
          @if( $user->is_admin ==1 ) --}}
              {{-- <span class="badge bg-primary badge-number">{{ $countnotifikasi }}</span> --}}
              {{-- <span class="badge bg-primary badge-number">{{ auth()->user()->unreadNotifications->count() }}</span>
            @else  --}}
              {{-- <span class="badge bg-primary badge-number">{{ $countnotifikasi }}</span> --}}
              {{-- <span class="badge bg-primary badge-number">{{ $mitra->unreadNotifications->count() }}</span>
          @endif
          
        </a> --}}
        <!-- Notification Dropdown Items -->
        {{-- <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
          <li class="dropdown-header">
            @if($user->is_admin == 1)
                You have {{ auth()->user()->unreadNotifications->count() }} new notifications
              @else
                You have {{ $mitra->unreadNotifications->count() }} new notifications
            @endif
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>
          @if($user->is_admin == 1 )
            @foreach ( auth()->user()->unreadNotifications as $notification )
                <li class="notification-item">
                  <i class="bi bi-info-circle text-primary"></i>
                    <div>
                      @if($notification->data['title'] == 'Pembayaran Tagihan')
                        <a href= "{{ $notification->data['url']}}" >
                          <h4> {{ $notification->data['title'] }} </h4>
                          <p>{{ ucwords($notification->data['messages']) }}</p>
                          <p>{{ $notification->created_at->diffForHumans() }} </p>
                        </a>
                        @elseif($notification->data['title'] == 'Pengajuan Pendanaan.')
                          <a href= "{{ $notification->data['url'].'?id='.$notification->id}}" >
                            <h4> {{ $notification->data['title'] }} </h4>
                            <p>{{ ucwords($notification->data['messages']) }}</p>
                            <p>{{ $notification->created_at->diffForHumans() }} </p>
                          </a>
                      @endif
                    </div>  
                </li>
              <li>
                <hr class="dropdown-divider">
              </li>
            @endforeach

            @else 
            @foreach ( $mitra->unreadNotifications as $notification )
                <li class="notification-item">
                <i class="bi bi-info-circle text-primary"></i>
                  <div>
                      <h4> <a href= "{{ $notification->data['url']}}" >{{ $notification->data['title'] }} </a></h4>
                    <p>{{ ucwords($notification->data['messages']) }}</p>
                    <p>{{ $notification->created_at->diffForHumans() }} </p>
                  </div>  
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>
            @endforeach

          @endif
          <li>
            <hr class="dropdown-divider">
          </li>
        
        </ul>
      </li> --}}
      <!--Messages Nav -->
      {{-- <li class="nav-item dropdown"> --}}
        <!--  Messages Icon -->
        {{-- <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
          <i class="bi bi-chat-left-text"></i>
          <span class="badge bg-success badge-number">3</span>
        </a> --}}
        <!-- Messages Dropdown Items -->
        {{-- <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
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
      </li> --}}
      <!-- Profile Nav -->
      {{-- <li class="nav-item dropdown pe-3"> --}}
        <!--Profile Iamge Icon -->
        {{-- <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
          @if($user->is_admin == 0) --}}
            {{-- <img src = "{{ asset('storage/dokumen/'.$mitra->foto) }}"  alt="Profile" class="imgDiv" > --}}
            {{-- <span class="d-none d-md-block dropdown-toggle ps-2" style="color:white">{{ ucwords($mitra->nm) }}</span>
          @else
            <span class="d-none d-md-block dropdown-toggle ps-2" style="color:white">{{ ucwords($user->email) }}</span>
          @endif
        </a> --}}
        <!-- Profile Dropdown Items -->
        {{-- <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
          <li class="dropdown-header">
            @if($user->is_admin == 0)
                <h6>{{ $mitra->nm }}</h6>
                <span>{{ $mitra->data_ush->nama_ush }}</span>
              @else
            @endif
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
</header> --}}

<nav class="navbar navbar-expand-lg main-navbar">
    
      <form class="form-inline mr-auto" style="width:72%">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><img src="{{ asset ('assets/img/logoap2.png')   }}" alt="" style="width:100px"></li>

        </ul>
      </form>
      <ul class="navbar-nav navbar-right " >
        {{-- notifikasi --}}
        <li class="dropdown dropdown-list-toggle" width=><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
          <div class="dropdown-menu dropdown-list dropdown-menu-right " style="width:260px;height:400px">
            <div class="dropdown-header">Notifications
              <div class="float-right">
                @if($user->is_admin == 1)
                    Anda memiliki {{ auth()->user()->unreadNotifications->count() }} notifikasi baru.
                  @else
                    Anda memiliki {{ $mitra->unreadNotifications->count() }} notifikasi baru.
                @endif
              </div>
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
        <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <div class="d-sm-none d-lg-inline-block">
                @if($user->is_admin == 0) 
                    <span class="d-none d-md-block " style="color:white">{{ ucwords($mitra->nm) }}</span>
                  @else
                    <span class="d-none d-md-block " style="color:white">{{ ucwords($user->email) }}</span>
                @endif
            </div>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-title" >
                @if($user->is_admin == 0)
                    <span>{{ $mitra->nm }}</span>
                    <span>{{ $mitra->data_ush->nama_ush }}</span>
                  @else
                    <span>{{ $user->email }}</span>
                @endif
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
  </nav>