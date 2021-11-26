<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Message;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::paginate(25);
        return View('admin.message.index', ['messages' => $messages]);
    }

    public function delete(Message $message)
    {
        $message->delete();
        return back();
    }
}
