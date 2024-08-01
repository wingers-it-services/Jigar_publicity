<?php

namespace App\Exports;

use App\Models\IndustryDetail;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class IndustryContactExport implements FromCollection, WithHeadings, WithMapping, WithStyles
{
    protected $industryFields = [
        'advertisment_image',
        'area_id',
        'category_id',
        'industry_name',
        'contact_no',
        'address',
        'email',
        'product',
        'by_product',
        'raw_material',
        'industry_type',
        'web_link',
        'office_address'
    ];

    protected $contactFields = [
        'contact_name',
        'designation',
        'mobile',
        'email_id'
    ];

    public function collection()
    {
        return IndustryDetail::with(['contacts', 'areas', 'categories'])->get();
    }

    public function headings(): array
    {
        $industryHeadings = $this->updateHeadings();
        return array_merge($industryHeadings, [''], $this->contactFields);
    }

    public function map($industry): array
    {
        $rows = [];
        $industryData = $this->getIndustryData($industry);
        $blankColumn = [''];
        $firstContact = true;

        if ($industry->contacts->isNotEmpty()) {
            foreach ($industry->contacts as $contact) {
                $contactData = $this->getContactData($contact);
                if ($firstContact) {
                    $rows[] = array_merge($industryData, $blankColumn, $contactData);
                    $firstContact = false;
                } else {
                    $rows[] = array_merge(array_fill(0, count($this->industryFields), '--'), $blankColumn, $contactData);
                }
            }
        } else {
            $rows[] = array_merge($industryData, $blankColumn, array_fill(0, count($this->contactFields), '--'));
        }

        return $rows;
    }



    private function updateHeadings(): array
    {
        $headings = $this->industryFields;
        $headings[array_search('area_id', $headings)] = 'area';
        $headings[array_search('category_id', $headings)] = 'category';
        return $headings;
    }

    private function getIndustryData($industry): array
    {
        return array_map(function ($field) use ($industry) {
            if ($field === 'advertisment_image') {
                return url($industry->advertisment_image);
            }
            if ($field === 'area_id') {
                return $industry->areas->area_name ?? '--';
            }
            if ($field === 'category_id') {
                return $industry->categories->category_name ?? '--';
            }
            return $industry->$field;
        }, $this->industryFields) + [''];
    }

    private function getContactData($contact): array
    {
        return array_map(function ($field) use ($contact) {
            return $contact->$field;
        }, $this->contactFields);
    }

    public function styles(Worksheet $sheet)
    {
        // Bold the header row
        $sheet->getStyle('1:1')->getFont()->setBold(true);

        // Freeze the header row
        $sheet->freezePane('A2');
    }
}
