<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;

class LoginController extends Controller
{
    public function login(Request $request){
        if(!Auth::attempt(['email' => $request->email, 'password' => $request->password]))
            return response()->json('Credential salah', 401);
        else
            return response()->json('OK', 200);
    }
}
