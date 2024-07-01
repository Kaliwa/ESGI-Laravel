<?php

namespace App\Http\Controllers;

use App\Exports\PostExport;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class PostExportController extends Controller
{
    public function export(): BinaryFileResponse
    {
        return Excel::download(new PostExport(), 'posts.csv');
    }
}
