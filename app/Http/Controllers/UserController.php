<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\KerjaPraktek;
use App\Models\Pembina;
use App\Models\User;       
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $data = KerjaPraktek::where('user_id', '=', auth()->user()->id)->get();
        if ($data->isEmpty()) {
            return view('pages.user.daftarkp.index');
        } else {
            $data = KerjaPraktek::with('pembina.admin')->where('user_id', '=' ,auth()->user()->id)->first();

            return view('pages.user.userDashboard', compact('data'));
        }
    }

    public function daftarKP(Request $request){
        //   dd($request);
          try {
            $this->validate($request, [
                'NIM' => 'required', 'string', 'max:255',
                'alamat' => 'required', 'string', 'max:255',
                'no_hp' => 'required', 'string', 'max:255',
                'instansi' => 'required', 'string', 'max:255',
                'jurusan' => 'required', 'string', 'max:255',
                'mulai_kerja_praktek' => 'required',
                'selesai_kerja_praktek' => 'required',
            ]); 
            KerjaPraktek::create([
                'user_id' => auth()->user()->id,
                'pembina_id' => null,
                'NIM' => $request->NIM,
                'alamat' =>$request->alamat,
                'no_hp' => $request->no_hp,
                'instansi' =>  $request->instansi,
                'jurusan' =>$request->jurusan,
                'status' =>'aktif',
                'bidang_kerja' =>'belum ditentukan',
                'mulai_kerja_praktek' => $request->mulai_kerja_praktek,
                'selesai_kerja_praktek' =>  $request->selesai_kerja_praktek,
            ]);
            return redirect()->route('userDashboard')->with(['success' => 'Pembina Berhasil Dibuat!']);
        } catch (\Exception $e) {
            return back()->with(['errors' => $e->getMessage()]);
        }
    }

 







    public function daftarUser(){
        return view('pages.user.daftarkp.daftaruser');
    }

    public function daftarUserHandler(Request $request){
          try {
            $user_id = User::orderBy('id', 'desc')->first();

            // dd($user_id->id + 1);
            $this->validate($request, [
                'nama_lengkap' => 'required', 'string', 'max:255',
                'email' => 'required', 'string', 'max:255',
                'password' => 'required', 'string', 'max:255',
                'NIM' => 'required', 'string', 'max:255',
                'alamat' => 'required', 'string', 'max:255',
                'no_hp' => 'required', 'string', 'max:255',
                'instansi' => 'required', 'string', 'max:255',
                'jurusan' => 'required', 'string', 'max:255',
                'mulai_kerja_praktek' => 'required',
                'selesai_kerja_praktek' => 'required',
            ]);
            KerjaPraktek::create([
                'user_id' => $user_id->id + 1,
                'pembina_id' => null,
                'NIM' => $request->NIM,
                'alamat' =>$request->alamat,
                'bidang_kerja' =>'belum ditentukan',
                'no_hp' => $request->no_hp,
                'instansi' =>  $request->instansi,
                'jurusan' =>$request->jurusan,
                'status' =>'aktif',
                'mulai_kerja_praktek' => $request->mulai_kerja_praktek,
                'selesai_kerja_praktek' =>  $request->selesai_kerja_praktek,
            ]);
            User::create([
                'nama_lengkap' => $request->nama_lengkap,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            Auth::loginUsingId($user_id->id + 1);
            return redirect()->route('userDashboard')->with(['success' => 'Pembina Berhasil Dibuat!']);
        } catch (\Exception $e) {
            return back()->with(['errors' => $e->getMessage()]);
        }
    }
}
