<?php

namespace App\Exports;

use App\Models\Message;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PostExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Message::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Message',
            'Created At',
            'Updated At',
        ];
    }
}
