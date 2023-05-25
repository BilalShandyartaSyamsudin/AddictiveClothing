<?php

namespace App\Http\Controllers\page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class profileController extends Controller
{
    
    public function index()
    {
         $user = User::findOrFail(Auth::id());

        return view('profile.profile', compact('user'));
    }
    public function ubah(){
        return view('profile.ubahprofil');
    }

}
