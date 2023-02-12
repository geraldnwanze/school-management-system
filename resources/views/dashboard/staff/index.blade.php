@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">List of Staff</h4>
                    <a href="{{ route('dashboard.staffs.create') }}">Add new staff</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Gender</th>
                                    <th>Assign</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php @endphp
                                @forelse ($staffs as $key => $staff)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $staff->full_name }}</td>
                                        <td>{{ $staff->email }}</td>
                                        <td>{{$staff->gender}}</td>
                                        <td>
                                            <a href="{{ route('dashboard.staffs.assignSubject', [$staff->id]) }}" class="btn btn-success btn-sm">
                                                <span class="fa fa-users"></span> Assign Class/Subject
                                            </a>
                                           
                                        </td>
                                        <td>
                                            
                                            <a href="{{ route('dashboard.staffs.edit', [$staff->id]) }}" class="btn btn-warning btn-sm">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <button class="btn btn-danger btn-sm" form="delete-staff-{{ $staff->id }}">
                                                <i class="fa fa-trash"></i>
                                            </button>

                                            <form action="{{ route('dashboard.staffs.delete', $staff->id) }}" method="post" id="delete-staff-{{ $staff->id }}">
                                                @method('DELETE')
                                                @csrf
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4"> No Staff found </td>
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
