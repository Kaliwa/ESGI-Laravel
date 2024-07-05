<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{
    public function index()
    {
        $groups = Group::all();
        return view('groups.index', compact('groups'));
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
}
