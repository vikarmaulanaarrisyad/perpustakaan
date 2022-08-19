@push('css')
<!-- SweetAlert2 -->
<link rel="stylesheet" href="{{ asset('AdminLTE/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
<!-- Toastr -->
<link rel="stylesheet" href="{{ asset('AdminLTE/plugins/toastr/toastr.min.css') }}">
@endpush


@push('scripts')
<!-- SweetAlert2 -->
<script src="{{ asset('AdminLTE/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<!-- Toastr -->
<script src="{{ asset('AdminLTE/plugins/toastr/toastr.min.js') }}"></script>
<script>
    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });

    @if (session()->has('success'))
        Toast.fire({
            icon: 'success',
            title: '{{ session('message') }}'
        });
    @elseif (session()->has('error'))
        Toast.fire({
            icon: 'error',
            title: '{{ session('message') }}'
        });
    @endif
    
    
</script>
@endpush