<?php

namespace App\Http\Controllers;

use App\Models\SchoolClass;
use Illuminate\Http\Request;

class SchoolClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('class.class', [
            'classes' => SchoolClass::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('class.create-class');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validasi data
        $validatedData = $request->validate([
            'class_name' => ['required', 'unique:school_classes']
        ]);
        SchoolClass::create($validatedData);
        return redirect('/class')->with('success', 'New Class has been added!'); 

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SchoolClass  $schoolClass
     * @return \Illuminate\Http\Response
     */
    public function show(SchoolClass $schoolClass)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SchoolClass  $schoolClass
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        //findOrFail
        $class = SchoolClass::findOrFail($id);
        return view('class.edit-class', [
            'class' => $class
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SchoolClass  $schoolClass
     * @return \Illuminate\Http\Response
     */

     
    public function update(Request $request, SchoolClass $schoolClass, $id)
    {
        //
        $schoolClass = SchoolClass::findOrFail($id); //edit berdasarkan id
        $schoolClass->class_name = $request->get('class_name');

        $schoolClass->save();
        return redirect('/class')->with('success', 'The Class has been Updated!'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SchoolClass  $schoolClass
     * @return \Illuminate\Http\Response
     */
    public function destroy(SchoolClass $schoolClass, $id)
    {
        //hapus 
        $schoolClass =  SchoolClass::destroy($id);
        return redirect('class')->with('success', 'The Class has been deleted!'); 
    }
}
