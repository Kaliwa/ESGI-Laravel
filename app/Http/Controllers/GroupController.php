<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class GroupController extends Controller
{
    public function index()
    {
	$user = Auth::user();

        $groups = $user->groups;

        return view('groups.index', compact('groups', 'user'));

    }

    public function update(Request $request, Group $group)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
        ]);

        $group->name = $request->input('name');
        $group->description = $request->input('description');
        $group->save();

        return redirect()->route('groups.index')->with('success', 'Groupe mis à jour avec succès.');
    }

    public function create()
    {
        return view('groups.create');
    }

    public function selectGroup(Request $request)
    {
        $user = Auth::user();
        $groupId = $request->input('active_group_id');
        $user->active_group_id = $groupId;
        $user->save();

        return redirect()->route('dashboard');
    }


    public function show(Group $group)
    {
        return view('groups.show', compact('group'));
    }

    public function edit(Group $group)
    {
        return view('groups.edit', compact('group'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $group = new Group();
        $group->name = $request->name;
        $group->description = $request->description;
        $group->save();

        $user->groups()->attach($group->id);


        $user->active_group_id = $group->id;
        $user->save();

        return redirect()->route('dashboard')->with('success', 'Todo created successfully.');
    }


    public function destroy(Group $group)
    {
        $group->delete();
        return redirect()->route('groups.index');
    }
    public function showAddUsersForm(Group $group)
    {
        // Récupérez tous les utilisateurs sauf ceux déjà membres du groupe
        $users = User::whereDoesntHave('groups', function($query) use ($group) {
            $query->where('group_id', $group->id);
        })->get();

        return view('groups.add_users', compact('group', 'users'));
    }

    public function addUsers(Request $request, Group $group)
    {
        // Validez les entrées
        $request->validate([
            'user_ids' => 'required|array',
            'user_ids.*' => 'exists:users,id',
        ]);

        // Attachez les utilisateurs au groupe
        $group->users()->attach($request->input('user_ids'));

        return redirect()->route('groups.addUsers', $group->id)->with('success', 'Utilisateurs ajoutés au groupe avec succès.');
    }

}
