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
        $absensi = Absensi::with(['kerjapraktek.user', 'kerjapraktek.pembina'])->orderBy('id', 'ASC')->paginate(10);
        $nama_mahasiswa = Absensi::with(['kerjapraktek.user'])->select('kerjapraktek_id')->distinct()->get();

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
        $nama_mahasiswa = Absensi::with(['kerjapraktek.user'])->select('kerjapraktek_id')->distinct()->get();

        $kp_id = $request->nama_mahasiswa;


        $date = Carbon::parse($request->date);
        $absensi = Absensi::query();

        if($request->date != null) {
            $absensi->whereMonth('waktu', '=', $date->format('m'));
        }

        $absensi = $absensi->where('kerjapraktek_id', 'like', '%' . $kp_id . '%')
            ->orderBy('id', 'ASC')
            ->paginate(10);

        return view('pages.admin.absensi.index', compact('absensi', 'nama_mahasiswa'));
    }
}
