<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\lampiran;
use App\Models\surat;
use App\Models\keluar;
use App\Models\masuk;


class LampiranController extends Controller
{

    public function create(Request $request)
    {
        if($request->surat_id){
            $surat_id = $request->surat_id;
            $surat = surat::find($surat_id);
            if($surat){
              return view('backend.lampiran.create', compact('surat_id'));
            }
            toast()->warning('Surat Id Tidak di temukan', 'Warning');
        }
        toast()->error('Link Salah', 'Error');
        return redirect()->back();
    }

    public function store(Request $request)
    {
        $lampiran = new lampiran;
        $data = $request->all();


        $request->validate([
          'file' => 'mimes:pdf',
        ]);

        try {
          $path = 'lampirans';
          $oldfile = $lampiran->file;
          if ($request->hasFile('file') && $request->file->isValid()) {
              $fileext = $request->file->extension();
              $filename = uniqid('Lampiran-').'.'.$fileext;
              //Real File
              $filepath = $request->file('file')->storeAs($path, $filename, 'local');
              //Avatar File
              $realpath = storage_path('app/'.$filepath);
              $data['file'] = $filename;
          }
          $lampiran = lampiran::create($data);
          toast()->success('Berhasil Menyimpan Data Lampiran Surat', 'Berhasil');

          $keluar = keluar::where('surat_id',$lampiran->surat_id)->first();
          if($keluar){
            return redirect()->route('surat-keluar.show',$lampiran->surat_id);
          }else{
            return redirect()->route('surat-masuk.show',$lampiran->surat_id);
          }
        } catch (\Exception $e) {
          toast()->error($e->getMessage(), 'Eror');
          toast()->error('Terjadi Eror Saat Menyimpan Data', 'Gagal');
          return redirect()->back();
        }
    }

    public function edit($id)
    {
        $lampiran = lampiran::find($id);
        return view('backend.lampiran.edit',compact('lampiran'));
    }

    public function update($id, Request $request)
    {
        $lampiran = lampiran::find($id);
        $data = $request->all();
        $request->validate([
          'file' => 'mimes:pdf',
        ]);

        try {
          $path = 'lampirans';
          $oldfile = $lampiran->file;
          if ($request->hasFile('file') && $request->file->isValid()) {
              $fileext = $request->file->extension();
              $filename = uniqid('Lampiran-').'.'.$fileext;
              //Real File
              $filepath = $request->file('file')->storeAs($path, $filename, 'local');
              //Avatar File
              $realpath = storage_path('app/'.$filepath);
              $data['file'] = $filename;
              if ($filename != $oldfile) {
              //kalau file yang lama dan yang baru namanya tidak sama, maka akan melakukan
                File::delete(storage_path('app'.'/'. $path . '/' . $oldfile));
              }
          }
          $surat_id = $lampiran->surat_id;
          $lampiran = $lampiran->update($data);
          $keluar = keluar::where('surat_id',$surat_id)->first();
          toast()->success('Berhasil Merubah Data Lampiran Surat', 'Berhasil');

          if($keluar){
            return redirect()->route('surat-keluar.show',$surat_id);
          }else{
            return redirect()->route('surat-masuk.show',$surat_id);
          }
        } catch (\Exception $e) {
          toast()->error($e->getMessage(), 'Eror');
          toast()->error('Terjadi Eror Saat Merubah Data', 'Gagal');
          return redirect()->back();
        }
    }

    public function destroy($id)
    {
      try {
        $lampiran = lampiran::find($id);
        $path = 'lampirans';
        File::delete(storage_path('app'.'/'. $path . '/' . $lampiran->file));
        $lampiran->delete();
        toast()->success('Berhasil Menghapus Data Lampiran Surat', 'Berhasil');
        return redirect()->back();
      } catch (\Exception $e) {
        // dd($e);
        toast()->error($e->getMessage(), 'Eror');
        toast()->error('Terjadi Eror Saat Menghapus Data Lampiran Surat', 'Gagal');
        return redirect()->back();
      }
    }
}
