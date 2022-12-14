<?php

namespace App\Http\Controllers;

use App\Models\SchoolClass;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //show the page
    public function index()
    {
        return view('login-register.register', [
            'class' => SchoolClass::all(),
        ]);
    }

    //store new user on registration page
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required'],
            'number_id' => ['required', 'unique:users'],
            'school_class' => ['max:255'],
            'image' => ['image', 'file', 'max:4096'],
            'role' => ['required'],
            'password' => ['required'],
        ]);

        if (preg_match('/T/i', $validatedData['number_id'])) {
            $validatedData['role'] = 'Teacher';
            // printf('Teacher');
        }
        $img_path = 'img/undraw_profile.svg';
        if ($request->hasFile('image')) {
            $image = $request->image;
            $image_name = time() . $image->getClientOriginalName();

            $image->move('upload/profile-pic/', $image_name);
            $img_path = 'upload/profile-pic/' . $image_name;
        }

        $validatedData['image'] = $img_path;

        //enkripsi password
        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);
        return redirect('/login');
    }
}
