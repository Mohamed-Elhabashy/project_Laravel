<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::where('role_id', '2')->count();
        $messages = Message::count();
        return View('admin.index', ['users' => $users, 'messages' => $messages]);
    }
}
