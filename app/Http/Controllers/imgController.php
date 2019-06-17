<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
