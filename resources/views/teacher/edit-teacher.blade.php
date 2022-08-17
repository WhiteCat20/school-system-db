@extends('template.layout')
@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Edit Teacher</h1>
        <p class="mb-4">Lorem ipsum dolor, sit amet consectetur adipisicing elit. At soluta quasi dolores obcaecati
            repellendus, nihil facilis voluptatibus molestiae quisquam cupiditate.</p>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Teacher</h6>
            </div>
            <div class="card-body">
                <form action="/teacher/{{ $teacher->id }}" method="POST">
                    @method('put')
                    @csrf
                    <div class="mb-3">
                        <label for="teacher_number" class="form-label">Teacher Number</label>
                        <input type="text" class="@error('teacher_number') is-invalid @enderror form-control"
                            id="teacher_number" name="teacher_number" value="{{ old('teacher_number', $teacher->teacher_number) }}">
                        @error('teacher_number')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="@error('name') is-invalid @enderror form-control" id="name"
                            name="name" value="{{ old('name', $teacher->name) }}">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="@error('address') is-invalid @enderror form-control" id="address"
                            name="address" value="{{ old('address', $teacher->address) }}">
                        @error('address')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="@error('email') is-invalid @enderror form-control" id="email"
                            name="email" value="{{ old('email', $teacher->email) }}">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="phone_number" class="form-label">Phone Number</label>
                        <input type="text" class="@error('phone_number') is-invalid @enderror form-control"
                            id="phone_number" name="phone_number" value="{{ old('phone_number', $teacher->phone_number) }}">
                        @error('phone_number')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="course_id" class="form-label">Course</label>
                        <select name="course_id" id="course_id" class="form-control form-select">
                            @foreach ($courses as $item)
                                @if (old('course_id', $teacher->course_id) == $item->id)
                                    <option value="{{ $item->id }} ">{{ $item->course_name }}</option>
                                @else
                                    <option value="{{ $item->id }}">{{ $item->course_name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <button class="btn btn-danger" type="submit" name="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
