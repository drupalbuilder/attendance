<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\EmiPlanEmail;
use App\Models\BmwDealer;
use Illuminate\Support\Facades\DB;
use App\Mail\EmiEmailNotification;
use Illuminate\Support\Facades\Log;
use Mail;

class EmiNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:EmiPlanEmail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Email Notification to Dealer for Emi Plans';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $data = EmiPlanEmail::join('lms_forms', 'emi_plan_emails.lead_id', '=', 'lms_forms.id')->select('emi_plan_emails.id','emi_plan_emails.plan', 'emi_plan_emails.created_at', 'lms_forms.first_name', 'lms_forms.last_name', 'lms_forms.email', 'lms_forms.model_name', 'lms_forms.model_crm_name', 'lms_forms.dealer_code', 'lms_forms.mobile')->where('emi_plan_emails.status', 1)->get();

        $formatted_data = [];
        $ids = [];
        foreach($data as $node) {
            $formatted_data[$node->dealer_code][] = $node;
            $ids[] = $node->id;
        }

        $emails = Config('credentials.dealer_emails');

        EmiPlanEmail::whereIn('id', $ids)->update(['status' => 0]);
        $cc_email = ['saransh.dewan@bmw.in', 'neha.kalia@bmw.in', 'connectconaveen@gmail.com'];
        $dealers = BmwDealer::all();
        foreach($dealers as $dealer) {
            if (!empty($emails[$dealer->dealer_code]) && isset($formatted_data[$dealer->dealer_code])) {
                $params['dealer_name'] = $dealer->dealer_name;
                $params['dealer_code'] = $dealer->dealer_code;
                $params['data'] = $formatted_data[$dealer->dealer_code];
                Mail::to($emails[$dealer->dealer_code])->cc($cc_email)->send(new EmiEmailNotification($params));
                // Mail::to(['ashish.bancart@gmail.com', 'ashutoshsaxena143@gmail.com', 'manuj.sasspal@digitigi.com'])->send(new EmiEmailNotification($params));
            }
        }
        Log::info("EmiNotification:".json_encode($formatted_data));
        
        return 0;
    }
}