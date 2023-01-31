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
                                            <a href="{{ route('dashboard.grades.edit', [$grade->id]) }}" class="btn btn-warning btn-sm">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <button class="btn btn-danger btn-sm" form="delete-grade-{{ $grade->id }}">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </td>
                                        
                                        <form action="{{ route('dashboard.grades.delete', $grade->id) }}" method="post" id="delete-grade-{{ $grade->id }}">
                                            @method('DELETE')
                                            @csrf
                                        </form>

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
