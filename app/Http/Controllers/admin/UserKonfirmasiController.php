<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pesanan;

class UserKonfirmasiController extends Controller
{
    public function index(){
        $users = Pesanan::all();
        return view('pengelola.konfirmasi', compact('users'));
    }
     public function konfirmasi(Request $request, $id)
    {
        $konfirmasi = Pesanan::findOrFail($id);
        return view('pengelola.konfirmasi-user', compact('konfirmasi'));
    }
    public function update(Request $request, $id){
        $konfirmasi = Pesanan::findOrFail($id);
        
        // Validasi data yang diterima dari form
        $validatedData = $request->validate([
            'status' => 'required',
        ]);
        
        // Mengubah status konfirmasi
        $konfirmasi->status = $request->input('status');
        $konfirmasi->save();

        // Redirect atau melakukan tindakan lainnya setelah perubahan data
        return redirect()->route('konfirmasi')->with('success', 'Status pesanan berhasil diubah!');
    }
}
