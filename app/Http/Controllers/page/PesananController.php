<?php

namespace App\Http\Controllers\page;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pesanan;
use App\Barang;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CheckoutRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

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
        $total = $request->input('total'); 

        $checkout = new Pesanan();
        $checkout->user_id = $user->id;
        $checkout->barang_id = $barangId;
        $checkout->alamat = $alamat;
        $checkout->provinsi = $provinsi;
        $checkout->kabupaten = $kabupaten;
        $checkout->kode_pos = $kodePos;
        $checkout->nomor_hp = $nomorHp;
        $checkout->metode_pembayaran = $metodePembayaran;
        $checkout->ongkir = 10000;
        $checkout->total = $total;
        $checkout->save();

        return Redirect::route('pesanan')->with('success', 'Checkout berhasil');
    }

    public function coba()
    {
        return view('pembayarans.pembayaran');
    }
}
