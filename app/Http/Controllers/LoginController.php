<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function guestLogin() {
        $guestUser = User::where('email', 'guest@guest.com')->first();
    
        if (!$guestUser) {
            return redirect('/login')->with('error', 'ゲストユーザーが存在しません。');
        }
    
        Auth::login($guestUser);
        return redirect('/');
    }

}
