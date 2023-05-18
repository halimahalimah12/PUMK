{{-- 
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>PUMK | Login</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" >
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/quill/1.3.7/quill.snow.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/quill/1.3.7/quill.bubble.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

    <link href="{{ asset ('assets/css/style.css') }}" rel="stylesheet">

  </head>

  <body>
    <main>
      <div class="container">
        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                <div class="d-flex justify-content-center py-4">
                  <a href="index.html" class="logo d-flex align-items-center w-auto">
                    <span class="d-none d-lg-block" >PUMK</span>
                  </a>
                </div>

                <div class="card mb-3">
                  <div class="card-body">
                    <div class="pt-4 pb-2">
                      <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                      <p class="text-center small">Enter your username & password to login</p>
                    </div>

                    @if(session()->has('success'))
                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    @endif

                    @if(session()->has('loginerror'))
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('loginerror') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    @endif

                    <form class="row g-3 needs-validation" novalidate  action="/login" method="post">
                      @csrf 
                      <div class="col-12">
                        <label for="email" class="form-label">Email</label>
                        <div class="input-group has-validation">
                          <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"  id="email"autofocus  value="{{  old('email') }}">
                          @error('email')
                            <div class="invalid-feedback" >{{ $message  }}</div>
                          @enderror
                        </div>
                      </div>

                      <div class="col-12">
                        <label for="yourPassword" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="yourPassword" >
                      </div>

                      <div class="col-12">
                        <button class="btn btn-primary w-100" type="submit" href="/dashboard">Login</button>
                      </div>
                      
                      <div class="col-12">
                        <p class="small mb-0">Don't have account? <a href="/register">Create an account</a></p>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="credits"> PT. Angkasa Pura II </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </main>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('assets/vendor/chart.js/chart.min.js')}}"></script>
    <script src="{{ asset('assets/vendor/echarts/echarts.min.js')}}"></script>
    <script src="{{ asset('assets/vendor/quill/quill.min.js')}}"></script>
    <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
    <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js')}}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js')}}"></script>

    <script src="{{ asset('assets/js/main.js')}}"></script>

  </body>

</html> --}}

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>PUMK </title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" >
  <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/vendor/fontawesome/css/all.min.css')}}">


  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{ asset('assets/vendor/jquery-selectric/selectric.css')}} ">

  <!-- Template CSS -->
  {{-- <link href="{{ asset ('assets/css/style.css') }}" rel="stylesheet"> --}}
  <link href="{{ asset ('assets/css/style2.css') }}" rel="stylesheet">
  <link href="{{ asset ('assets/css/components.css') }}" rel="stylesheet">

<body>
    <main class="form-registration">
      <div class="container">
        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                <div class="d-flex justify-content-center py-4">
                <div class="logo d-flex align-items-center w-auto">
                  <span class="d-none d-lg-block" style= " ">PUMK</span>
                </div>
              </div>

                <div class="card mb-3">
                  <div class="card-header"><h4>Log In Akun</h4></div>
                  <div class="card-body" >
                    @if(session()->has('success'))
                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    @endif

                    @if(session()->has('loginerror'))
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('loginerror') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    @endif

                    <form class="row g-3 " novalidate  action="/login" method="post">
                      @csrf 
                      <div class="col-12">
                        <label for="email" class="form-label">Email</label>
                        <div class="input-group has-validation">
                          <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"  id="email"autofocus  value="{{  old('email') }}">
                          @error('email')
                            <div class="invalid-feedback" >{{ $message  }}</div>
                          @enderror
                        </div>
                      </div>

                      <div class="col-12">
                        <label for="yourPassword" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="yourPassword" >
                      </div>

                      <div class="col-12">
                        <button class="btn btn-primary w-100" type="submit" href="/dashboard">Masuk</button>
                      </div>
                      
                      <div class="col-12">
                        <p class="small mb-0">Belum Punya Akun? <a href="/register">Daftar</a></p>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="credits">PT. Angkasa Pura II </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </main>
  
  

  <!-- General JS Scripts -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="{{ asset('assets/vendor/popper.js') }}"></script>
  <script src="{{ asset('assets/vendor/tooltip.js') }}"></script>
  <script src="{{ asset('assets/vendor/nicescroll/jquery.nicescroll.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/moment.min.js') }}"></script>
  <script src="{{ asset('assets/js/stisla.js') }}"></script>
  <script src="{{ asset('assets/js/custom.js') }}"></script>
  <script src="{{ asset('assets/js/scripts.js') }}"></script>
  <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
  
  <!-- JS Libraies -->
  <script src=" {{ asset('assets/vendor/jquery-pwstrength/jquery.pwstrength.min.js')}}"></script>
  <script src="{{ asset('assets/vendor/jquery-selectric/jquery.selectric.min.js')}}"></script>

  <!-- Page Specific JS File -->
  <script src="{{ asset('assets/vendor/auth-register.js')}}"></script>
  
  <!-- Template JS File -->
  <script src="{{ asset('assets/vendor/scripts.js')}}"></script>
  <script src="{{ asset('assets/vendor/custom.js')}}"></script>
</body>
</html>