<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Pembina;
use Illuminate\Http\Request;

class PembinaController extends Controller
{
    public function index()
    {
        $pembina = Pembina::orderBy('created_at', 'desc')->paginate(10);
        return view('pages.admin.pembina.index', compact('pembina'));
    }
    public function create()
    {
        $admin = Admin::doesntHave('pembina')->get();
        $randadmin = Admin::inRandomOrder()->first();
        return view('pages.admin.pembina.create', compact('admin','randadmin'));
    }
    public function store(Request $request)
    {
        // dd($request);
        try {
            $this->validate($request, [
                'admin_id' => 'required', 'string', 'max:255',
                'nama_pembina' => 'required', 'string', 'max:255',
                'alamat' => 'required', 'string', 'max:255',
                'no_hp' => 'required', 'string', 'max:255',
                'bidang_kerja' => 'required', 'string', 'max:255',
                'status' => 'required', 'string', 'max:255',
            ]);
            Pembina::create([
                'admin_id' => $request->admin_id,
                'nama_pembina' => $request->nama_pembina,
                'alamat' => $request->alamat,
                'no_hp' => $request->no_hp,
                'bidang_kerja' => $request->bidang_kerja,
                'status' => $request->status,
            ]);
            return redirect()->route('adminPembina')->with(['success' => 'Pembina Berhasil Dibuat!']);
        } catch (\Exception $e) {
            return back()->with(['errors' => $e->getMessage()]);
        }
    }
    public function edit(Pembina $pembina, $id)
    {
        // dd($request);
        $data = Pembina::findorFail($id);
        return view('pages.admin.pembina.update', compact('data'));
    }
    public function update(Request $request, $id)
    {
        // dd($request);
        try {
            $this->validate($request, [
                'admin_id' => 'required', 'string', 'max:255',
                'nama_pembina' => 'required', 'string', 'max:255',
                'alamat' => 'required', 'string', 'max:255',
                'no_hp' => 'required', 'string', 'max:255',
                'bidang_kerja' => 'required', 'string', 'max:255',
                'status' => 'required', 'string', 'max:255',
            ]);
            $pembina = Pembina::findOrFail($id);
            $pembina->admin_id = $request->admin_id;
            $pembina->nama_pembina = $request->nama_pembina;
            $pembina->alamat = $request->alamat;
            $pembina->no_hp = $request->no_hp;
            $pembina->bidang_kerja =  $request->bidang_kerja;
            $pembina->status = $request->status;
            $pembina->save();
            return redirect()->route('adminPembina')->with(['success' => 'Pembina Berhasil Diubah!']);
        } catch (\Exception $e) {
            return back()->with(['errors' => $e->getMessage()]);
        }
    }


    public function destroy($id)
    {
        $pembina = Pembina::findOrFail($id);
        $pembina->delete();
        if ($pembina) {
            return redirect()
                ->route('adminPembina')
                ->with([
                    'success' => 'Pembina berhasil dihapus!'
                ]);
        } else {
            return redirect()
                ->route('adminPembina')
                ->with([
                    'error' => 'Ada beberapa kesalahan, mohon ulang lagi'
                ]);
        }
    }






    public function cari(Request $request)
    {
        try {
            $cari = $request->keyword;
            $pembina = Pembina::whereHas('admin', function ($query) use ($cari) {
                $query->where('nama', 'like', '%' . $cari . '%');
            })->orWhere(function ($query) use ($cari) {
                $query->where('alamat', 'LIKE', '%' . $cari . '%')
                    ->orWhere('bidang_kerja', 'LIKE', '%' . $cari . '%')
                    ->orWhere('nama_pembina', 'LIKE', '%' . $cari . '%')
                    ->orWhere('no_hp', 'LIKE', '%' . $cari . '%');
            })
                ->paginate(10); 
            // dd($pembina);
            return view('pages.admin.pembina.index', ['pembina' => $pembina]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
