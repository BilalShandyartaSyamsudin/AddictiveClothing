<?php

namespace App\Http\Controllers\page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Barang;

class CheckoutController extends Controller
{
    public function checkout($id_barang){
        $barang = Barang::find($id_barang);
        return view('checkout.checkout', compact('barang'));
}
}

