<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use App\User;

class qrcodeController extends Controller
{
    public function my()
    {
        $user = Sentinel::getUser();
        return view('backend.user.qrcode',compact('user'));
    }

    public function getlogin()
    {
        if(Sentinel::check()){
          return redirect()->back();
        }else{
          return view('auth.scanlogin');
        }
    }

    public function postlogin(Request $request)
    {
      $result =0;
        if ($request->data) {
            $users = User::where('QRpassword',$request->data)->first();
            if($users){
              $user = Sentinel::authenticate($users);
              $result = 1;
            }else{
              $result = 0;
            }
      }
      return $result;
    }
}
