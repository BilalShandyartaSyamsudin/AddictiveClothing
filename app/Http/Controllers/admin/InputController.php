<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Barang;
use RealRashid\SweetAlert\Facades\Alert;


class InputController extends Controller
{
    public function index()
    {
        return view('pengelola.input');
    }

    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'merek' => 'required',
            'gambar' => 'required',
            'harga' => 'required|numeric',
            'deskripsi' => 'required',
        ]);

        // Membuat objek Barang baru
        $barang = new Barang;
        $barang->merek = $request->merek;
        $barang->gambar = $request->gambar;
        $barang->harga = $request->harga;
        $barang->deskripsi = $request->deskripsi;

        // Menyimpan data ke database
        $barang->save();

        // Menampilkan pop-up SweetAlert
        // Alert::success('Success', 'Data has been saved successfully!')->autoClose(3000);

        // Redirect ke halaman sukses atau halaman lainnya
        return redirect()->route('input.success');
    }
}
