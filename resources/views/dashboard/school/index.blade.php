@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">School</h4>
                    @if (!$school)
                        <a href="{{ route('dashboard.school.create') }}" class="btn btn-sm btn-primary">create school profile</a>
                    @endif
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($school)
                                    <tr>
                                        <td>{{ $school->name }} </td>
                                        <td>{{ $school->address }}</td>
                                        <td>
                                            @if (superadmin())
                                            <a href="{{ route('dashboard.school.edit', $school->id) }}" class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a>
                                            @endif
                                        </td>
                                    </tr>
                                @else
                                    <tr>
                                        <td colspan="100%">no data available</td>
                                    </tr>
                                @endif
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