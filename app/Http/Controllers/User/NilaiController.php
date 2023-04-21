<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\kerjaPraktek;
use App\Models\Nilai;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function index()
    {

        $kerjapraktek = kerjaPraktek::with('pembina')->where('user_id', '=', auth()->user()->id)->first();
        $nilai = Nilai::with(['user', 'admin'])->where('user_id', '=', auth()->user()->id)->first();
        // dd($nilai);
        return view('pages.user.nilai.index', compact('nilai','kerjapraktek'));
    }
}
