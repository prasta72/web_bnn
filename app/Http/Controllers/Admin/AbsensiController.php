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
        $absensi = Absensi::with(['kerjapraktek.user','kerjapraktek.pembina'])->orderBy('created_at', 'asc')->paginate(10); 
        // dd($absensi);
        return view('pages.admin.absensi.index', compact('absensi'));
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

    public function searchDate(Request $request){
        
        $this->validate($request,[
            'date' => 'required|date',
           ]);
           $date = Carbon::parse($request->date);
         
           $absensi = Absensi::whereDate('waktu','=',$date->format('y-m-d'))->orderBy('created_at', 'asc')->paginate(10);
           return view('pages.admin.absensi.index', compact('absensi'));
         
    }
}
