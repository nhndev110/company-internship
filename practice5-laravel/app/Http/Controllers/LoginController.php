<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
  public function index()
  {
    if (Auth::check()) {
      return redirect()->route('home.index');
    }
    return view('pages.login');
  }

  /**
   * Handle an authentication attempt.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function authenticate(Request $request)
  {
    $credentials = $request->validate([
      'username' => 'required|string',
      'password' => 'required|string'
    ]);

    if (Auth::attempt($credentials)) {
      $request->session()->regenerate();

      if (Auth::user()->role_id === 1) {
        return redirect()->route('admin.dashboard.index');
      }

      return redirect()->intended('/');
    }

    return back()->with([
      'error' => 'Your account and/or password is incorrect, please try again'
    ])->onlyInput('username');
  }
}
