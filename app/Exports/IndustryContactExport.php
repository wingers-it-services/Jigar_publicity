<?php
namespace App\Exports;

use App\Models\IndustryDetail;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class IndustryContactExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return IndustryDetail::with('contacts')->get();
    }

    public function headings(): array
    {
        return [
            'Industry Name',
            'Industry Number',
            'Contact Name'
        ];
    }

    public function map($industry): array
    {
        $rows = [];
        $firstRow = true;

        foreach ($industry->contacts as $contact) {
            if ($firstRow) {
                $rows[] = [
                    $industry->industry_name,
                    $industry->contact_no,
                    $contact->contact_name
                ];
                $firstRow = false;
            } else {
                $rows[] = [
                    '--',
                    '--',
                    $contact->contact_name
                ];
            }
        }

        // Add an empty row for industries with no contacts to keep the structure consistent
        if (empty($rows)) {
            $rows[] = [
                $industry->industry_name,
                $industry->contact_no,
                ''
            ];
        }

        return $rows;
    }
}
