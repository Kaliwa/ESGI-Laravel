<?php

namespace App\Observers;

use App\Models\Group;

class GroupObserver
{
    public function creating(Group $group)
    {
        // Code à exécuter avant la création d'un Group
        \Log::info('Creating a new Group:', ['name' => $group->name, 'description' => $group->description]);
    }

    public function created(Group $group)
    {
        // Code à exécuter après la création d'un Group
        \Log::info('Group created:', ['id' => $group->id, 'name' => $group->name]);
    }

    public function updating(Group $group)
    {
        // Code à exécuter avant la mise à jour d'un Group
        \Log::info('Updating Group:', ['id' => $group->id, 'name' => $group->name]);
    }

    public function updated(Group $group)
    {
        // Code à exécuter après la mise à jour d'un Group
        \Log::info('Group updated:', ['id' => $group->id, 'name' => $group->name]);
    }

    public function deleting(Group $group)
    {
        // Code à exécuter avant la suppression d'un Group
        \Log::info('Deleting Group:', ['id' => $group->id, 'name' => $group->name]);
    }

    public function deleted(Group $group)
    {
        // Code à exécuter après la suppression d'un Group
        \Log::info('Group deleted:', ['id' => $group->id]);
    }

}
