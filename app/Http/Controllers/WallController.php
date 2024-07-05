<?php

namespace App\Http\Controllers;

use App\Models\TodoList;
use Illuminate\Support\Facades\Auth;

class WallController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        $groups = $user->groups()->get();

        // Récupérer les todos pour le groupe actif de l'utilisateur
        $todos = [];
        if ($user->active_group_id) {
            $todos = TodoList::where('group_id', $user->active_group_id)->get();
        }

        return view('dashboard', compact('groups', 'user', 'todos'));
    }
}
