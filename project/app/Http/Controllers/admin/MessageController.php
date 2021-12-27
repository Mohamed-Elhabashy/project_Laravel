<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::paginate(25);
        return View('admin.message.index', ['messages' => $messages]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'subject' => 'required|string|max:50',
            'message' => 'required|string|max:191'
        ]);
        $data['user_id'] = auth()->user()->id;
        Message::create($data);
        return back();
    }

    public function delete(Message $message)
    {
        $message->delete();
        session()->flash('message', 'message delete Successfully');
        return back();
    }
}
