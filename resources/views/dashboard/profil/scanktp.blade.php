<!DOCTYPE html>
<html lang="en">
    @if($user->is_admin ==0 )
            <img src = "{{ asset('storage/dokumen/'.$mitra->scanktp) }}" width="25%" height="25%" frameborder="0" scrolling="auto">
        @else
            <img src = "{{ asset('storage/dokumen/'.$mitra->scanktp) }}" width="25%" height="25%" frameborder="0" scrolling="auto">
    @endif
</html> 