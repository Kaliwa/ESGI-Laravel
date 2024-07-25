<?php

namespace App\Http\Controllers;

use App\Exports\TodoListExport;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class PostExportController extends Controller
{
    public function export($groupId): BinaryFileResponse
    {
        return Excel::download(new TodoListExport($groupId), 'todolist.csv');
    }
}
