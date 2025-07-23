<?php

namespace App\Http\Controllers;

use App\Exports\ApplicationsExport;
use App\Exports\PetsExport;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    public function create()
    {
        return Excel::download(new class implements WithMultipleSheets
        {
            public function sheets(): array
            {
                return [
                    'Pets' => new PetsExport,
                    'Applications' => new ApplicationsExport,
                ];
            }
        }, 'Reports_'.now().'.xlsx');
    }
}
