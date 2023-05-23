<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <link rel="icon" href="assets/img/icontitle.png">
    <title>PUMK</title>

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    {{-- ikon --}}
    <link rel="stylesheet" href="{{ asset('assets/vendor/fontawesome/css/all.min.css')}}">

    {{-- css file online --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" >
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/quill/1.3.7/quill.snow.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/quill/1.3.7/quill.bubble.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css">

    <!-- Template Main CSS File -->
    <link href="{{ asset ('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset ('assets/css/style2.css') }}" rel="stylesheet">
    <link href="{{ asset ('assets/css/components.css') }}" rel="stylesheet">
    

    <body>
        <div id="app">
      <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>
          @include('dashboard.layouts.header')
          @include('dashboard.layouts.sidebar') 
          <!-- main -->
          <div  class="main-content">
              @yield('container')
          </div>

          <!-- ======= Footer ======= -->
          <footer class="main-footer">
            <div class="footer-left">
              <div class="copyright">
                &copy; Copyright <strong><span>PT. Angkasa Pura II  </span></strong>. All Rights Reserved
              </div>
            </div>
          </footer> 
          
      </div>
    </div>

        <!-- Vendor JS Files -->
        <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
        <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        {{-- <script src="{{ asset('assets/vendor/chart.js/chart.min.js')}}"></script> --}}
        <script src="{{ asset('assets/vendor/echarts/echarts.min.js')}}"></script>
        <script src="{{ asset('assets/vendor/quill/quill.min.js')}}"></script>
        <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
        <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js')}}"></script>
        <script src="{{ asset('assets/vendor/php-email-form/validate.js')}}"></script>


        <!-- Template js file-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
        <script src="{{ asset('assets/js/main.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.mask.min.js') }}"></script> 

        {{-- js stisla --}}
        <script src="{{ asset('assets/vendor/popper.js') }}"></script>
        <script src="{{ asset('assets/vendor/tooltip.js') }}"></script>
        <script src="{{ asset('assets/vendor/nicescroll/jquery.nicescroll.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/moment.min.js') }}"></script>
        <script src="{{ asset('assets/js/stisla.js') }}"></script>
        <script src="{{ asset('assets/js/custom.js') }}"></script>
        <script src="{{ asset('assets/js/scripts.js') }}"></script>
        <script src="{{ asset('assets/js/vue.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

        <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js" ></script>
        <script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js" ></script>
        <script type="text/javascript" src="https://unpkg.com/currency.js@1.2.2/dist/currency.min.js"></script>
        <!-- cdn vue -->
        <script src="https://cdn.jsdelivr.net/npm/vue@2.7.14/dist/vue.js"></script>
        <script>
          $(document).ready( function () {
              $('#datatable').DataTable({
                "responsive":true,
                "scrollX":        false,
                "scrollCollapse": false,
                "paging":         true,
                "fixedColumns":   false
              });
              $('.rupiah').mask("#,##0",{
                reverse:true,
              });

          } );
        </script>
    
    </body>
</html>
