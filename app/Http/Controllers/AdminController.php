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

    public function edit($username)
    {
        $user = Admin::findUser($username);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $type = request('type');

        switch ($type) {
            case 1:
                return AdminController::updateDetails($request, $user);
                break;

            case 2:
                return AdminController::updatePassword($request, $user);
                break;
            
            default:
                return redirect()->route('admin.user.edit', $user->username);
                break;
        }

        
    }


    public static function updateDetails(Request $request, User $user)
    {
        $request->validate([
            'username' => 'required|alpha|min:6|unique:users',
        ]);
        $user->update($request->all());
        return redirect()->route('admin.user.edit', $user->username);
    }


    public static function updatePassword(Request $request, User $user)
    {
        $request->validate([
            'password' => 'required|alphanum|min:6|confirmed',
        ]);

        $user->update($request->all());
        session()->flash('success', 'Password successfully updates');
        return redirect()->route('admin.user.edit', $user->username);
    }


}
