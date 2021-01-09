<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Contracts\DeletesUsers;
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

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

        $user->update($request->all());

        session()->flash('message', 'Profile updated succesffully');

        return redirect('/profile');
    }

    public function destroy(Request $request) {
        $user = Auth::user();
        if(Hash::check($request->password, $user->password)) {
            $user->delete();
            Auth::logout();
            return redirect('/login');
        } else {
            return redirect('/profile')->with('error', 'Delete user failed');
        }
    }

}
