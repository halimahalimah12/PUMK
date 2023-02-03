<!DOCTYPE html>
<html lang="en">
    @if($user->is_admin ==0 )
            <embed type = "application/pdf"src = "{{ asset('storage/dokumen/'.$pengajuan->surat_ush_rt) }}" width="100%" height="630" frameborder="0" scrolling="auto">
        @else
            <embed type = "application/pdf"src = "{{ asset('storage/dokumen/'.$mitra->surat_ush_rt) }}" width="100%" height="630" frameborder="0" scrolling="auto">
    @endif
</html> 