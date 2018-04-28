<?php

namespace App\Http\Controllers;

use App\User;
use App\Admin;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dashboard.index');
    }



    public function users()
    {   
        $users = Admin::getAllUsers();
        return view('admin.users.index', compact('users'));
    }
}
