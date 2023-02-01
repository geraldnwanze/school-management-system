@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Deleted Classes</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($classes as $class)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $class->name }}</td>
                                        <td>
                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#restoreModal{{ $class->id }}">
                                                <i class="fa fa-undo"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{ $class->id }}">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </td>
                                        
                                        <!-- restore Modal -->
                                        <form action="{{ route('dashboard.classes.restore', $class->id) }}" method="post">
                                            @method('PATCH')
                                            @csrf
                                            <div class="modal fade" id="restoreModal{{ $class->id }}">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Restore class</h5>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal"><span>&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p style="font-size: 16px; color:black;">Are your sure you want
                                                                to restore class?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-danger">
                                                                Yes
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <!--End restore Modal -->

                                        <!-- delete Modal -->
                                        <form action="{{ route('dashboard.classes.force-delete', $class->id) }}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <div class="modal fade" id="deleteModal{{ $class->id }}">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Delete class</h5>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal"><span>&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p style="font-size: 16px; color:black;">Are your sure you want
                                                                to permanently delete class?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-danger">
                                                                Yes
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <!--End delete Modal -->
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4"> No deleted classes available </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">

                </div>
            </div>
            <!-- /# card -->
        </div>
    </div>
@endsection
