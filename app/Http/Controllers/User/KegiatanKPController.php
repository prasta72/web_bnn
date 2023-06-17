<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KegiatanKPController extends Controller
{
    public function index()
    {
        $kegiatan = kegiatan::with(['user'])->where('user_id', '=', auth()->user()->id)->paginate(10);
        // dd($kegiatan);
        return view('pages.user.kegiatankp.index', compact('kegiatan'));
    } 
    public function update(Request $request, $id)
    {
        // dd($request);
        try {
            $data = kegiatan::where('id', '=', $id)->get();

            foreach ($data as $datas) {
                $datas->status = $request->status;
                $datas->save();
            }

            if ($data) {
                if ($request->status == "selesai") {
                    //redirect dengan pesan sukses
                    return redirect()->route('userKegiatanKP')->with(['success' => 'Kegiatan Berhasil Diubah!']);
                }
                if ($request->status == "belum selesai") {
                    //redirect dengan pesan sukses
                    return redirect()->route('userKegiatanKP')->with(['success' => 'Kegiatan Berhasil Diubah!']);
                }
            }
        } catch (\Exception $e) {
            return back()->with(['errors' => $e->getMessage()]);
        }
    }



    public function searchDate(Request $request){
           $date = Carbon::parse($request->date);

           $kegiatan = kegiatan::whereMonth('waktu','=',$date->format('m'))->Where('user_id','=', Auth::user()->id)->orderBy('created_at', 'asc')->paginate(10);
           return view('pages.user.kegiatankp.index', compact('kegiatan'));

    }
}
