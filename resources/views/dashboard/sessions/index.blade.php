@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Sessions</h4>
                    <a href="{{ route('dashboard.sessions.create') }}" class="btn btn-sm btn-primary">create session</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($sessions as $session)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $session->from }}</td>
                                        <td>{{ $session->to }}</td>
                                        <td><span class="badge badge-{{ $session->active ? 'success' : 'danger' }}">{{ $session->active ? 'active' : 'disabled' }}</span></td>
                                        <td>
                                            <button form="toggle-status-{{ $session->id }}" class="btn btn-sm btn-{{ $session->active ? 'danger' : 'primary' }}"><i class="fa fa-arrow-{{ $session->active ? 'down' : 'up' }}"></i></button>
                                            <a href="{{ route('dashboard.sessions.edit', $session->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                            <button form="delete-class-{{ $session->id }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                        </td>
                                        <form action="{{ route('dashboard.sessions.toggle-status', $session->id) }}" method="post" id="toggle-status-{{ $session->id }}">
                                            @csrf
                                            @method('PATCH')
                                        </form>
                                        <form action="{{ route('dashboard.sessions.delete', $session->id) }}" method="post" id="delete-class-{{ $session->id }}">
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