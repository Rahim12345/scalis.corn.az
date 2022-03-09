<?php

namespace App\Http\Controllers\sign;

use App\Http\Controllers\Controller;
use App\Http\Requests\loginRequest;
use App\Mail\SignUp;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class sign_in_upController extends Controller
{
    public function login()
    {
        return view('sign.login');
    }

    // Login etmək üçün control etdim
    public function loginPost ( loginRequest $request )
    {
        if ( Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            if ( $request->remember_me === 'on' )
            {
                Cookie::queue(
                    Cookie::make( 'email', $request->email, 10 * 365 * 24 * 60 )
                );

                Cookie::queue(
                    Cookie::make( 'password', $request->password, 10 * 365 * 24 * 60 )
                );

                Cookie::queue(
                    Cookie::make( 'rememberMe', 'checked', 10 * 365 * 24 * 60 )
                );
            }
            else
            {
                Cookie::queue(
                    Cookie::forget( 'email' )
                );

                Cookie::queue(
                    Cookie::forget( 'password' )
                );

                Cookie::queue(
                    Cookie::forget( 'rememberMe' )
                );
            }
            auth()->loginUsingId( \auth()->user()->id, TRUE );
            toastr()->success(__( 'login.welcome' ) );
            return redirect()->route( 'back.dashboard' );
        } else {
            return view( 'sign.login' );
        }

    }

    //Logout edirəm
    public function logout ( Request $request )
    {
        auth()->logout();

        return redirect()->route( 'login' );
    }
}
