<div>
    <!-- Walk as if you are kissing the Earth with your feet. - Thich Nhat Hanh -->
    @if ($errors->any())
    <div class="alert alert-danger" id="errDiv">
        <h5>Whoops! something must have gone wrong...</h5>
        @foreach ($errors->all() as $error)
        <p> <em>{{$error}}</em> </p>
        @endforeach
    </div>
    @endif
</div>