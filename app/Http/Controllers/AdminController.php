<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function getAllUsers()
    {
        $allUsers = User::get();
        return view('admin.allusers')->with(compact('allUsers'));
    }

}
