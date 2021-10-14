@if (session('toast-success'))
    <section class="toast" data-delay="5000">
        <section class="py-3 text-white toast-body d-flex bg-success">
            <strong class="ml-auto">{{ session('toast-success') }}</strong>
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