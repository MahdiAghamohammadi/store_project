<script src="{{ asset('admin-assets/js/jquery-3.5.1.min.js') }}"></script>
<script src="{{ asset('admin-assets/js/popper.js') }}"></script>
<script src="{{ asset('admin-assets/js/Bootstrap/bootstrap.min.js') }}"></script>
<script src="{{ asset('admin-assets/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('admin-assets/sweetalert/sweetalert2.min.js') }}"></script>
<script src="{{ asset('admin-assets/js/grid.js') }}"></script>
<script>
    let notificationDropDown = document.getElementById(
        "header-notification-toggle"
    );
    notificationDropDown.addEventListener("click", function() {
        $.ajax({
            type: "post",
            url: "/admin/notification/read-all",
            data: {
                _token: "{{ csrf_token() }}"
            },
            success: function() {
                console.log('All notifications were read');
            },
        });
    });
</script>
