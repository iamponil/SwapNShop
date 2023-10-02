<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginBasic extends Controller
{
  
  public function index()
  {
    return view('content.authentications.auth-login-basic');
  }
  public function login(Request $request)
  {

    $credentials = $request->only('email', 'password');
if (Auth::attempt($credentials)) {
    return redirect()->intended('/conversations');
}

return back()->withErrors(['email' => 'Invalid email or password.']);
  }
}
