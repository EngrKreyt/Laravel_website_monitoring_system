<?php

namespace App\Http\Controllers\Admin;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //

    public function registered()
    {
      $users = User::all();
      return view('admin.register')->with('users',$users);
    }
    public function registeredit(Request $request, $id)
    {
      $users = User::findOrFail($id);
      return view('admin.register-edit')->with('users',$users);
    }
    public function registerupdate(Request $request, $id)
    {
      $request->validate([
        'username' => 'required|regex:/^[\pL\s\-]+$/u',

      ]);

      $users = User::find($id);
      $users->firstname = $request->input('username');
      $users->lastname = $request->input('lastname');
      $users->usertype = $request->input('usertype');
      $users->update();
      return redirect('/role-register')->with('status','Data is Updated');
    }
    public function registerdelete($id)
    {
      $users = User::findOrFail($id);
      $users->delete();

      return redirect('/role-register')->with('status','Data is Deleted');

    }
}
