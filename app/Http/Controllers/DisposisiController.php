<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\disposisi;

class DisposisiController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();

        try {
          $disposisi = new disposisi;
          disposisi::create($data);
        } catch (\Exception $e) {
          toast()->error($e->getMessage(), 'Error');
          toast()->error('Gagal Menyimpan Data Disposisi Surat', 'Error');
        }
        return redirect()->back();

    }

    public function destroy($id)
    {
      try {
        $disposisi = disposisi::find($id);
        $disposisi->delete();
        toast()->success('Berhasil Menghapus Data Disposisi Surat', 'Berhasil');
      } catch (\Exception $e) {
        toast()->error($e->getMessage(), 'Error');
        toast()->error('Gagal Menghapus Data Disposisi Surat', 'Error');
      }
      return redirect()->back();
    }

}
