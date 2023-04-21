<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use GuzzleHttp\Psr7\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Exception;

class AdminAuthController extends Controller
{
    public function login()
    {
        return view('pages.admin.auth.adminLogin');
    }

    public function loginHandler(Request $request)
    {
        try {
            $credentials = $request->validate(([
                'email' => 'required|email',
                'password' => 'required'
            ]));
            if (Auth::guard('admins')->attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->route('adminDashboard');
            }
        } catch (\Exception $th) {
            return  $th->getMessage();
        }


        return back()->withErrors(['email' => 'Email dan Password Tidak Cocok!'])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::guard('admins')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
