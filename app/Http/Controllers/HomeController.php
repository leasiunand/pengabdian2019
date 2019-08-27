<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\masuk;
use App\Models\keluar;
use App\Models\surat;


class HomeController extends Controller
{

    public function index()
    {
        return view('home');
    }

    public function dashboard($value='')
    {
   		$masuk = masuk::all()->count();
   		$keluar = keluar::all()->count();

   		$surat = surat::all();
      return view('dashboard',compact('masuk','keluar','surat'));
    }

}
