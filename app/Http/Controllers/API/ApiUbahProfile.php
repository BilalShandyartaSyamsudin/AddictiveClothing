<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class ApiUbahProfile extends Controller
{
    public function ubah(Request $request)
{
    $user = User::findOrFail(Auth::id());

    // Validasi data yang diterima dari form
    $validatedData = $request->validate([
        'address' => 'required',
        'email' => 'required|email',
        'phone_number' => 'required',
    ]);

    // Mengubah data pengguna
    $user->address = $request->input('address');
    $user->email = $request->input('email');
    $user->phone_number = $request->input('phone_number');
    $user->save();

    // Mengembalikan respons JSON
    return response()->json(['message' => 'Profil berhasil diubah']);
}
}
