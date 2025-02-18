<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    public function redirect(){
        return Socialite::driver('google')->stateless()->redirect();
    }
    public function callback(){
        $googleUser = Socialite::driver('google')->stateless()->user();
        $user = User::firstOrCreate(
            ['google_id' => $googleUser->id],
            [
                'name' => $googleUser->name,
                'email'=> $googleUser->email,
                'password' => Hash::make(Str::random(12))
            ]
        );
        Auth::login($user);
        return redirect('dashboard')->with('success', 'Login Berhasil');
    }
}
