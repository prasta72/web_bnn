<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class KegiatanKPController extends Controller
{
    public function index()
    {
        $kegiatankp = kegiatan::with(['user'])->orderBy('created_at', 'desc')->paginate(10);
        $users = User::all();

        return view('pages.admin.kegiatankp.index', compact('kegiatankp', 'users'));
    }

    public function create()
    {
        $kegiatan = kegiatan::get();
        $user = User::get();
        return view('pages.admin.kegiatankp.create', compact('kegiatan', 'user'));
    }

    public function store(Request $request)
    {
        // dd($request);
        try {
            $this->validate($request, [
                'user_id' => 'required', 'string', 'max:255',
                'bidang_kerja' => 'required', 'string', 'max:255',
                'waktu' => 'required', 'string', 'max:255',
                'kegiatan' => 'required', 'string', 'max:255',
            ]);
            kegiatan::create([
                'user_id' => $request->user_id,
                'bidang_kerja' => $request->bidang_kerja,
                'waktu' => $request->waktu,
                'kegiatan' => $request->kegiatan,
                'status' => 'belum selesai',
            ]);
            return redirect()->route('adminKegiatanKP')->with(['success' => 'Kegiatan Berhasil Dibuat!']);
        } catch (\Exception $e) {
            return back()->with(['errors' => $e->getMessage()]);
        }
    }
    public function edit(kegiatan $kegiatan, $id)
    {
        // dd($request);
        $data = kegiatan::findorFail($id);
        return view('pages.admin.kegiatankp.update', compact('data'));
    }
    public function update(Request $request, $id)
    {
        // dd($request);
        try {
            $this->validate($request, [
                'user_id' => 'required', 'string', 'max:255',
                'bidang_kerja' => 'required', 'string', 'max:255',
                'waktu' => 'required', 'string', 'max:255',
                'kegiatan' => 'required', 'string', 'max:255',
            ]);
            $kegiatan = kegiatan::findOrFail($id);
            $kegiatan->user_id = $request->user_id;
            $kegiatan->bidang_kerja = $request->bidang_kerja;
            $kegiatan->waktu = $request->waktu;
            $kegiatan->kegiatan =  $request->kegiatan;
            $kegiatan->save();
            return redirect()->route('adminKegiatanKP')->with(['success' => 'Kegiatan Kerja Praktek Berhasil Diubah!']);
        } catch (\Exception $e) {
            return back()->with(['errors' => $e->getMessage()]);
        }
    }


    public function destroy($id)
    {
        $kegiatan = kegiatan::findOrFail($id);
        $kegiatan->delete();
        if ($kegiatan) {
            return redirect()
                ->route('adminKegiatanKP')
                ->with([
                    'success' => 'Pembina berhasil dihapus!'
                ]);
        } else {
            return redirect()
                ->route('adminKegiatanKP')
                ->with([
                    'error' => 'Ada beberapa kesalahan, mohon ulang lagi'
                ]);
        }
    }

    public function cari(Request $request)
    {
        try {
            $kegiatankp = Kegiatan::with(['user'])->select('user_id')->distinct()->get();
            $users = User::all();

            $kp_id = $request->nama_mahasiswa;

            if ($request->date == null) {
                $kegiatankp = Kegiatan::where('user_id', '=', $kp_id)->orderBy('created_at', 'asc')->paginate(10);
            } elseif ($request->nama_mahasiswa == null) {
                $date = Carbon::parse($request->date);
                $kegiatankp = kegiatan::whereMonth('waktu', '=', $date->format('m'))->orderBy('created_at', 'asc')->paginate(10);
            } else {
                $date = Carbon::parse($request->date);
                $kegiatankp = Kegiatan::where('user_id', '=', $kp_id)->WhereMonth('waktu', '=', $date->format('m'))->orderBy('created_at', 'asc')->paginate(10);
            }
            return view('pages.admin.kegiatankp.index', compact('kegiatankp', 'users'));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
