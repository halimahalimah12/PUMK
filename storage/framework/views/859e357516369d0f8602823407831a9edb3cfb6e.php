 <!DOCTYPE html>
<html lang="en">
<?php if($user->is_admin ==0 ): ?>
<embed type = "application/pdf"src = "<?php echo e(asset('storage/dokumen/'.$pengajuan->surat_ush_rt)); ?>" width="100%" height="630" frameborder="0" scrolling="auto">
<?php else: ?>
<embed type = "application/pdf"src = "<?php echo e(asset('storage/dokumen/'.$mitra->surat_ush_rt)); ?>" width="100%" height="630" frameborder="0" scrolling="auto">
<?php endif; ?>

</html> <?php /**PATH D:\applaravel\pumk\resources\views/dashboard/pengajuan/dokumen/berusaha.blade.php ENDPATH**/ ?>