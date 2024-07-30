<?php

namespace App\Http\Controllers;

use App\Exports\IndustryContactExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class ExportController extends Controller
{
    public function export()
    {
        return Excel::download(new IndustryContactExport, 'industries_details.xlsx');
    }
}
