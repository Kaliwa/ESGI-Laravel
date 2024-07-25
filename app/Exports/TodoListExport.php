<?php

namespace App\Exports;

use App\Models\TodoList;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TodoListExport implements FromCollection, WithHeadings
{
    protected $groupId;

    public function __construct($groupId)
    {
        $this->groupId = $groupId;
    }

    public function collection()
    {
        return TodoList::where('group_id', $this->groupId)->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Title',
            'Group ID',
        ];
    }
}
