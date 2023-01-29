@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Terms</h4>
                    <a href="{{ route('dashboard.terms.create') }}" class="btn btn-sm btn-primary">create term</a>
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
                                @forelse ($terms as $term)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $term->name }}</td>
                                        <td><span class="badge badge-{{ $term->active ? 'success' : 'danger' }}">{{ $term->active ? 'active' : 'disabled' }}</span></td>
                                        <td>
                                            <button form="toggle-status-{{ $term->id }}" class="btn btn-sm btn-{{ $term->active ? 'danger' : 'primary' }}"><i class="fa fa-arrow-{{ $term->active ? 'down' : 'up' }}"></i></button>
                                            <a href="{{ route('dashboard.terms.edit', $term->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                            <button form="delete-class-{{ $term->id }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                        </td>
                                        <form action="{{ route('dashboard.terms.toggle-status', $term->id) }}" method="post" id="toggle-status-{{ $term->id }}">
                                            @csrf
                                            @method('PATCH')
                                        </form>
                                        <form action="{{ route('dashboard.terms.delete', $term->id) }}" method="post" id="delete-class-{{ $term->id }}">
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
            </div>
            <!-- /# card -->
        </div>
    </div>
@endsection