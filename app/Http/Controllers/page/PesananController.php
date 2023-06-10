<?php

namespace App\Http\Controllers\page;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pesanan;
use App\Barang;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CheckoutRequest;
use Illuminate\Support\Facades\Redirect;


class PesananController extends Controller
{
    public function index()
    {
        $user_id = Auth::id();
        $pesanan = Pesanan::with('barang')->where('user_id', $user_id)->get();

        return view('pesanan.pesanan', compact('pesanan'));
    }

    public function process(CheckoutRequest $request)
    {
        $user = Auth::user();
        $barangId = $request->input('barang_id');
        $alamat = $request->input('alamat');
        $provinsi = $request->input('provinsi');
        $kabupaten = $request->input('kabupaten');
        $kodePos = $request->input('kode_pos');
        $nomorHp = $request->input('nomor_hp');
        $metodePembayaran = $request->input('pembayaran');

        $checkout = new Pesanan();
        $checkout->user_id = $user->id;
        $checkout->barang_id = $barangId;
        $checkout->alamat = $alamat;
        $checkout->provinsi = $provinsi;
        $checkout->kabupaten = $kabupaten;
        $checkout->kode_pos = $kodePos;
        $checkout->nomor_hp = $nomorHp;
        $checkout->metode_pembayaran = $metodePembayaran;
        $checkout->save();

        return Redirect::route('pesanan')->with('success', 'Checkout berhasil');
    }
    public function showBayar($id){
        $pesanan = Pesanan::findOrFail($id);
        return view('pesanan.bayar', compact('pesanan'));   
    }

    public function uploadBukti(Request $request, $id)
    {
        // Memvalidasi request
        $request->validate([
            'bukti' => 'required|file|max:2048', // Menentukan validasi file, misalnya hanya menerima jenis file tertentu dan batasan ukuran file
        ]);

        // Mengambil file dari request
        $file = $request->file('bukti');

        // Menyimpan file ke direktori
        $path = $file->store('bukti');

        // Menyimpan nama file ke database
        $pesanan = Pesanan::findOrFail($id);
        $pesanan->bukti = $file->getClientOriginalName();
        $pesanan->save();

        // Memberikan respon berhasil kepada pengguna
        return redirect()->back()->with('success', 'Bukti pembayaran berhasil diupload.');
    }

}
