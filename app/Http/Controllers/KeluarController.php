<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Models\keluar;
use App\Models\surat;

class KeluarController extends Controller
{
    public function index(Request $request)
    {
        $surat_keluars = keluar::all();
        return view('backend.keluar.index',compact('surat_keluars'));
    }

    public function create()
    {
        return view('backend.keluar.create');
    }

    public function show($id)
    {
        $keluar = keluar::find($id);
        return view('backend.keluar.show',compact('keluar'));
    }

    public function store(Request $request)
    {

        $surat = new surat;
        $data = $request->all();

        $request->validate([
          'nomor' => 'required|unique:surats,nomor',
          'tanggal_surat' => 'required',
          'perihal' => 'required',
          'lampiran' => 'required',
          'file' => 'mimes:pdf',
          'penerima' => 'required',
        ]);

        try {
          //simpan file surat mulai
          $path = 'surat-keluar';
          $oldfile = $surat->file;
          if ($request->hasFile('file') && $request->file->isValid()) {
              $fileext = $request->file->extension();
              $filename = uniqid('surat-keluar-'.$request->nomor.'-').'.'.$fileext;
              //Real File
              $filepath = $request->file('file')->storeAs($path, $filename, 'local');
              //Avatar File
              $realpath = storage_path('app/'.$filepath);
              $data['file'] = $filename;
          }
          //simpan file surat selesai

          $surat = surat::create($data);
          if($surat->id){
            $data['surat_id'] = $surat->id;
            $keluar = keluar::create($data);
          }

          toast()->success('Berhasil Menyimpan Data Surat Keluar', 'Berhasil');
          return redirect()->route('surat-keluar.index');
        } catch (\Exception $e) {
          toast()->error($e, 'Eror');
          toast()->error('Terjadi Eror Saat Menyimpan Data', 'Gagal');
          return redirect()->back();
        }
    }

    public function edit($id)
    {
        $surat_keluar = keluar::select('*')->join('surats','keluars.surat_id','=','surats.id')->where('keluars.id',$id)->first();
        return view('backend.keluar.edit',compact('surat_keluar'));
    }

    public function update($id, Request $request)
    {
        $request->validate([
          'nomor' => 'required|unique:surats,nomor',
          'tanggal_surat' => 'required',
          'perihal' => 'required',
          'lampiran' => 'required',
          'file' => 'mimes:pdf',
          'penerima' => 'required',
        ]);

        try {
            $keluar = keluar::find($id);
            $surat = surat::find($keluar->surat_id);
            $data = $request->all();

            //simpan file surat mulai
            $path = 'surat-keluar';
            $oldfile = $surat->file;
            $filename = null;
            if ($request->hasFile('file') && $request->file->isValid()) {
                $fileext = $request->file->extension();
                $filename = uniqid('surat-keluar-'.$request->nomor.'-').'.'.$fileext;
                //Real File
                $filepath = $request->file('file')->storeAs($path, $filename, 'local');
                //Avatar File
                $realpath = storage_path('app/'.$filepath);
                $data['file'] = $filename;
            }
            //simpan file surat selesai

            $surat->update($data);
            $keluar->update($data);

            if ($request->hasFile('file') && $request->file->isValid()) {
              if ($filename != $oldfile) {
                //kalau file yang lama dan yang baru namanya tidak sama, maka akan melakukan
                  File::delete(storage_path('app'.'/'. $path . '/' . $oldfile));
                }
            }

            toast()->success('Berhasil Merubah Data Surat Keluar', 'Berhasil');
            return redirect()->route('surat-keluar.index');
        } catch (\Exception $e) {
            toast()->error($e, 'Eror');
            toast()->error('Terjadi Eror Saat Merubah Data', 'Gagal');
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        try {
          $keluar = keluar::find($id);
          $path = 'surat-keluar';
          $surat = surat::find($keluar->surat_id);
          File::delete(storage_path('app'.'/'. $path . '/' . $surat->file));
          $surat->delete();
          toast()->success('Berhasil Menghapus Data Surat Keluar', 'Berhasil');
          return redirect()->back();
        } catch (\Exception $e) {
          toast()->error($e, 'Eror');
          toast()->error('Terjadi Eror Saat Menghapus Data', 'Gagal');
          return redirect()->back();
        }

    }
}
