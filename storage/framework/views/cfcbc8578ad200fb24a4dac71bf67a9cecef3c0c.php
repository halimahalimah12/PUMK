<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>PUMK</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" >
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/quill/1.3.7/quill.snow.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/quill/1.3.7/quill.bubble.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css">

    <!-- Template Main CSS File -->
    <link href="<?php echo e(asset ('assets/css/style.css')); ?>" rel="stylesheet">
  </head>
  <body>
    <?php echo $__env->make('dashboard.layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('dashboard.layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- main -->
    <main id="main" class="main">
        <?php echo $__env->yieldContent('container'); ?>
    </main>

    <!-- ======= Footer ======= -->
    
    <footer id="footer" class="footer">
      <div class="copyright">
        &copy; Copyright <strong><span>Halimah</span></strong>. All Rights Reserved
      </div>
    </footer>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="<?php echo e(asset('assets/vendor/apexcharts/apexcharts.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/chart.js/chart.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/echarts/echarts.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/quill/quill.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/simple-datatables/simple-datatables.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/tinymce/tinymce.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/php-email-form/validate.js')); ?>"></script>

    <!-- Template Main JS File -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.js" integrity="sha512-nO7wgHUoWPYGCNriyGzcFwPSF+bPDOR+NvtOYy2wMcWkrnCNPKBcFEkU80XIN14UVja0Gdnff9EmydyLlOL7mQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Template Main JS File -->
    <script src="<?php echo e(asset('assets/js/main.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/jquery.mask.min.js')); ?>"></script>


      <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js" ></script>
      <script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js" ></script>
      <script type="text/javascript" src="https://unpkg.com/currency.js@1.2.2/dist/currency.min.js"></script>
      <script>
        $(document).ready( function () {
            $('#datatable').DataTable();
            $('.rupiah').mask("#,##0",{
              reverse:true,
            });

        } );
      </script>
  </body>
</html>

<?php /**PATH D:\applaravel\pumk\resources\views/dashboard/layouts/main.blade.php ENDPATH**/ ?>