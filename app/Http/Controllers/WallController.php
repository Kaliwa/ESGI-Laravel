<?php

namespace App\Http\Controllers;

use App\Models\TodoList;
use App\Models\Group;
use Illuminate\Support\Facades\Auth;

class WallController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        $groups = $user->groups()->get();

        // Récupérer le groupe actif de l'utilisateur
        $activeGroup = $user->activeGroup;

        // Récupérer les todos pour le groupe actif de l'utilisateur
        $todos = [];
        if ($activeGroup) {
            $todos = TodoList::where('group_id', $activeGroup->id)->get();

            // Récupérer les utilisateurs pour le groupe actif
            $users = $activeGroup->users;
        } else {
            $users = collect(); // Si aucun groupe actif, crée une collection vide
        }

        return view('dashboard', compact('groups', 'user', 'todos', 'users'));
    }
}
