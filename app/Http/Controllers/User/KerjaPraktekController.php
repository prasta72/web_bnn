<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\kerjaPraktek;
use App\Models\User;
use Illuminate\Http\Request;

class KerjaPraktekController extends Controller
{
   public function index(){
    $kerjapraktek = kerjaPraktek::with(['user','pembina.admin'])->where('user_id', '=', auth()->user()->id)->get();
    // dd($kerjapraktek);
     return view('pages.user.kerjapraktek.index', compact('kerjapraktek'));
   }
   public function edit(kerjaPraktek $kerjapraktek, $id)
   {
       // dd($request);
       $kerjapraktek = kerjaPraktek::findorFail($id);
       return view('pages.user.kerjapraktek.update', compact('kerjapraktek'));
   }
   public function update(Request $request, $id)
   {
    //    dd($request);
       try {
           $this->validate($request, [
            'nama_lengkap' => 'required', 'string', 'max:255',
            'email' => 'required', 'string', 'max:255',
            'alamat' => 'required', 'string', 'max:255',
            'no_hp' => 'required', 'string', 'max:255',
            'instansi' => 'required', 'string', 'max:255',
            'jurusan' => 'required', 'string', 'max:255',
            'mulai_kerja_praktek' => 'required',
            'selesai_kerja_praktek' => 'required',
           ]);
           $kerjapraktek = kerjaPraktek::findOrFail($id);
           $kerjapraktek->alamat = $request->alamat;
           $kerjapraktek->no_hp = $request->no_hp;
           $kerjapraktek->instansi = $request->instansi;
           $kerjapraktek->jurusan =  $request->jurusan;
           $kerjapraktek->mulai_kerja_praktek =  $request->mulai_kerja_praktek;
           $kerjapraktek->selesai_kerja_praktek =  $request->selesai_kerja_praktek;
           $kerjapraktek->save();

           $user = User::findOrFail(auth()->user()->id);
           $user->nama_lengkap = $request->nama_lengkap;
           $user->email = $request->email;
           $user->save();
           return redirect()->route('userKerjaPraktek')->with(['success' => 'Biodata Berhasil Diubah!']);
       } catch (\Exception $e) {
           return back()->with(['errors' => $e->getMessage()]);
       }
   }
}
