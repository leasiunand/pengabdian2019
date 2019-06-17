<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use Sentinel;

class ProfilController extends Controller
{
    public function index()
    {
      return view('backend.profile.index');
    }

    public function gantpass()
    {
      try {
          $profile = user::find(Sentinel::getuser()->id);
          return view('backend.profile.password',compact('profile'));
      } catch (\Exception $e) {
          toast()->error($e, 'Eror');
          toast()->error('Terjadi Eror Saat Mengload Data, Silakan Ulang Login kembali', 'Gagal Load Data');
          return redirect()->back();
      }

    }

    public function savepass(Request $request)
    {
        $request->validate([
          'password_lama' => 'required',
          'password_baru' => 'required|min:6|same:confirm_password_baru',
        ]);

        try {
          $profile = user::find(Sentinel::getuser()->id);
          $user = ['username'=>$profile->username,'password'=>$request->password_lama];

          if(Sentinel::stateless($user)){
            $profile->password = bcrypt($request->password_baru);
            $profile->update();
            toast()->success('Berhasil Mengganti Password', 'Berhasil');
          }else{
            toast()->error('Password Lama Salah, Gagal Mengganti Password', 'Eror...!!');
          }
          return redirect()->back();

        } catch (\Exception $e) {

          toast()->error($e, 'Eror');
          toast()->error('Terjadi Eror Saat Mengload Data, Silakan Ulang Login kembali', 'Gagal Load Data');
          return redirect()->back();

        }
    }


}
