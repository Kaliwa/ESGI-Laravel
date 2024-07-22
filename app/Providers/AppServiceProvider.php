<?php

namespace App\Providers;

use App\Models\Group;
use Illuminate\Support\ServiceProvider;
use App\Models\TodoList;
use App\Observers\GroupObserver;
use App\Observers\TodoListObserver;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        TodoList::observe(TodoListObserver::class);
        Group::observe(GroupObserver::class);
    }
}
