<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    // Set the options that I want
toastr.options = {
  "closeButton": true,
  "newestOnTop": false,
  "progressBar": true,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "10000",
  "extendedTimeOut": "5000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
</script>

<div>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <script>toastr.error("{{ $error }}")</script>
        @endforeach
    @endif

    @if (session()->has('error'))
        <script>toastr.error("{{ session()->get('error') }}")</script>
    @endif

    @if (session()->has('success'))
        <script>toastr.success("{{ session()->get('success') }}")</script>
    @endif
</div>
