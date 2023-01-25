<div>
    <!-- Walk as if you are kissing the Earth with your feet. - Thich Nhat Hanh -->
    @if ($errors->any())
    <div class="alert alert-danger" id="errDiv">
        @foreach ($errors->all() as $error)
        <p> <em>{{$error}}</em> </p>
        @endforeach
    </div>
    @endif
</div>