<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('teacher.teacher', [
            'teachers' => Teacher::all()    
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teacher.create-teacher', [
            //mengambil data dari tabel course
            'courses' => Course::all()
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
        //validasi data untuk di input ke tabel teachers
        $validatedData = $request->validate([
            'teacher_number'=> ['required'],
            'name' => ['required'],
            'address' => ['required'],
            'email' => ['required', 'unique:teachers'],
            'phone_number' => ['required'],
            'course_id' => ['required']
        ]);
        //kirimkan ke tabel teachers
        Teacher::create($validatedData);
        //arahkan ke halaman teacher.blade.php
        return redirect('/teacher')->with('success', 'New Teacher Has Been Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        return view('teacher.edit-teacher', [
            'courses' => Course::all(),
            'teacher' => $teacher
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher)
    {
        $rules = [
            'teacher_number'=> ['required'],
            'name' => ['required'],
            'address' => ['required'],
            'phone_number' => ['required'],
            'course_id' => ['required']
        ];
        //eksekusi hanya berjalan jika request email berbeda dengan email di database
        if($request->email != $teacher->email){
            $rules['email'] = ['required', 'unique:teachers'];
        }
        $validatedData = $request->validate($rules);
        Teacher::where('id', $teacher->id)->update($validatedData);
        return redirect('/teacher')->with('success', 'Teacher has been edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        //
        Teacher::destroy($teacher->id);
        return redirect('/teacher')->with('success', 'The Teacher has been deleted!');
    }
}
