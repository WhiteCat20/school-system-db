@extends('template.layout')

@section('content')
    <div class="container-fluid">
        <h1>Student</h1>
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
                                <th>Student Number</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Email</th>
                                <th>Phone Number</th>
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
                            @foreach ($students as $item)
                                <tr>
                                    <td>{{ $item->student_number }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->address }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phone_number }}</td>
                                    <td>{{ $item->class->class_name }}</td>
                                    <td>
                                        <a href="/student/{{ $item->id }}/edit" class="btn btn-warning">Edit</a>
                                        <form action="/student/{{ $item->id }}" method="POST" class="d-inline">
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
                    <a href="/student/create" class="btn btn-primary">Create</a>
                </div>
            </div>
        </div>

    </div>
@endsection
