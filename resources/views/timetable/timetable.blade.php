@extends('template.layout')

@section('content')
    <div class="container-fluid">
        <h1>Timetable</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Day</th>
                                <th>Session</th>
                                <th>Teacher</th>
                                <th>Class</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        {{-- <tfoot>
                            <tr>
                                <th>Teacher Number</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Course</th>
                            </tr>
                        </tfoot> --}}
                        <tbody>
                            @foreach ($timetable as $item)
                                <tr>
                                    <td>{{ $item->day }}</td>
                                    <td>{{ $item->session }}</td>
                                    <td>{{ $item->teacher->name }}</td>
                                    <td>{{ $item->class->class_name }}</td>
                                    <td>
                                        <a href="/timetable/{{ $item->id }}/edit" class="btn btn-warning">Edit</a>
                                        <form action="/timetable/{{ $item->id }}" method="POST" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger"
                                                onclick="return confirm('Are You Sure Deleting {{ $item->name }}?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a href="/timetable/create" class="btn btn-primary">Create</a>
                </div>
            </div>
        </div>

    </div>
@endsection
