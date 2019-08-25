<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\disposisi;
use App\Models\surat;
use App\Models\keluar;
use App\User;


class DisposisiController extends Controller
{
   public function create(Request $request)
    {
        if($request->surat_id){
            $user = User::pluck('nama','id');
            $surat_id = $request->surat_id;
            $surat = surat::find($surat_id);
            if($surat){
              return view('backend.disposisi.create', compact('surat_id','user'));
            }
            toast()->warning('Surat Id Tidak di temukan', 'Warning');
        }
        toast()->error('Link Salah', 'Error');
        return redirect()->back();
    }

    public function store(Request $request)
    {
        $data = $request->all();
        
        try {
          $disposisi = new disposisi;
         disposisi::create($data);

          $keluar = keluar::where('surat_id',$disposisi->surat_id)->first();
          if($keluar){
            return redirect()->route('surat-keluar.show',$request->surat_id);
          }else{
            return redirect()->route('surat-masuk.show',$request->surat_id);
          }


        } catch (\Exception $e) {
          toast()->error($e->getMessage(), 'Error');
          toast()->error('Gagal Menyimpan Data Disposisi Surat', 'Error');
          return redirect()->back();
        }
        
        
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
