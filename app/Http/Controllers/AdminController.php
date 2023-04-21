<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index() {
        $dataUser = User::all();
        $countUser = count($dataUser);
        $dataAdmin = Admin::all();
        $countAdmin = count($dataAdmin);
        return view('pages.admin.adminDashboard', compact('dataUser', 'countUser', 'dataAdmin', 'countAdmin'));
    }
   
}
