<script>
    $(document).ready(function() {
        var className = '{{ $className }}';
        var element = $('.' + className);
        element.on('click', function(e) {
            e.preventDefault();
            const swalWithBootstrapButton = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success mx-2',
                    cancelButton: 'btn btn-danger mx-2',
                },
                buttonsStyling: false
            });
            swalWithBootstrapButton.fire({
                title: 'آیا از حذف کردن فیلد مطمئن هستید؟',
                text: "شما می‌توانید درخواست خود را لغو نمایید!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'بله فیلد حذف شود',
                cancelButtonText: 'خیر درخواست لغو شود',
                reverseButtons: true,
            }).then((result) => {
                if (result.value == true) {
                    $(this).parent().submit();
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    swalWithBootstrapButton.fire({
                        title: 'درخواست لغو شد',
                        text: "درخواست شما لغو شد :)",
                        icon: 'error',
                        confirmButtonText: 'بسیار خب!',
                    })
                }
            })
        })
    });
</script>