<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        if (auth()->user()->hasrole('admin')) {
            return view ('dashboard');
        } 

        return view('dashboard2');
    }
}
