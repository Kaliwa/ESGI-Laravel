<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TodoList;
use Illuminate\Support\Facades\Auth;

class TodoListController extends Controller
{
    public function index()
    {
        $todos = TodoList::all();
        return view('todos.index', compact('todos'));
    }

    public function create()
    {
        return view('todos.create');
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $todo = new TodoList();
        $todo->title = $request->title;
        $todo->group_id = $user->active_group_id;
        $todo->save();

        return redirect()->route('todos.index')->with('success', 'Todo created successfully.');
    }

    public function show(TodoList $todo)
    {
        return view('todos.show', compact('todo'));
    }

    public function edit(TodoList $todo)
    {
        return view('todos.edit', compact('todo'));
    }

    public function update(Request $request, TodoList $todo)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $todo->update($request->all());

        return redirect()->route('todos.index')->with('success', 'Todo updated successfully.');
    }

    public function destroy(TodoList $todo)
    {
        $todo->delete();
        return redirect()->route('todos.index')->with('success', 'Todo deleted successfully.');
    }
}
