<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use App\Models\KerjaPraktek;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbsensiController extends Controller
{
    public function index()
    {
        $absensi = Absensi::with(['kerjapraktek.user','kerjapraktek.pembina'])->whereHas('kerjapraktek',function ($query) {
            $query->where('user_id', '=', auth()->user()->id);
        })->orderBy('created_at', 'asc')->paginate(10); 
        return view('pages.user.absensi.index', compact('absensi'));
    }
    public function create()
    {
        $absensi = KerjaPraktek::with('user')->where('user_id', '=', auth()->user()->id)->first();
        return view('pages.user.absensi.create', compact('absensi'));
    }
    public function store(Request $request)
    {
        // dd($request);
        try {
            $this->validate($request, [
                'kerja_praktek_id' => 'required', 'string', 'max:255',
                'kehadiran' => 'required', 'string', 'max:255',
            ]);
            Absensi::create([
                'kerjapraktek_id' => $request->kerja_praktek_id,
                'waktu' => Carbon::now(),
                'kehadiran' => $request->kehadiran,
                'status' => '-',
            ]);
            return redirect()->route('userAbsensi')->with(['success' => 'Absensi Berhasil Dibuat!']);
        } catch (\Exception $e) {
            return back()->with(['errors' => $e->getMessage()]);
        }
    }


    public function searchDate(Request $request){

           $this->validate($request,[
            'date' => 'required|date',
           ]);
           $date = Carbon::parse($request->date);

           $absensi = Absensi::whereMonth('waktu','=',$date->format('m'))->with(['kerjapraktek.user' => function($query){
            $query->where('id', '=', auth()->user()->id);
           }])->orderBy('created_at', 'asc')->paginate(10);
           return view('pages.user.absensi.index', compact('absensi'));

    }
}
