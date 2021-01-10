<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\ChangePasswordRequest;
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

    public function updateProfilePhoto(Request $request) {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        Auth::user()->updateProfilePhoto($request->photo);

        return back()->with('message', 'You have successfully upload image.');
    }

    public function changePassword(ChangePasswordRequest $request) {
        User::find(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return redirect('/profile')->with('message', 'Password change successfully');
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
