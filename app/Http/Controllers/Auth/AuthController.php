<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
  public function login()
  {
    if (Session::has('loginId')) {
      return redirect()->route('std.viewAll');
    }
    return view('pages.admin_form');
  }

  public function userLogin(Request $request)
  {
    $request->validate([
      'email' => 'required|email',
      'password' => 'required',
    ]);

    $authLogin = User::where('email', $request->email)->first();

    if ($authLogin && Hash::check($request->password, $authLogin->password)) {
      Auth::login($authLogin);
      Session::put('loginId', $authLogin->id);
      return redirect()->route('std.viewAll')->with('success', 'Login successful');
    } else {
      return back()->with('fail', 'Email or password is incorrect');
    }
  }

  public function register()
  {
    if (Session::has('loginId')) {
      return redirect()->route('std.viewAll');
    }
    return view('pages.admin_register');
  }

  public function userRegister(Request $request)
  {
    $request->validate([
      'name' => 'required',
      'email' => 'required',
      'password' => 'required',
    ]);

    $input['name'] = $request->name;
    $input['email'] = $request->email;
    $input['password'] = bcrypt($request->password);
    User::create($input);

    return redirect()->route('auth.login')->with('success', 'Registration successful');
  }

  public function userLogout()
  {
    Auth::logout(); // Properly log out the authenticated user

    if (Session::has('loginId')) {
      Session::pull('loginId');
    }

    Session::invalidate(); // Invalidate the session
    Session::regenerateToken(); // Regenerate CSRF token for security

    return redirect()->route('auth.login')->with('success', 'Logout successfully');
  }
}
