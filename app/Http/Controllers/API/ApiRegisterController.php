<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\User;

class ApiRegisterController extends Controller
{
    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'name'  => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('users')
            ],
            'phone_number' => 'required',
            'address' => 'required',
            'password' => 'required|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->address = $request->address;
        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json(['message' => 'Akun Berhasil Di Buat'], 201);
    }
}
