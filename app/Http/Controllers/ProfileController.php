<?php

namespace App\Http\Controllers;

use Auth;
use App\Http\Requests\UpdateProfileRequest;

class ProfileController extends Controller
{

    public function index() {
        $data = [
            'user' => Auth::user()
        ];

        return view('profile.index', $data);
    }

    public function update(UpdateProfileRequest $request) {
        $user = Auth::user();

        dd($request->all());
    }

}
