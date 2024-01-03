<?php

namespace App\Exports;

use App\Models\LmsForm;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Http\Controllers\Admin\ProspectController;
use Session;

class LmsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            'Lead Id',
            'Brand Name' ,
            'Series Name',
            'Model Name',
            'Model Url',
            'Model Crm Name',
            'Outlet Id',
            'Dealer Id',
            'Dealer Code',
            'Outlet City',
            'Salutation',
            'First Name',
            'Last Name',
            'Email',
            'Mobile',
            'Request Type',
            'Leadsource Key',
            'Leadsource Value',
            'Campaign Name',
            'Platform',
            'Sales Stage',
            'Status',
            'Lead Date',
            'Lead Updated Date'
        ];
    }

    public function collection()
    {
        $data = Session::get('exportData');
        $lmslists = ProspectController::getFormatedData($data);

        return $lmslists->get();
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $sheet->freezeFirstRow();
            },
        ];
    }
}
