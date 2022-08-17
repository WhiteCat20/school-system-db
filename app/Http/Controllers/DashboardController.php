<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $name = 'faiz';
        return view('main', [
            'name' => $name
        ]);
    }
}
