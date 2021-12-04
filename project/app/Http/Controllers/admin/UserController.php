<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::select('id', 'name', 'email', 'profile_photo_path')->where('role_id', '2')->paginate(25);
        return View('admin.user.users', ['users' => $users]);
    }

    public function admins()
    {
        $users = User::select('id', 'name', 'email', 'profile_photo_path')->where('role_id', '1')->paginate(25);
        return View('admin.user.users', ['users' => $users]);
    }

    public function create()
    {
        return View('admin.user.create');
    }

    public function store(StoreUserRequest $request)
    {
        User::create($request->all());
        return back()->with('message', 'Added successfully!');
    }

    public function edit(User $user)
    {
        return View('admin.user.edit', ['user' => $user]);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->all());
        session()->flash('message', 'User Updated Successfully');
        return back();
    }

    public function destroy(User $user)
    {
        $user->delete();
        session()->flash('success', 'User Deleted Successfully');
        return back();
    }
}
