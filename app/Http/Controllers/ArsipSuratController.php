<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\arsip_surat;
use App\models\surat;

class ArsipSuratController extends Controller
{
    public function create(Request $request)
    {
        if($request->arsip_id){
          $arsip_id = $request->arsip_id;
          $surat = surat::whereRaw("id not in (select surat_id from arsip_surats where arsip_id = $arsip_id)")->get()->pluck('nomor','id');
          return view('backend.arsip-surat.create',compact('arsip_id','surat'));
        }
        toast()->error('Kode Arsip Tidak Ditemukan', 'Gagal');
        return redirect()->back();
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $request->validate([
          'arsip_id' => 'required',
          'surat_id' => 'required',
          'tanggal' => 'required'
        ]);

        try {
          $arsip_surat = new arsip_surat;
          $arsip_surat = arsip_surat::create($data);
          toast()->success('Terjadi Eror Saat Menyimpan Data', 'Berhasil');
          return redirect()->route('arsip.show',$arsip_surat->arsip_id);
        } catch (\Exception $e) {
          toast()->error($e->getMessage(), 'Gagal');
          toast()->error('Terjadi Eror Saat Menyimpan Data', 'Gagal');
        }
        return redirect()->back();
    }

    public function edit($id)
    {
        $arsip_surat = arsip_surat::find($id);
        $arsip_id = $arsip_surat->arsip_id;
        $surat_id = $arsip_surat->surat_id;
        $surat = surat::whereRaw("id not in (select surat_id from arsip_surats where arsip_id = $arsip_id) or id = $surat_id")->get()->pluck('nomor','id');
        return view('backend.arsip-surat.edit',compact('surat','arsip_surat'));
    }

    public function update($id, Request $request)
    {
        $data = $request->all();
        $request->validate([
          'surat_id'=>'required',
          'tanggal' => 'required',
        ]);

        try {
          $arsip_surat = arsip_surat::find($id);
          $arsip_id = $arsip_surat->arsip_id;
          $arsip_surat->update($data);
          toast()->success('Berhasil Merubah Data', 'Berhasil');
          return redirect()->route('arsip.show',$arsip_id);
        } catch (\Exception $e) {
          toast()->error($e->getMessage(), 'Gagal');
          toast()->error('Terjadi Eror Saat Merubah Data', 'Gagal');
          return redirect()->back();
        }

    }

    public function destroy($id)
    {
        try {
          $arsip_surat = arsip_surat::find($id);
          $arsip_surat->delete();
          toast()->success('Berhasil Menghapus Data', 'Berhasil');
        } catch (\Exception $e) {
          toast()->error($e->getMessage(), 'Gagal');
          toast()->error('Terjadi Eror Saat Menghapus Data', 'Gagal');
        }

        return redirect()->back();
    }
}
