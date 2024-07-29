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
            'id',
            'uuid',
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
            'office_address',
            'created_at',
            'deleted_at',
            'updated_at',
            '',
            'id',
            'uuid',
            'industry_id',
            'contact_name',
            'designation',
            'mobile',
            'email_id',
            'created_at',
            'updated_at'
        ];
    }

    public function map($industry): array
    {
        $rows = [];
        $firstRow = true;

        //   Assuming $industries is an array of industry objects
        foreach ($industry->contacts as $contact) {
            if ($firstRow) {
                $rows[] = [
                    $industry->id,
                    $industry->uuid,
                    $industry->advertisment_image,
                    $industry->area_id,
                    $industry->category_id,
                    $industry->industry_name,
                    $industry->contact_no,
                    $industry->address,
                    $industry->email,
                    $industry->product,
                    $industry->by_product,
                    $industry->raw_material,
                    $industry->industry_type,
                    $industry->web_link,
                    $industry->office_address,
                    $industry->created_at,
                    $industry->deleted_at,
                    $industry->updated_at,
                    '  ', // Add contact information here
                    $contact->id,
                    $contact->uuid,
                    $contact->industry_id,
                    $contact->contact_name,
                    $contact->designation,
                    $contact->mobile,
                    $contact->email_id,
                    $contact->created_at,
                    $contact->updated_at
                ];
                $firstRow = false;
            } else {
                $rows[] = [
                    '--',
                    '--',
                    '--',
                    '--',
                    '--',
                    '--',
                    '--',
                    '--',
                    '--',
                    '--',
                    '--',
                    '--',
                    '--',
                    '--',
                    '--',
                    '--',
                    '--',
                    '--',
                    '  ', // Add contact information here
                    $contact->id,
                    $contact->uuid,
                    $contact->industry_id,
                    $contact->contact_name,
                    $contact->designation,
                    $contact->mobile,
                    $contact->email_id,
                    $contact->created_at,
                    $contact->updated_at
                ];
            }
        }
        $firstRow = true; // Reset for the next industry

        return $rows;
    }
}
