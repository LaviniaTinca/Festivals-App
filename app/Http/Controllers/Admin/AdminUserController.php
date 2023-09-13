<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserCreateRequest;
use App\Http\Requests\Admin\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminUserController extends Controller
{
    public function index()
    {
        return view('admin.users.index', [
            'users' => User::paginate(7),
        ]);
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(UserCreateRequest $request)
    {

        $user = User::create($request->except('profile_pic'));
        $user->password = bcrypt($request->password);
        $image = Storage::put('users_images', $request->file('profile_pic'));
        $imagePath = Storage::url($image);
        $user->profile_pic = $image;
        $user->save();
        return redirect('/admin/users')->with('success', 'New User Created!');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', ['user' => $user]);
    }

    public function update(User $user, UserUpdateRequest $request)
    {
        $user->update($request->except('profile_pic'));
        if (isset($request['profile_pic'])) {
            $image = Storage::put('users_images', $request->file('profile_pic'));
            $imagePath = Storage::url($image);
            $user->profile_pic = $image;
            $user->save();
        }
        return redirect('/admin/users')->with('success', 'User Updated!');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect('/admin/users')->with('success', 'User Deleted!');
    }
}
