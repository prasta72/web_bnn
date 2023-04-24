<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use App\Models\KerjaPraktek;
use App\Models\Pembina;
use Illuminate\Http\Request;

class KerjaPraktekController extends Controller
{
    public function index()
    {
        $kerjapraktek =KerjaPraktek::with('pembina.admin')->orderBy('created_at', 'asc')->paginate(10);
        // dd($kerjapraktek);
        return view('pages.admin.kerjapraktek.index', compact('kerjapraktek'));
    }
    public function show($id)
    {
        $data =KerjaPraktek::with(['user','pembina'])->findorFail($id);
        return view('pages.admin.kerjapraktek.show', compact('data'));
    }
    public function edit($id)
    {
        // dd($request);
        $data =KerjaPraktek::with(['user','pembina'])->findorFail($id);
        $pembina =Pembina::all();
        return view('pages.admin.kerjapraktek.update', compact('data','pembina'));
    }
    public function update(Request $request, $id)
    {
        // dd($request);
        try {
            $this->validate($request, [
                'user_id' => 'required', 'string', 'max:255',
                'pembina_id' => 'required', 'string', 'max:255',
                'status' => 'required', 'string', 'max:255',
                'bidang_kerja' => 'required', 'string', 'max:255',
                'NIM' => 'required', 'string', 'max:255',
                'alamat' => 'required', 'string', 'max:255',
                'no_hp' => 'required', 'string', 'max:255',
                'instansi' => 'required', 'string', 'max:255',
                'jurusan' => 'required', 'string', 'max:255',
                'mulai_kerja_praktek' => 'required',
                'selesai_kerja_praktek' => 'required',
            ]);
            $kerjapraktek =KerjaPraktek::findOrFail($id);
            $kerjapraktek->user_id = $request->user_id;
            $kerjapraktek->pembina_id = $request->pembina_id;
            $kerjapraktek->NIM = $request->NIM;
            $kerjapraktek->bidang_kerja = $request->bidang_kerja;
            $kerjapraktek->status = $request->status;
            $kerjapraktek->alamat = $request->alamat;
            $kerjapraktek->no_hp = $request->no_hp;
            $kerjapraktek->instansi =  $request->instansi;
            $kerjapraktek->jurusan = $request->jurusan;
            $kerjapraktek->mulai_kerja_praktek = $request->mulai_kerja_praktek;
            $kerjapraktek->selesai_kerja_praktek = $request->selesai_kerja_praktek;
            $kerjapraktek->save();

            return redirect()->route('adminKerjaPraktek')->with(['success' => 'KerjaPraktek Berhasil Diubah!']);
        } catch (\Exception $e) {
            return back()->with(['errors' => $e->getMessage()]);
        }
    }


    public function destroy($id)
    {
        $kerjapraktek =KerjaPraktek::findOrFail($id);
        $kerjapraktek->delete();
        $absensi =Absensi::where('kerjapraktek_id', '=', $id);
        $absensi->delete();
        if ($kerjapraktek) {
            return redirect()
                ->route('adminKerjaPraktek')
                ->with([
                    'success' => 'KerjaPraktek berhasil dihapus!'
                ]);
        } else {
            return redirect()
                ->route('adminKerjaPraktek')
                ->with([
                    'error' => 'Ada beberapa kesalahan, mohon ulang lagi'
                ]);
        }
    }






    public function cari(Request $request)
    {
        try {
            $cari = $request->keyword;
            $kerjapraktek = KerjaPraktek::whereHas('user', function ($query) use ($cari) {
                $query->where('nama_lengkap', 'like', '%' . $cari . '%');
            })
            ->orWhereHas('pembina', function ($query) use ($cari) {
                $query->where('nama_pembina', 'like', '%' . $cari . '%');
            })
            ->orWhere(function ($query) use ($cari) {
                $query->where('NIM', 'LIKE', '%' . $cari . '%')
                    ->orWhere('instansi', 'LIKE', '%' . $cari . '%')
                    ->orWhere('no_hp', 'LIKE', '%' . $cari . '%')
                    ->orWhere('jurusan', 'LIKE', '%' . $cari . '%')
                    ->orWhere('alamat', 'LIKE', '%' . $cari . '%');
            })
                ->paginate(10);
            // dd($kerjapraktek);
            return view('pages.admin.kerjapraktek.index', ['kerjapraktek' => $kerjapraktek]);
        } catch (\Exception $e) {
            return back()->with(['errors' => $e->getMessage()]);
        }
    }
}
