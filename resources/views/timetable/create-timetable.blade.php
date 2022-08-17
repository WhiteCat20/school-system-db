@extends('template.layout')
@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Create Timetable</h1>
        <p class="mb-4">Lorem ipsum dolor, sit amet consectetur adipisicing elit. At soluta quasi dolores obcaecati
            repellendus, nihil facilis voluptatibus molestiae quisquam cupiditate.</p>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Add Timetable</h6>
            </div>
            <div class="card-body">
                <form action="/timetable" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="day" class="form-label">Day</label>
                        <select name="day" id="day" class="form-control">
                            <option value="Senin">Senin</option>
                            <option value="Selasa">Selasa</option>
                            <option value="Rabu">Rabu</option>
                            <option value="Kamis">Kamis</option>
                            <option value="Jumat">Jumat</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="session" class="form-label">Session</label>
                        <select name="session" id="session" class="form-control">
                            <option value="1, 07.00 - 08.00">1, 07.00 - 08.00</option>
                            <option value="2, 08.00 - 09.00">2, 08.00 - 09.00</option>
                            <option value="3, 09.00 - 10.00">3, 09.00 - 10.00</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="teacher_id" class="form-label">Teacher</label>
                        <select name="teacher_id" id="teacher_id" class="form-control form-select">
                            @foreach ($teachers as $item)
                                <option value="{{ $item->id }}">{{ $item->name }} - {{ $item->course->course_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="school_class_id" class="form-label">Class</label>
                        <select name="school_class_id" id="school_class_id" class="form-control form-select">
                            @foreach ($classes as $item)
                                @if (old('course_id') == $item->id)
                                    <option value="{{ $item->id }} selected">{{ $item->class_name }}</option>
                                @else
                                    <option value="{{ $item->id }}">{{ $item->class_name }}</option>
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
