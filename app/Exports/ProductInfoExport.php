<?php

namespace App\Exports;

use App\UserAnalytics;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;

class ProductInfoExport implements FromCollection, WithHeadings
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
        $productinfoarray = array('Request product brochure','Build your BMW','Buy a BMW Online','Visit Website','Product Images and Video','Service Calculator','Spec sheet');
       
        $productInfoAnalysis = DB::table('user_analytics')
            ->select('message', DB::raw('count(message) as total'))
            ->whereIn('message', $productinfoarray)
            ->groupBy('message')->get();
           
        return $productInfoAnalysis;
    }
}
