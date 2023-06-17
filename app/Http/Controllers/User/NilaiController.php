<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\KerjaPraktek;
use App\Models\Nilai;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function index()
    {

        $kerjapraktek = KerjaPraktek::with('pembina')->where('user_id', '=', auth()->user()->id)->first();
        $nilai = Nilai::with(['admin','kerjapraktek'=> function ($query) {
            $query->where('user_id', '=', auth()->user()->id);
        }])->where('kerja_praktek_id','=',$kerjapraktek->id)->first();
        // dd($nilai);
        return view('pages.user.nilai.index', compact('nilai','kerjapraktek'));
    } 
}
