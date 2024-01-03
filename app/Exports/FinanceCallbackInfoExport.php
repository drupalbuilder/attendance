<?php

namespace App\Exports;

use App\UserAnalytics;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;

class FinanceCallbackInfoExport implements FromCollection, WithHeadings
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
        $callbackratioarray = array('If you\'re interested in the offer shared and would like a call back from BMW','speak_representative');

        $callbackanalysis = DB::table('user_analytics')
        ->select('message', DB::raw('count(message) as total'))
        ->whereIn('message', $callbackratioarray)
        ->groupBy('message')->get();

        return $callbackanalysis;
    }
}
