 <!DOCTYPE html>
<html lang="en">
<?php if($user->is_admin ==0 ): ?>
<img src = "<?php echo e(asset('storage/dokumen/'.$mitra->scanktp)); ?>" width="25%" height="25%" frameborder="0" scrolling="auto">
<?php else: ?>
<img src = "<?php echo e(asset('storage/dokumen/'.$mitra->scanktp)); ?>" width="25%" height="25%" frameborder="0" scrolling="auto">
<?php endif; ?>

</html> <?php /**PATH D:\applaravel\pumk\resources\views/dashboard/profil/scanktp.blade.php ENDPATH**/ ?>