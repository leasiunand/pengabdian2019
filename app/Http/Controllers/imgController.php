<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class imgController extends Controller
{
    public function image($type, $file_id, Request $request)
    {
      $lokasi = null;
        if ($type == 'profile-pict') {
            $lokasi = 'img/avatars';
        }

      return response()->file(
          storage_path('app/'.$lokasi.'/'.$file_id)
      );
    }

    public function dokumen($tipe, $id)
    {
        $lokasi = null;

        if($tipe=='keluar'){
          $path = 'surat-keluar';
        }

        $lokasi = $path . '/' . $id;
        $dir = storage_path('app/' . $lokasi);

        if (!File::exists($dir)) {
            toast()->error('Terjadi Eror Saat Mendownload File', 'Gagal');
            return redirect()->back();
        }

        return response()->file($dir);
    }
}
