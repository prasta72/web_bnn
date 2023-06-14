<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KerjaPraktek;
use App\Models\Nilai;
use App\Models\Pembina;
use App\Models\User;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function index()
    {
        $nilai = Nilai::with(['user.kerjapraktek'])->orderBy('created_at','desc')->paginate(10);
        return view('pages.admin.nilai.index', compact('nilai'));
    }
    public function create()
    {
        $user = User::select('*')->whereIn('id',function($query) { 

            $query->select('user_id')->from('kerja_prakteks');
         
         })->
         whereNotIn('id',function($query) {

            $query->select('user_id')->from('nilais');
         
         })
         ->get();
        $pembina = Pembina::all();
        $kerjapraktek = KerjaPraktek::with(['pembina'])->get();
        return view('pages.admin.nilai.create', compact('user','pembina','kerjapraktek'));
    }
    public function store(Request $request)
    {
        // dd($request);
        try {
            $this->validate($request, [
                'user_id' => 'required', 'string', 'max:255',
                'admin_id' => 'required', 'string', 'max:255',
                'nilai_sopan_santun' => 'required', 'string', 'max:255',
                'nilai_dedikasi' => 'required', 'string', 'max:255',
                'nilai_presensi_kehadiran' => 'required', 'string', 'max:255',
                'nilai_tanggung_jawab' => 'required', 'string', 'max:255',
                'nilai_kemampuan_bekerjasama' => 'required', 'string', 'max:255',
                'nilai_prakarsa' => 'required', 'string', 'max:255',
                'nilai_skill' => 'required', 'string', 'max:255',
                'keterangan' => 'required',
            ]);
            $hasil_akhir = ($request->nilai_sopan_santun + $request->nilai_dedikasi + $request->nilai_presensi_kehadiran + $request->nilai_tanggung_jawab + $request->nilai_kemampuan_bekerjasama + $request->nilai_prakarsa + $request->nilai_skill) / 7;

            Nilai::create([
                'user_id' => $request->user_id,
                'admin_id' => $request->admin_id,
                'nilai' => $hasil_akhir,
                'keterangan' => $request->keterangan,
            ]);
            return redirect()->route('adminNilai')->with(['success' => 'Nilai Berhasil Dibuat!']);
        } catch (\Exception $e) {
            return back()->with(['errors' => $e->getMessage()]);
        }
    }
    public function edit(Nilai $nilai, $id)
    {
        // dd($request);
        $data = Nilai::findorFail($id);
        $pembina =Pembina::with('admin')->get();
        $kerjapraktek = KerjaPraktek::with(['pembina'])->get();
        return view('pages.admin.nilai.update', compact('data','pembina','kerjapraktek'));
    }
    public function update(Request $request, $id)
    {
        // dd($request);
        try {
            $this->validate($request, [
                'user_id' => 'required', 'string', 'max:255',
                'admin_id' => 'required', 'string', 'max:255',
                'nilai' => 'required', 'string', 'max:255',
                'keterangan' => 'required', 'string', 'max:255',
            ]);
            $nilai = Nilai::findOrFail($id);
            $nilai->user_id = $request->user_id;
            $nilai->admin_id = $request->admin_id;
            $nilai->nilai = $request->nilai;
            $nilai->keterangan = $request->keterangan;
            $nilai->save();
            return redirect()->route('adminNilai')->with(['success' => 'Nilai Berhasil Diubah!']);
        } catch (\Exception $e) {
            return back()->with(['errors' => $e->getMessage()]);
        }
    }


    public function destroy($id)
    {
        $nilai = Nilai::findOrFail($id);
        $nilai->delete();
        if ($nilai) {
            return redirect()
                ->route('adminNilai')
                ->with([
                    'success' => 'Nilai berhasil dihapus!'
                ]);
        } else {
            return redirect()
                ->route('adminNilai')
                ->with([
                    'error' => 'Ada beberapa kesalahan, mohon ulang lagi'
                ]);
        }
    }






    public function cari(Request $request)
    {
        try {
            $cari = $request->keyword;
            $nilai = Nilai::whereHas('user', function ($query) use ($cari) {
                $query->where('nama_lengkap', 'like', '%' . $cari . '%');
            })
            ->orWhereHas('admin.pembina', function ($query) use ($cari) {
                $query->where('bidang_kerja', 'like', '%' . $cari . '%');
            })
            
            ->orWhere(function ($query) use ($cari) {
                $query->where('nilai', 'LIKE', '%' . $cari . '%')
                    ->orWhere('keterangan', 'LIKE', '%' . $cari . '%');
            })
                ->paginate(10);
            // dd($nilai);
            return view('pages.admin.nilai.index', ['nilai' => $nilai]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
