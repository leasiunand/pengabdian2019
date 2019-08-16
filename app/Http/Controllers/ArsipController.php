<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\arsip;
use Sentinel;
use DB;

class ArsipController extends Controller
{
    public function index($value='')
    {
        $arsips = arsip::where('user_id',Sentinel::getUser()->id)->orwhere('status','1')->get();
        return view('backend.arsip.index',compact('arsips'));
    }

    public function create(Request $request)
    {
        $master = arsip::select(DB::Raw("concat(id,' - ',nama) as coba"),'id')->get()->pluck('coba','id');
        if($request->arsip_id){
          $id = $request->arsip_id;
          $master = arsip::select(DB::Raw("concat(id,' - ',nama) as coba"),'id')->where('id',$id)->get()->pluck('coba','id');
          return view('backend.arsip.child_create',compact('master'));
        }
        return view('backend.arsip.create',compact('master'));
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
      $arsip = arsip::find($id);
      $arsips = arsip::where('arsip_id',$arsip->id)->get();

      if($arsip->user_id != Sentinel::getUser()->id){
        $arsips = arsip::where('arsip_id',$arsip->id)->where('status',1)->get();
      }
      return view('backend.arsip.show',compact('arsip','arsips'));
    }

    public function edit($id)
    {
        $arsip = arsip::find($id);
        $master = arsip::select(DB::Raw("concat(id,' - ',nama) as coba"),'id')->where('id','<>',$id)->get()->pluck('coba','id');
        return view('backend.arsip.edit',compact('arsip','master'));
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
