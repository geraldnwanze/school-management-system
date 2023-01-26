@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Classes</h4>
                    <a href="{{ route('dashboard.classes.create') }}" class="btn btn-sm btn-primary">create class</a>
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
                                @forelse ($classes as $class)
                                    <tr>
                                        <td>{{ $classes->firstItem() + $loop->index }}</td>
                                        <td>{{ $class->name }}</td>
                                        <td><span class="badge badge-{{ $class->active ? 'success' : 'danger' }}">{{ $class->active ? 'active' : 'disabled' }}</span></td>
                                        <td>
                                            <button form="toggle-status-{{ $class->id }}" class="btn btn-sm btn-{{ $class->active ? 'danger' : 'primary' }}"><i class="fa fa-arrow-{{ $class->active ? 'down' : 'up' }}"></i></button>
                                            <a href="{{ route('dashboard.classes.edit', $class->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                            <button form="delete-class-{{ $class->id }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                        </td>
                                        <form action="{{ route('dashboard.classes.toggle-status', $class->id) }}" method="post" id="toggle-status-{{ $class->id }}">
                                            @csrf
                                            @method('PATCH')
                                        </form>
                                        <form action="{{ route('dashboard.classes.delete', $class->id) }}" method="post" id="delete-class-{{ $class->id }}">
                                        @csrf
                                        @method('DELETE')
                                        </form>
                                    </tr>
                                @empty
                                    
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    {{ $classes->links() }}
                </div>
            </div>
            <!-- /# card -->
        </div>
    </div>
@endsection