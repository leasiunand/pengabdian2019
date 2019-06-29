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
        
        return view('backend.masuk.create',compact('user'));
    }

    public function store(Request $request){

        $surat = new surat;
        $data = $request->all();
    

        $request->validate([
          'nomor' => 'required|unique:surats,nomor',
          'tanggal_surat' => 'required',
          'perihal' => 'required',
          'lampiran' => 'required',
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
                // $masuk = masuk::create(['surat_id'=> $surat->id,
                //           'user_id' => $user->id,
                //           'pengirim' => $data->pengirim,
                //           ]);

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
}
