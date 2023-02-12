@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Assigned Subjects</h4>
                    <a href="{{route('dashboard.staff.index')}}" class="btn btn-sm btn-primary">View staffs</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>name</th>
                                    <th>Class</th>
                                    <th>Subject</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php @endphp
                                @forelse ($assigned as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{$item->staff->full_name}}</td>
                                        <td>{{ $item->classRoom->name }}</td>
                                        <td>{{ $item->subject->name }}</td>
                                        <td>
                                            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                                    data-target="#editModal{{ $item->id }}"><i
                                                        class="fa fa-edit"></i></button>
                                        </td>
                                        
                                        {{-- <form action="{{ route('dashboard.grades.delete', $grade->id) }}" method="post" id="delete-grade-{{ $grade->id }}">
                                            @method('DELETE')
                                            @csrf
                                        </form> --}}

                                    <!-- edit Modal -->
                                    <form action="{{route('dashboard.staffs.updateAssigned', [$item->id])}}" method="post">
                                        @method('PATCH')
                                        @csrf
                                        <div class="modal fade" id="editModal{{ $item->id }}">
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
                                                                <input type="text" value="{{ $item->staff->full_name }}"
                                                                    readonly class="form-control">
                                                                <input type="hidden" name="staff_id"
                                                                    value="{{ $item->staff->id }}">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">

                                                            <select class="form-control" name="class_room_id"
                                                                id="">
                                                                <option value=""> --Select Class-- </option>
                                                                @foreach ($classes as $class)
                                                                    <option value="{{ $class->id }}" {{$class->id == $item->class_room_id ? 'selected' : ''}}>
                                                                        {{ $class->name }} </option>
                                                                @endforeach
                                                            </select>

                                                        </div>
                                                        <div class="form-group">

                                                            <select class="form-control" name="subject_id"
                                                                id="">
                                                                <option value=""> --Select Subject-- </option>
                                                                @foreach ($subjects as $subject)
                                                                    <option value="{{ $subject->id }}" {{$subject->id == $item->subject_id ? 'selected' : ''}}>
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

                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4"> You have not assigned any subject or class </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div>
                        {{$assigned->links() }}
                    </div>

                </div>
                <div class="card-footer">

                </div>
            </div>
            <!-- /# card -->
        </div>
    </div>
@endsection
