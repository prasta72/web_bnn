<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function index()
    {
        $absensi = Absensi::with(['kerjapraktek.user', 'kerjapraktek.pembina'])->orderBy('created_at', 'asc')->paginate(10);
        $nama_mahasiswa = Absensi::with(['kerjapraktek.user'])->get();
        return view('pages.admin.absensi.index', compact('absensi', 'nama_mahasiswa'));
    }
    public function update(Request $request, $id)
    {
        try {
            $data = Absensi::where('id', '=', $id)->get();

            foreach ($data as $datas) {
                $datas->status = $request->approve;
                $datas->save();
            }

            if ($data) {
                if ($request->approve == "approved") {
                    //redirect dengan pesan sukses
                    return redirect()->route('adminAbsensi')->with(['success' => 'Kehadiran Berhasil Diapprove!']);
                }
                if ($request->approve == "notapproved") {
                    //redirect dengan pesan sukses
                    return redirect()->route('adminAbsensi')->with(['success' => 'Kehadiran Berhasil Ditolak!']);
                }
            }
        } catch (\Exception $e) {
            return back()->with(['errors' => $e->getMessage()]);
        }
    }
    public function updateall()
    {
        try {
            $data = Absensi::where('status', '=', 'notapproved')->orWhere('status', '=', '-')->get();

            foreach ($data as $datas) {
                $datas->status = 'approved';
                $datas->save();
            }

            if ($data) {
                //redirect dengan pesan sukses
                return redirect()->route('adminAbsensi')->with(['success' => 'Semua Kehadiran Berhasil Diapprove!']);
            }
        } catch (\Exception $e) {
            return back()->with(['errors' => $e->getMessage()]);
        }
    }

    public function searchDate(Request $request)
    {
        $nama_mahasiswa = Absensi::with(['kerjapraktek.user'])->get();

        $kp_id = $request->nama_mahasiswa;

        if ($request->date == null) {
            $absensi = Absensi::where('kerjapraktek_id', '=', $kp_id)->orderBy('created_at', 'asc')->paginate(10);
        } elseif ($request->nama_mahasiswa == null) {
            $date = Carbon::parse($request->date);
            $absensi = Absensi::WhereMonth('waktu', '=', $date->format('m'))->orderBy('created_at', 'asc')->paginate(10);
        } else {
            $date = Carbon::parse($request->date);
            $absensi = Absensi::where('kerjapraktek_id', '=', $kp_id)->WhereMonth('waktu', '=', $date->format('m'))->orderBy('created_at', 'asc')->paginate(10);
        }
        return view('pages.admin.absensi.index', compact('absensi', 'nama_mahasiswa'));
    }
}
