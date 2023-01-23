<div>
    <!-- <div class="col-md-12"> -->
    @if (Session::has('error'))
    <div class="alert alert-danger alert-dismissible alert-alt fade show">
        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
        </button>
        <strong>{{Session::get('error')}}</strong>
    </div>
    @endif

    @if (Session::has('success'))
    <div class="alert alert-success alert-dismissible alert-alt fade show">
        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
        </button>
        <strong>{{Session::get('success')}}</strong>
    </div>
    @endif

    @if (Session::has('warning'))
    <div class="alert alert-warning alert-dismissible alert-alt fade show">
        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
        </button>
        <strong>{{Session::get('warning')}}</strong>
    </div>
    @endif
    <!-- </div> -->
</div>