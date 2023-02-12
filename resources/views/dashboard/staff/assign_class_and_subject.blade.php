@extends('layouts.dashboard')
@section('content')
    <div class="row">

        <div class="col-lg-8 offset-2">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Assign Subject and Class</h4>
                    <a href="#"> <span class="fa fa-list"></span> Already Assigned</a>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form action="{{ route('dashboard.staffs.saveAssigned') }}" method="POST">
                            @csrf

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="">Current Session</label>
                                    <input type="text" name="session" value="2022/2023" readonly class="form-control">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="">Staff</label>
                                    <input type="text" value="{{ $staff->full_name }}" readonly class="form-control">
                                    <input type="hidden" name="user_id" value="{{ $staff->id }}">
                                </div>
                            </div>

                            <div class="form-group">

                                <select class="form-control" name="class_room_id" id="">
                                    <option value=""> --Select Class-- </option>
                                    @foreach ($classes as $class)
                                        <option value="{{ $class->id }}"> {{ $class->name }} </option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="form-group">

                                <select class="form-control" name="subject_id" id="">
                                    <option value=""> --Select Subject-- </option>
                                    @foreach ($subjects as $subject)
                                        <option value="{{ $subject->id }}"> {{ $subject->name }} </option>
                                    @endforeach
                                </select>

                            </div>

                            <button type="submit" class="btn btn-primary"> <span class="fa fa-save"></span> Save</button>
                            <a href="{{ route('dashboard.staffs.index') }}" class="pull-right"> <span
                                    class="fa fa-arrow-left"></span> Go back</a>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-lg-10 offset-1">
            <div class="card">
                <div class="card-header">

                </div>
                <div class="card-body">
                    <h4 class="card-title text-center">assigned to {{ $staff->full_name }}</h4>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Class</th>
                                    <th>Subject</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($assignedClassAndSubject as $sn => $assigned)
                                    <tr>
                                        <td>{{ $sn + 1 }}</td>
                                        <td>{{ $assigned->classRoom->name }}</td>
                                        <td>{{ $assigned->subject->name }}</td>
                                        <td>
                                            <div class="row">
                                                <button type="button" class="btn btn-info btn-sm mr-1" data-toggle="modal"
                                                    data-target="#editModal{{ $assigned->id }}"><i
                                                        class="fa fa-edit"></i></button>
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                    data-target="#deleteModal{{ $assigned->id }}"><i
                                                        class="fa fa-trash"></i></button>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- delete Modal -->
                                    <form action="#" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <div class="modal fade" id="deleteModal{{ $assigned->id }}">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Delete Assigned</h5>
                                                        <button type="button" class="close"
                                                            data-dismiss="modal"><span>&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p style="font-size: 16px; color:black;">Are your sure you want to
                                                            remove assignment for Class: {{ $assigned->classRoom->name }},
                                                            Subject: {{ $assigned->subject->name }}</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-success">Yes !!</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                    <!--End delete Modal -->

                                    <!-- edit Modal -->
                                    <form action="{{route('dashboard.staffs.updateAssigned', [$assigned->id])}}" method="post">
                                        @method('PATCH')
                                        @csrf
                                        <div class="modal fade" id="editModal{{ $assigned->id }}">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Edit Assigned</h5>
                                                        <button type="button" class="close"
                                                            data-dismiss="modal"><span>&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label for="">Current Session</label>
                                                                <input type="text" name="session" value="2022/2023"
                                                                    readonly class="form-control">
                                                            </div>

                                                            <div class="form-group col-md-6">
                                                                <label for="">Staff</label>
                                                                <input type="text" value="{{ $staff->full_name }}"
                                                                    readonly class="form-control">
                                                                <input type="hidden" name="user_id"
                                                                    value="{{ $staff->id }}">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">

                                                            <select class="form-control" name="class_room_id"
                                                                id="">
                                                                <option value=""> --Select Class-- </option>
                                                                @foreach ($classes as $class)
                                                                    <option value="{{ $class->id }}" {{$class->id == $assigned->class_room_id ? 'selected' : ''}}>
                                                                        {{ $class->name }} </option>
                                                                @endforeach
                                                            </select>

                                                        </div>
                                                        <div class="form-group">

                                                            <select class="form-control" name="subject_id"
                                                                id="">
                                                                <option value=""> --Select Subject-- </option>
                                                                @foreach ($subjects as $subject)
                                                                    <option value="{{ $subject->id }}" {{$subject->id == $assigned->subject_id ? 'selected' : ''}}>
                                                                        {{ $subject->name }} </option>
                                                                @endforeach
                                                            </select>

                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-success">Update</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                    <!--End edit Modal -->

                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">
                                            <em class="text-warning">You have not assigned any class or subject</em>
                                        </td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
