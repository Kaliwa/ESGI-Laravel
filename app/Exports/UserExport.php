<?php

namespace App\Exports;

use App\Models\User;
use App\Models\Group;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UserExport implements FromCollection, WithHeadings
{
    protected $groupId;

    public function __construct($groupId)
    {
        $this->groupId = $groupId;
    }

    public function collection()
    {
        return User::whereHas('groups', function($query) {
            $query->where('group_id', $this->groupId);
        })->get(['name', 'email']);
    }

    public function headings(): array
    {
        return ['Name', 'Email'];
    }
}
