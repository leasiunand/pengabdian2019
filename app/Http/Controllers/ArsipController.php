<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\arsip;
use Sentinel;

class ArsipController extends Controller
{
    public function index($value='')
    {
        $arsips = arsip::all();
        return view('backend.arsip.index',compact('arsips'));
    }

    public function create($value='')
    {
        $arsip = arsip::pluck('id','nama');
        return view('backend.arsip.create',compact('arsip'));
    }

    public function store(Request $request)
    {
        $arsip = new arsip;
        $data = $request->all();

        $request->validate([
          'id' => 'required|unique:arsips,id',
          'nama' => 'required',
          'status' => 'required',
        ]);

        try {
          $data['user_id'] = Sentinel::getUser()->id;
          $arsip = arsip::create($data);
          toast()->success('Berhasil Menyimpan Data Arsip', 'Berhasil');
          return redirect()->route('arsip.index');
        } catch (\Exception $e) {
          toast()->error($e->getMessage, 'Eror');
          toast()->error('Terjadi Eror Saat Menyimpan Data', 'Gagal');
          return redirect()->back();
        }

    }

    public function show($id)
    {
        
    }

    public function edit($id)
    {
        $arsip = arsip::find($id);
        return view('backend.arsip.edit',compact('arsip'));
    }

    public function update($id, Request $request)
    {
        $arsip = arsip::find($id);
        $data = $request->all();

        $request->validate([
          'id' => 'required|unique:arsips,id,'.$id,
          'nama' => 'required',
          'status' => 'required',
        ]);

        try {
          $arsip = $arsip->update($data);
          toast()->success('Berhasil Merubah Data Arsip', 'Berhasil');
          return redirect()->route('arsip.index');
        } catch (\Exception $e) {
            toast()->error($e->getMessage, 'Eror');
            toast()->error('Terjadi Eror Saat Merubah Data', 'Gagal');
            return redirect()->back();
        }

    }

    public function destroy($id)
    {
        try {
          $arsip = arsip::find($id);
          $arsip->delete();
          toast()->success('Berhasil Menghapus Data Arsip', 'Berhasil');
        } catch (\Exception $e) {
          toast()->error($e->getMessage, 'Eror');
          toast()->error('Terjadi Eror Saat Menghapus Data', 'Gagal');
        }
        return redirect()->back();
    }
}
