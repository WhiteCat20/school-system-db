<?php

namespace App\Http\Controllers;

use App\Models\SchoolClass;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('student.student', [
            'students' => Student::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //halaman create
        return view('student.create-student', [
            'classes' => SchoolClass::all()
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
        //masukan data baru ke database
        $validatedData = $request->validate([
            'student_number'=> ['required'],
            'name' => ['required'],
            'address' => ['required'],
            'email' => ['required', 'unique:students'],
            'phone_number' => ['required'],
            'school_class_id' => ['required']
        ]);
        //kirimkan data ke tabel students
        Student::create($validatedData);
        #arahkan ke halaman student.blade.php
        return redirect('/student')->with('success', 'New Student has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('student.edit-student', [
            'classes' => SchoolClass::all(),
            'student' => $student
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //update data yang ada di tabel students
        //validasi
        $rules = [
            'student_number' => ['required'],
            'name' => ['required'],
            'address' => ['required'],
            'phone_number' => ['required'],
            'school_class_id' => ['required']
        ];
        if ($request->email != $student->email){
            $rules['email'] = ['required', 'unique:students'];
        }
        //rules sudah dideklarasikan, validasi dalam variabel 
        $validatedData = $request->validate($rules);
        //Ganti data di database
        Student::where('id', $student->id)->update($validatedData);
        return redirect('/student')->with('success', 'The Student has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //hapus data pada tabel di database
        Student::destroy($student->id);
        return redirect('/student')->with('success', 'The Student has been deleted!');
    }
}
