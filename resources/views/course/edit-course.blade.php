@extends('template.layout')
@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Edit Course</h1>
        <p class="mb-4">Lorem ipsum dolor, sit amet consectetur adipisicing elit. At soluta quasi dolores obcaecati
            repellendus, nihil facilis voluptatibus molestiae quisquam cupiditate.</p>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Coruse</h6>
            </div>
            <div class="card-body">
                <form action="/course/{{ $course->id }}" method="POST">
                    @method('put')
                    @csrf
                    <div class="mb-3">
                        <label for="course_name" class="form-label">Course Name</label>
                        <input type="text" class="@error('course_name') is-invalid @enderror form-control"
                            id="course_name" name="course_name" value="{{ $course->course_name }}">
                        @error('course_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button class="btn btn-danger" type="submit" name="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
