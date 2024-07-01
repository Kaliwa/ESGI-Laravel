<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Models\Message;
use Illuminate\View\View;

class WallController extends Controller
{
    public function dashboard(): View
    {
        $messages = Message::orderByDesc("created_at")->paginate(3);
        return view('dashboard', ["messages" => $messages]);
    }

    public function write(Request $request): RedirectResponse
    {
        $message = new Message();
        $message->user_id = Auth::id(); // Utilisez user_id à la place de author
        $message->message = $request->message;
        $message->save();

        return redirect()->route('dashboard');
    }

    public function updateMessage(Request $request): RedirectResponse
    {
        $message = Message::findOrFail($request->id);
        abort_if($message->user_id != Auth::id(), 403); // Utilisez user_id à la place de author
        $message->message = $request->message;
        $message->save();

        return redirect()->route('dashboard');
    }



    public function editMessageForm(Request $request): View
    {
        $message = Message::findOrFail($request->id);
        return view('editMessageForm', ["message" => $message]);
    }


    public function delete(Request $request): RedirectResponse
    {
        $message = Message::findOrFail($request->id);
        abort_if($message->user_id != Auth::id(), 403);
        $message->delete();

        return Redirect::route('dashboard')->with("status", "Message updated");
    }



}
