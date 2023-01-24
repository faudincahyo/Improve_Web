<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;


class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $google_user = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect()->route('dashboard');
        }

            $finduser = User::where('social_id', $google_user->id)->first();

            if($finduser){
                Auth::login($finduser, true);
                $role=Auth::user()->role;

                if($role == 'admin'){
                    return redirect()->route('dashboard');
                }else{
                    return redirect()->route('homeuser');
                }

            }else{
            $newUser = User::create([
                'name' => $google_user->name,
                'email' => $google_user->email,
                'social_id' => $google_user->id,
                'social_type'=> 'google',
                'role' => 'user',
                'password' => encrypt('my-google')
            ]);

                Auth::login($newUser);
                return redirect()->route('dashboard');
            }


    }
}
