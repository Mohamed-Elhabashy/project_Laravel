<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::select('name', 'email', 'profile_photo_path')->where('role_id', '2')->paginate(25);
        return View('admin.user.users', ['users' => $users]);
    }

    public function admins()
    {
        $users = User::select('name', 'email', 'profile_photo_path')->where('role_id', '1')->paginate(25);
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
}
