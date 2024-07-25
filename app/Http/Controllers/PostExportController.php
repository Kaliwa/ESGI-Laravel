<?php

namespace App\Http\Controllers;

use App\Exports\TodoListExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class PostExportController extends Controller
{
    public function export(): BinaryFileResponse
    {
        $user = Auth::user();
        $groupId = $user->active_group_id;
        
        return Excel::download(new TodoListExport($groupId), 'todolist.csv');
    }
}
