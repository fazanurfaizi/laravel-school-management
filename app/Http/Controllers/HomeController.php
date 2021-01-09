<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['verified', 'password.confirm', '2fa']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Reauthenticate Google2FA
     */
    public function reauthenticate(Request $request) {
        $user = Auth::user();

        $google2fa = app('pragmarx.google2fa');

        $user->google2fa_secret = $google2fa->generateSecretKey();
        $user->save();

        $QRImage = $google2fa->getQRCodeInline(
            config('app.name'),
            $user->email,
            $user->google2fa_secret
        );

        return view('google2fa.register', [
            'QRImage' => $QRImage,
            'secret' => $user->google2fa_secret,
            'reauthenticating' => true
        ]);
    }
}
