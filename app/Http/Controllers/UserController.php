<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\UserUpdateRequest;
use App\Http\Requests\UserUpdateMyProfile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function update(UserUpdateMyProfile $request)
    {
        // dd('dfdsf');
        $user = auth()->user();
        $user->update($request->except('profile_pic', 'password'));
        if (isset($request['profile picture'])) {
            $image = Storage::put('users_images', $request->file('profile picture'));
            $imagePath = Storage::url($image);
            $user->profile_pic = $image;
            $user->save();
        }
        $user->password = bcrypt($request['password']);
        $user->save();

        return redirect('/my-profile')->with('success', 'Profile Updated!');
    }
}