<?php
namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
//session_start();
class OtherLoginController extends Controller
{

    public function __construct()
    {
      $this->middleware('guest:other');
    }

    public function login($skey){
      date_default_timezone_set("Asia/Jakarta");
	    $key = md5(date("Ymd").substr("123456789",6).date("hi"));
      if($skey==$key){
        if (Auth::guard('other')->attempt(['username' => "123456789"])) {
          return "success";
        }
      }
      else{
        echo "gaisok";
      }
      //return redirect()->back();
    }
}
