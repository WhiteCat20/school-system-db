@extends('template.layout')

@section('content')
    <div class="container-fluid">
        <h1>Course</h1>
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
                                <th>Course Name</th>
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
                            @foreach ($courses as $item)
                                <tr>
                                    <td>{{ $item->course_name }}</td>
                                    <td>
                                        <a href="/course/{{ $item->id }}/edit" class="btn btn-warning">Edit</a>
                                        <form action="/course/{{ $item->id }}" method="POST" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger"
                                                onclick="return confirm('Are You Sure Deleting {{ $item->course_name }}?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a href="/course/create" class="btn btn-primary">Create</a>
                </div>
            </div>
        </div>

    </div>
@endsection
