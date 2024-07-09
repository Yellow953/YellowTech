<?php

namespace App\Exports;

use App\Models\Ticket;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TicketsExport implements FromCollection, WithHeadings
{
    protected $ids;

    public function __construct($ids)
    {
        $this->ids = $ids;
    }

    public function collection()
    {
        return Ticket::whereIn('id', $this->ids)->select('name', 'description')->get();
    }

    public function headings(): array
    {
        return [
            'Name',
            'Description',
        ];
    }
}

