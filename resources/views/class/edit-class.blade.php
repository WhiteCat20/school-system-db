@extends('template.layout')
@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Edit Class</h1>
        <p class="mb-4">Lorem ipsum dolor, sit amet consectetur adipisicing elit. At soluta quasi dolores obcaecati
            repellendus, nihil facilis voluptatibus molestiae quisquam cupiditate.</p>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Class</h6>
            </div>
            <div class="card-body">
                <form action="/class/{{ $class->id }}" method="POST">
                    @method('put')
                    @csrf
                    <div class="mb-3">
                        <label for="class_name" class="form-label">Class Name</label>
                        <input type="text" class="@error('class_name') is-invalid @enderror form-control"
                            id="class_name" name="class_name" value="{{ $class->class_name }}">
                        @error('class_name')
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
