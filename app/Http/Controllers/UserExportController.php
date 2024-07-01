<?php

namespace App\Http\Controllers;

use App\Exports\UserExport;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class UserExportController extends Controller
{
    public function export(): BinaryFileResponse
    {
        return Excel::download(new UserExport(), 'users.csv');
    }
}
