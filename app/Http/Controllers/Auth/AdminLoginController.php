<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{

    public function __construct()
    {
      $this->middleware('guest:admin');
    }

    public function showLoginForm(){
      return view('auth.admin-login');
    }

    public function login(Request $request){

      $this->validate($request, [
        'username' => 'required|max:20',
        'password' => 'required|min:6',
      ]);

      if (Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password], $request->remember)) {
        return redirect()->intended(route('admin.dashboard'));
      }
      return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function logon($skey){
        date_default_timezone_set("Asia/Jakarta");
        $i=strpos($skey, 'l');
        $nip=substr($skey, 0, $i);
  	    $key = $nip."l".md5(date("Ymd").substr($nip,6).date("hi"));
        if($skey==$key){
            if (Auth::guard('admin')->attempt(['username' => $nip, 'password' => '123456'])) {
                return redirect()->intended(route('admin.dashboard'));
            }
        }
        else{
            echo "fail";
        }
    }
}
