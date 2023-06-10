<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{
    // Fungsi untuk menampilkan profil pengguna
    public function show(Request $request)
    {
        $user = Auth::user(); // Mendapatkan objek pengguna yang diautentikasi menggunakan Sanctum

        return response()->json([
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'phone_number' => $user->phone_number, 
            'address' => $user->address
        ]);
    }
}
