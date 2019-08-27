<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Models\masuk;
use App\Models\surat;
use Illuminate\Support\Facades\Auth;
use App\User;
use Sentinel;

class MasukController extends Controller
{
    public function index(){
        $surat_masuk = masuk::all();
        return view('backend.masuk.index',compact('surat_masuk'));
    }

    public function create(){
        $user = User::pluck('nama','id');
        return view('backend.masuk.create',compact('user'));
    }

    public function show($id)
    {
        $masuk = masuk::where('surat_id',$id)->first();
      
        $user = user::whereRaw("id not in (select user_id from disposisis where surat_id = $id)")->pluck('nama','id');
        return view('backend.masuk.show',compact('masuk', 'user'));
    }

    public function store(Request $request){

        $surat = new surat;
        $data = $request->all();
    

        $request->validate([
          'nomor' => 'required|unique:surats,nomor',
          'tanggal_surat' => 'required',
          'perihal' => 'required',
         // 'lampiran' => 'required',
          'file' => 'mimes:pdf',
          'pengirim' => 'required',
        ]);

        try {
          //simpan file surat mulai
          $path = 'surat-masuk';
          $oldfile = $surat->file;
          if ($request->hasFile('file') && $request->file->isValid()) {
              $fileext = $request->file->extension();
              $filename = uniqid('surat-masuk-'.$request->nomor.'-').'.'.$fileext;
              //Real File
              $filepath = $request->file('file')->storeAs($path, $filename, 'local');
              //Avatar File
              $realpath = storage_path('app/'.$filepath);
              $data['file'] = $filename;
          }
          //simpan file surat selesai

          $surat = surat::create($data);
        
          if($surat->id){
            $user = User::find(Sentinel::getuser()->id);
            try {
                $masuk = new masuk();
                $masuk->surat_id = $surat->id;  
                $masuk->user_id = $user->id;
                $masuk->pengirim = $user->nama;
                $masuk->save();
                toast()->success('Berhasil Menyimpan Data Surat Masuk', 'Berhasil');
                return redirect()->route('surat-masuk.index');          
            } catch (\Exception $e) {
                toast()->error($e, 'Eror');
                toast()->error('Terjadi Eror Saat Menyimpan Data', 'Gagal');
                return redirect()->back();
            }   
          }
        } catch (\Exception $e) {
          toast()->error($e, 'Eror');
          toast()->error('Terjadi Eror Saat Menyimpan Data', 'Gagal');
          return redirect()->back();
        }
    }

    public function edit($id){
      $user = User::pluck('nama','id');
      $surat_masuk = masuk::select('*')->join('surats','masuks.surat_id','=','surats.id')->where('masuks.id',$id)->first();
      return view('backend.masuk.edit',compact('surat_masuk','user'));
    }

    public function update($id,Request $request){
      
      $request->validate([
        'nomor' => 'required',
        'tanggal_surat' => 'required',
        'perihal' => 'required',
        'file' => 'mimes:pdf',
        'pengirim' => 'required',
      ]);

      try {
        $masuk = masuk::find($id);
        $surat = surat::find($masuk->surat_id);
        $data = $request->all();

        //simpan file surat mulai
        $path = 'surat-masuk';
        $oldfile = $surat->file;
        $filename = null;
        if ($request->hasFile('file') && $request->file->isValid()) {
            $fileext = $request->file->extension();
            $filename = uniqid('surat-masuk-'.$request->nomor.'-').'.'.$fileext;
            //Real File
            $filepath = $request->file('file')->storeAs($path, $filename, 'local');
            //Avatar File
            $realpath = storage_path('app/'.$filepath);
            $data['file'] = $filename;
        }
        //simpan file surat selesai

        $surat->update($data);
        $masuk->update($data);

        if ($request->hasFile('file') && $request->file->isValid()) {
          if ($filename != $oldfile) {
            //kalau file yang lama dan yang baru namanya tidak sama, maka akan melakukan
              File::delete(storage_path('app'.'/'. $path . '/' . $oldfile));
            }
        }

        toast()->success('Berhasil Merubah Data Surat Masuk', 'Berhasil');
        return redirect()->route('surat-masuk.index');
    } catch (\Exception $e) {
        toast()->error($e, 'Eror');
        toast()->error('Terjadi Eror Saat Merubah Data', 'Gagal');
        return redirect()->back();
    }
    }

    public function destroy($id)
    {
        try {
          $masuk = masuk::find($id);
          $path = 'surat-masuk';
          $surat = surat::find($masuk->surat_id);
          File::delete(storage_path('app'.'/'. $path . '/' . $surat->file));
          $surat->delete();
          toast()->success('Berhasil Menghapus Data Surat Masuk', 'Berhasil');
          return redirect()->back();
        } catch (\Exception $e) {
          toast()->error($e, 'Eror');
          toast()->error('Terjadi Eror Saat Menghapus Data', 'Gagal');
          return redirect()->back();
        }
    }

}
