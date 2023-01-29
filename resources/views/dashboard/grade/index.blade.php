@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Grade set up</h4>
                    <a href="{{ route('dashboard.grades.create') }}" class="btn btn-sm btn-primary">create grade</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Grade</th>
                                    <th>Score Range</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php @endphp
                                @forelse ($grades as $key => $grade)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $grade->grade }}</td>
                                        <td>{{ $grade->min }} - {{ $grade->max }}</td>
                                        <td>
                                            <a href="{{ route('dashboard.grades.edit', [$grade->id]) }}"><button
                                                    type="button" class="btn btn-success btn-xs ml-1"><i
                                                        class="fa fa-edit"></i>Edit</button></a>
                                            <button type="button" class="btn btn-danger btn-xs" data-toggle="modal"
                                                data-target="#deleteModal{{ $grade->id }}"><i
                                                    class="fa fa-trash"></i></button>
                                        </td>
                                        <!-- delete Modal -->
                                        <form action="{{ route('dashboard.grades.delete', $grade->id) }}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <div class="modal fade" id="deleteModal{{ $grade->id }}">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Delete grade</h5>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal"><span>&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p style="font-size: 16px; color:black;">Are your sure you want
                                                                to delete grade?</p>
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
                                        <td colspan="4"> No grades available </td>
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
