<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{
    public function viewLoggedInUser(Request $request)
    {
        $userId = Auth::id();
        $user = User::find($userId);
        return response()->json($user);
    }
}
