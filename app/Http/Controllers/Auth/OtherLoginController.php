<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class OtherLoginController extends Controller
{

    public function __construct()
    {
      $this->middleware('guest:other');
    }

    public function login(Request $request){
      hahahahah
      if (Auth::guard('other')->attempt(['username' => $request->username], $request->remember)) {
        return redirect()->intended(route('admin.dashboard'));
      }
      return redirect()->back()->withInput($request->only('email', 'remember'));
    }
}
