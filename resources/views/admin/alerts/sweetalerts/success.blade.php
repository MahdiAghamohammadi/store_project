@if (session('swal-success'))
    <script>
        $(document).ready(function() {
            Swal.fire({
                icon: 'success',
                title: 'عملیات با موفقیت انجام شد.',
                text: "{{ session('swal-success') }}",
                confirmButtonText: 'بسیار خب!',
                confirmButtonColor:'#28a745'
            });
        });
    </script>
@endif