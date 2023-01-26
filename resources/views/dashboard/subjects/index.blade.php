@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Subjects</h4>
                    <a href="{{ route('dashboard.subjects.create') }}" class="btn btn-sm btn-primary">create subject</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($subjects as $subject)
                                    <tr>
                                        <td>{{ $subjects->firstItem() + $loop->index }}</td>
                                        <td>{{ $subject->name }}</td>
                                        <td><span class="badge badge-{{ $subject->active ? 'success' : 'danger' }}">{{ $subject->active ? 'active' : 'disabled' }}</span></td>
                                        <td>
                                            <button form="toggle-status-{{ $subject->id }}" class="btn btn-sm btn-{{ $subject->active ? 'danger' : 'primary' }}"><i class="fa fa-arrow-{{ $subject->active ? 'down' : 'up' }}"></i></button>
                                            <a href="{{ route('dashboard.subjects.edit', $subject->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                            <button form="delete-class-{{ $subject->id }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                        </td>
                                        <form action="{{ route('dashboard.subjects.toggle-status', $subject->id) }}" method="post" id="toggle-status-{{ $subject->id }}">
                                            @csrf
                                            @method('PATCH')
                                        </form>
                                        <form action="{{ route('dashboard.subjects.delete', $subject->id) }}" method="post" id="delete-class-{{ $subject->id }}">
                                        @csrf
                                        @method('DELETE')
                                        </form>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="100%">no data available</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    {{ $subjects->links() }}
                </div>
            </div>
            <!-- /# card -->
        </div>
    </div>
@endsection