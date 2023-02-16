@extends('layouts.dashboard')

@section('content')

    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <div class="card">

                <div class="card-body">
                    <div class="form-group">
                        <select class="form-control" name="class_room_id" id="">
                            <option value=""> --Select Class-- </option>
                            @foreach ($classes as $class)
                                <option value="{{ $class->id }}"> {{ $class->name }} </option>
                            @endforeach
                        </select>
                    </div>

                    <div style="text-align:center;">
                        <button type="submit" class="btn btn-primary pull-center"> <span class="fa fa-search"></span> Search</button>
                    </div>

                </div>
                
            </div>
        </div>
        <div class="col-lg-2"></div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">List of Student</h4>
                    <a href="{{ route('dashboard.students.create') }}">Add new Student</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Full Name</th>
                                    <th>Class</th>
                                    <th>Gender</th>
                                    <th>Year of entry</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Ono Joe Michell</td>
                                    <td>ss2</td>
                                    <td>Female</td>
                                    <td>2018</td>
                                    <td>
                                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                                data-target="#editModal"><i
                                                    class="fa fa-edit"></i></button>
                                    </td>
                                </tr>
                                {{-- @php @endphp
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
                                @endforelse --}}
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
