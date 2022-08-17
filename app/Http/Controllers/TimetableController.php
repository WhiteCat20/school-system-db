<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\SchoolClass;
use App\Models\Teacher;
use App\Models\Timetable;
use Illuminate\Http\Request;

class TimetableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //tampilkan halaman timetable dan tampilkan data-data
        return view('timetable.timetable', [
            'timetable' => Timetable::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //tampilkan halaman create timetable
        return view('timetable.create-timetable', [
            'teachers' => Teacher::all(),
            'classes' => SchoolClass::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'day' => ['required'],
            'session' => ['required'],
            'teacher_id' => ['required'],
            'school_class_id' => ['required']
        ]); 
        Timetable::create($validatedData);
        return redirect('/timetable')->with('success', 'New Timetable has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Timetable  $timetable
     * @return \Illuminate\Http\Response
     */
    public function show(Timetable $timetable)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Timetable  $timetable
     * @return \Illuminate\Http\Response
     */
    public function edit(Timetable $timetable)
    {
        //show form edit
        return view('timetable.edit-timetable', [
            'timetable' => $timetable,
            'teachers' => Teacher::all(),
            'classes' => SchoolClass::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Timetable  $timetable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Timetable $timetable)
    {
        //ubah data di database
        $validatedData = $request->validate([
            'day' => ['required'],
            'session' => ['required'],
            'teacher_id' => ['required'],
            'school_class_id' => ['required']
        ]);
        Timetable::where('id', $timetable->id)->update($validatedData);
        return redirect('/timetable')->with('success', 'The timetable has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Timetable  $timetable
     * @return \Illuminate\Http\Response
     */
    public function destroy(Timetable $timetable)
    {
        //hapus data dari tabel
        Timetable::destroy($timetable->id);
        return redirect('/timetable')->with('success', 'The timetable has been deleted!');
    }
}
