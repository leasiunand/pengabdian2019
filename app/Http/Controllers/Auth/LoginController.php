<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;

use Cartalyst\Sentinel\Checkpoints\NotActivatedException;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use Sentinel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Redirect;
use Carbon\Carbon;

class LoginController extends Controller
{
    use ThrottlesLogins;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected $redirectTo = 'dashboard';

    public function username()
    {
        return 'username';
    }

    public function showLoginForm()
    {
      //fungsi cek untuk mengetahui user sudah login atau belum
      if(Sentinel::check()){
        return redirect()->back();
      }else{
        return view('auth.login');
      }
    }

    protected function login(Request $request)
    {
          $request->validate([
              'login' => 'required',
              'password' => 'required',
          ]);

          try {

              $remember = (Input::get('remember') == 'on') ? true : false;
              if ($user = Sentinel::authenticate($request->all(),$remember))
              {
                 toast()->success('Selamat Datang '.Sentinel::Getuser()->nama, 'Berhasil');
                 return redirect('dashboard');
              }

              toast()->warning('Akun Anda Tidak Ditemukan, Silakan Cek Kembali.', 'Warning');
              return redirect()->back();

          }
          catch (NotActivatedException $e) {
              toast()->error('Akun Anda Belum Aktiv, Silakan Hubungi Admin Untuk Aktivasi Akun', 'Error');
              return redirect()->back();
          }
          catch (ThrottlingException $e) {
              $delay = $e->getDelay();
              toast()->error('IP Anda Untuk Sementara diblockir, dikarenakan Mencoba Masuk Ke Aplikasi Beberapa Kali', 'Error');
              toast()->error('Silakan Tunggu '.$delay.' detik lagi', 'Error');
              return redirect()->back();
              // return Redirect::back()->withErrors(['global' => 'You are temporary susspended' .' '. $delay .' seconds','activate_contact'=>1]);
          }
    }

    protected function logout()
    {
        Sentinel::logout();
        return redirect('/');
    }
}
