<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\USER;
use App\ADMIN;
use Illuminate\Http\Response;
use App\Exceptions\Handler;
use Auth;
use Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/resiko';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username () {
        return 'username';
    }
	
	public function check($skey){
		Auth::logout();
        Session::flush();
		$i=strpos($skey, 'lll');
        $nip=substr($skey, 0, $i);
		$admin = ADMIN::where('username', $nip)->get();
		if($admin->count()==1){
			return redirect()->route('adminlogon', ['skey' => $skey]);
		}
		else{
			$user = USER::where('username', $nip)->get();
			if($user->count()==1){
				return redirect()->route('userlogon', ['skey' => $skey]);
			}
			else{
				echo "<h1>ERROR 403</h1><strong>You dont have access to this page.</strong>";
			}
		}
	}
}
