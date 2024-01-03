<?php

namespace App\Exports;

use App\UserAnalytics;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;


class DealerwiseCallbackInfoExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function headings(): array
    {
        return [
            'Dealer Name',
            'Total Callback' ,
        ];
    }

    public function collection()
    {
        $totalcallbackarray = array('If you\'re interested in the offer shared and would like a call back from BMW','speak_representative','Request a Call back');

        $dealerwisecallback = DB::table('lms_forms')
        ->join('bmw_dealers', 'bmw_dealers.dealer_id', '=', 'lms_forms.dealer_id')
        ->join('message_histories', 'message_histories.model_name', '=', 'lms_forms.model_crm_name')
        ->join('user_analytics', 'user_analytics.message_history_id', '=', 'message_histories.id')
        ->select('dealer_name', DB::raw('count(user_analytics.message) as total'))
        ->whereIn('user_analytics.message', $totalcallbackarray)
        ->groupBy('dealer_name')->get();


        return $dealerwisecallback;
    }
}
