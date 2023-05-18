



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
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
                  <div class="card-header"><h4>Registrasi Akun Baru</h4></div>
                  <div class="card-body" >
                    <form method="post"  action="/register" class="row g-3 " novalidate>
                          <?php echo csrf_field(); ?> 
                            <div class="col-12">
                              <label for="name" class="form-label">Nama </label>
                              <input type="text" name="name" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="name"  value=<?php echo e(old('name')); ?>>
                              <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?> </div>
                              <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="col-12">
                              <label for="nmush" class="form-label">Nama Usaha </label>
                              <input type="text" name="nmush" class="form-control <?php $__errorArgs = ['nmush'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="nmush"  value=<?php echo e(old('nmush')); ?>>
                              <?php $__errorArgs = ['nmush'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                              <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="col-12">
                              <label for="yourEmail" class="form-label">Email</label>
                              <input type="email" name="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="email"  value=<?php echo e(old('email')); ?>>
                              <span style="font-style: italic;">Masukan email yang valid</span>
                              <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                              <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="col-12">
                              <label for="password" class="form-label">Password</label>
                              <input type="password" name="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  id="password" >
                              <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                              <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                              <span style="font-style: italic;"> Minimal 8 Karakter kombinasi huruf kapital, huruf kecil, angka dan simbol.</span>
                            </div>

                            <div class="col-12">
                              <button class="btn btn-primary w-100" type="submit" >Daftar</button>
                            </div>

                            <div class="col-12">
                              <p class="small mb-0">Sudah Punya Akun? <a href="/login">Login</a></p>
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
</html><?php /**PATH D:\applaravel\pumk\resources\views/auth/regis.blade.php ENDPATH**/ ?>