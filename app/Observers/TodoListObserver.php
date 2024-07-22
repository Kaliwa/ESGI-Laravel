<?php

namespace App\Observers;

use App\Models\TodoList;

class TodoListObserver
{
    public function creating(TodoList $todo)
    {
        // Code à exécuter avant la création d'un TodoList
        \Log::info('Creating a new TodoList:', ['title' => $todo->title, 'group_id' => $todo->group_id]);
    }

    public function created(TodoList $todo)
    {
        // Code à exécuter après la création d'un TodoList
        \Log::info('TodoList created:', ['id' => $todo->id, 'title' => $todo->title]);
    }

    public function updating(TodoList $todo)
    {
        // Code à exécuter avant la mise à jour d'un TodoList
        \Log::info('Updating TodoList:', ['id' => $todo->id, 'title' => $todo->title]);
    }

    public function updated(TodoList $todo)
    {
        // Code à exécuter après la mise à jour d'un TodoList
        \Log::info('TodoList updated:', ['id' => $todo->id, 'title' => $todo->title]);
    }

    public function deleting(TodoList $todo)
    {
        // Code à exécuter avant la suppression d'un TodoList
        \Log::info('Deleting TodoList:', ['id' => $todo->id, 'title' => $todo->title]);
    }

    public function deleted(TodoList $todo)
    {
        // Code à exécuter après la suppression d'un TodoList
        \Log::info('TodoList deleted:', ['id' => $todo->id]);
    }

    // Vous pouvez ajouter d'autres méthodes pour les événements restants
}
