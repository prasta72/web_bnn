<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AbsensiController extends Controller
{
    public function index()
    {
        // $absensi = Absensi::with(['kerjapraktek.user', 'kerjapraktek.pembina'])->orderBy('id', 'ASC')->paginate(10);
        $nama_mahasiswa = Absensi::with(['kerjapraktek.user'])->select('kerjapraktek_id')->distinct()->get();

        $absensi = Absensi::groupBy('kerjapraktek_id')
        ->select('kerjapraktek_id', DB::raw('count(*) as total_absensi'))
        ->paginate(20);

        // dd($absensi);

        // dd($nama_mahasiswa);

        return view('pages.admin.absensi.indexnew', compact('absensi', 'nama_mahasiswa'));
    }

    public function indexAll(){
        $absensi = Absensi::with(['kerjapraktek.user', 'kerjapraktek.pembina'])->orderBy('id', 'ASC')->paginate(10);
        $nama_mahasiswa = Absensi::with(['kerjapraktek.user'])->select('kerjapraktek_id')->distinct()->get();

        // $absensi = Absensi::groupBy('kerjapraktek_id')
        // ->select('kerjapraktek_id', DB::raw('count(*) as total_absensi'))
        // ->paginate(2);

        // dd($absensi);

        // dd($nama_mahasiswa);

        return view('pages.admin.absensi.index', compact('absensi', 'nama_mahasiswa'));
    }

    public function adminAbsensiDetail($id){
        $absensi = Absensi::where('kerjapraktek_id', $id)->paginate(10);
        $id_kerjapraktek = $id;
        // dd($absensi);
        return view('pages.admin.absensi.detail', compact('absensi', 'id_kerjapraktek'));
    }

    public function updateDetail(Request $request, $id)
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
                    return redirect()->back()->with(['success' => 'Kehadiran Berhasil Diapprove!']);
                }
                if ($request->approve == "notapproved") {
                    //redirect dengan pesan sukses
                    return redirect()->back()->with(['success' => 'Kehadiran Berhasil Ditolak!']);
                }
            }
        } catch (\Exception $e) {
            return back()->with(['errors' => $e->getMessage()]);
        }
    }

    public function updateAllDetail($id){
         try {
            $data = DB::table('absensis')
            ->where('kerjapraktek_id', '=', $id)
            ->where(function ($query) {
                $query->where('status', '=', 'notapproved')
                    ->orWhere('status', '=', '-');
            })
            ->get();

            // dd($data);

            foreach ($data as $datas) {
                $absensi = Absensi::find($datas->id);
                $absensi->status = 'approved';
                $absensi->save();
            }

            if ($data) {
                //redirect dengan pesan sukses
                return redirect()->back()->with(['success' => 'Semua Kehadiran Berhasil Diapprove!']);
            }
        } catch (\Exception $e) {
            return back()->with(['errors' => $e->getMessage()]);
        }
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
    public function searchDateDetail(Request $request)
    {
        $nama_mahasiswa = Absensi::with(['kerjapraktek.user'])->select('kerjapraktek_id')->distinct()->get();

        $kp_id = $request->nama_mahasiswa;


        $date = Carbon::parse($request->date);
        $absensi = Absensi::query();
        // dd($date);
        // dd($absensi);

        if($request->date != null) {
            $absensi->whereMonth('waktu', '=', $date->format('m'));
        }

        // dd($absensi);

        $absensi = $absensi->where('kerjapraktek_id', $request->id)
            ->orderBy('id', 'ASC')
            ->paginate(10);

        // dd($absensi->count());
         $id_kerjapraktek = $request->id;

        return view('pages.admin.absensi.detail', compact('absensi', 'nama_mahasiswa', 'id_kerjapraktek'));
    }

    public function searchDate(Request $request)
    {
        // dd($request->all());
        $nama_mahasiswa = Absensi::with(['kerjapraktek.user'])->select('kerjapraktek_id')->distinct()->get();

        $kp_id = $request->nama_mahasiswa;

        $date = Carbon::parse($request->date);
        $absensis = Absensi::query();
        // dd($date->format('m'));
        // $absensi->whereMonth('waktu', '=', $date->format('m'));
        // dd($absensi->get());
        // dd($absensi);

        if($request->date != null) {
            $absensis->whereMonth('waktu', '=', $date->format('m'));
        }

        // dd($absensi);
        // if($)
        if($request->nama_mahasiswa != null){
             $absensi = $absensis->where('kerjapraktek_id', $kp_id)
            ->orderBy('id', 'ASC')
            ->paginate(10);
        }else{
            $absensi = $absensis->orderBy('id', 'ASC')
            ->paginate(10);;
        }

        // dd($absensi->count());
        // dd($absensi);

        return view('pages.admin.absensi.index', compact('absensi', 'nama_mahasiswa'));
    }

}
