<?php

namespace App\Exports;

use App\UserAnalytics;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;

class FinanceInfoExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function headings(): array
    {
        return [
            'Message',
            'Total' ,
        ];
    }

    public function collection()
    {
        $financeinfoarray = array('Special Offers','EMI Calculator');

        $financeAnalysis = DB::table('user_analytics')
        ->select('message', DB::raw('count(message) as total'))
        ->whereIn('message', $financeinfoarray)
        ->groupBy('message')->get();

        return $financeAnalysis;
    }
}
