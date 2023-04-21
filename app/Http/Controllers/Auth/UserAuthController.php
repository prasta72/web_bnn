<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserAuthController extends Controller
{
    public function login(){
        return view('pages.user.auth.userLogin');
    }

    public function loginHandler(Request $request)
    {
        try {
            $credentials = $request->validate(([
                'email' => 'required|email',
                'password' => 'required'
            ]));
            if(Auth::guard('web')->attempt($credentials)){
                $request->session()->regenerate();
                return redirect()->route('userDashboard');
            }
        } catch (\Exception $th) {
            return  $th->getMessage();
        }
        

        return back()->withErrors(['email' => 'Password dan Email Tidak cocok!'])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
