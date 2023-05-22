<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <link rel="icon" href="assets/img/icontitle.png">

  <title>PUMK </title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" >
  <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/bootstrap/css/bootstrap.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/fontawesome/css/all.min.css')); ?>">


  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/jquery-selectric/selectric.css')); ?> ">

  <!-- Template CSS -->
  
  <link href="<?php echo e(asset ('assets/css/style2.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset ('assets/css/components.css')); ?>" rel="stylesheet">

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
                    <?php if(session()->has('success')): ?>
                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?php echo e(session('success')); ?>

                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    <?php endif; ?>

                    <?php if(session()->has('loginerror')): ?>
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?php echo e(session('loginerror')); ?>

                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    <?php endif; ?>

                    <form class="row g-3 " novalidate  action="/login" method="post">
                      <?php echo csrf_field(); ?> 
                      <div class="col-12">
                        <label for="email" class="form-label">Email</label>
                        <div class="input-group has-validation">
                          <input type="email" name="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  id="email"autofocus  value="<?php echo e(old('email')); ?>">
                          <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback" ><?php echo e($message); ?></div>
                          <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
                        <p class="small mb-0">Belum Punya Akun? <a href="/register">Daftar</a></p>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="credits"><p class="copyright">&copy; Copyright PT. Angkasa Pura II . All Rights Reserved</p> </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </main>
  
  

  <!-- General JS Scripts -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="<?php echo e(asset('assets/vendor/popper.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/vendor/tooltip.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/vendor/nicescroll/jquery.nicescroll.min.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/vendor/moment.min.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/js/stisla.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/js/custom.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/js/scripts.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/js/bootstrap.min.js')); ?>"></script>
  
  <!-- JS Libraies -->
  <script src=" <?php echo e(asset('assets/vendor/jquery-pwstrength/jquery.pwstrength.min.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/vendor/jquery-selectric/jquery.selectric.min.js')); ?>"></script>

  <!-- Page Specific JS File -->
  <script src="<?php echo e(asset('assets/vendor/auth-register.js')); ?>"></script>
  
  <!-- Template JS File -->
  <script src="<?php echo e(asset('assets/vendor/scripts.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/vendor/custom.js')); ?>"></script>
</body>
</html><?php /**PATH D:\applaravel\pumk\resources\views/auth/login.blade.php ENDPATH**/ ?>