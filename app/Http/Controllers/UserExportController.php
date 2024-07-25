<?php

namespace App\Http\Controllers;

use App\Exports\UserExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class UserExportController extends Controller
{
    public function export(): BinaryFileResponse
    {
        $user = Auth::user();
        $groupId = $user->active_group_id;
        
        return Excel::download(new UserExport($groupId), 'users.csv');
    }
}
