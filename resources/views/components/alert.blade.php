<div>
    <!-- Walk as if you are kissing the Earth with your feet. - Thich Nhat Hanh -->
    @if ($errors->any())
    <div class="alert alert-danger" id="errDiv">
        @foreach ($errors->all() as $error)
        <p> <em>{{$error}}</em> </p>
        @endforeach
    </div>
    @endif

    @if (session()->has('error'))
        <div class="alert alert-danger" id="errDiv">
            <p> <em>{{ session()->get('error') }}</em> </p>
        </div>
    @endif

    @if (session()->has('success'))
        <div class="alert alert-success">
            <p> <em>{{ session()->get('success') }}</em> </p>
        </div>
    @endif
</div>

<script>
    setTimeout(() => {
        $('.alert').css('display', 'none');
    }, 3000);
</script>