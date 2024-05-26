<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class UserController extends Controller
{
    function redirectGoogle(){
        return Socialite::driver('google')->redirect();
    }
    function callbackGoogle(){
        $user = Socialite::driver('google')->user();
        // dd($user);

        $existUser = User::where('google_id', $user->id)->first();

        if ($existUser){
            Auth::login($existUser);
        }else{
            $newUser = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'google_id' => $user->id
            ]);
            Auth::login($newUser);
        }

        return redirect('/dashboard');
    }
    function redirectGithub(){
        return Socialite::driver('github')->redirect();
    }
    function callbackGithub(){
        $user = Socialite::driver('github')->user();
        // dd($user);

        $existUser = User::where('github_id', $user->id)->first();

        if ($existUser){
            Auth::login($existUser);
        }else{
            $newUser = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'github_id' => $user->id
            ]);
            Auth::login($newUser);
        }

        return redirect('/dashboard');
    }
    function redirectFacebook(){
        return Socialite::driver('facebook')->redirect();
    }
    function callbackFacebook(){
        $user = Socialite::driver('facebook')->user();
        // dd($user);

        $existUser = User::where('facebook_id', $user->id)->first();

        if ($existUser){
            Auth::login($existUser);
        }else{
            $newUser = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'facebook_id' => $user->id
            ]);
            Auth::login($newUser);
        }

        return redirect('/dashboard');
    }
}
