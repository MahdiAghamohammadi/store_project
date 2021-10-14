@if (session('toast-error'))

    <section class="toast" data-delay="5000">
        <section class="py-3 text-white toast-body d-flex bg-danger">
            <strong class="ml-auto">{{ session('toast-error') }}</strong>
            <button type="submit" class="mr-2 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </section>
    </section>
    <script>
        $(document).ready(function() {
            $('.toast').toast('show');
        });
    </script>
@endif
