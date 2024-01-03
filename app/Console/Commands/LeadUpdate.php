<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Helpers\LogHelper;
use App\Helpers\Helper;
use App\Models\LmsForm;
use Carbon\Carbon;

class LeadUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lead:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Lead update from CRM api in our database';

    /**
     * The token from CRM.
     *
     * @var string
     */
    private static $token = '';

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
        $url = Config('credentials.crm_baseurl') . Config('credentials.crm_apiuri') . 'leads';
        $last45days = Carbon::now()->subDays(45)->format('Y-m-d');
        $forms = LmsForm::whereDate('created_at', '<', $last45days)->get()->all();
        self::$token = Helper::getCRMAuthToken();
        foreach ($forms as $lead) {
            $model_url = $lead->model_url;
            $model = explode('-', $model_url);
            $model = end($model);
            $mobile = $lead->mobile;
            $city = $lead->outlet_city;

            $req = [
                '$select' => 'statecode,bmw_salesstage',
                '$filter' => 'endswith(mobilephone,\''. $mobile .'\') and contains(address1_city, \''. $city . '\') and contains(bmw_model, \''. $model . '\')',
            ];

            $response = Http::contentType('application/json')->withHeaders([
                'Authorization' => 'Bearer ' . self::$token
            ])->get($url, http_build_query($req));

            $res = $response->json();
            if ($response->successful()) {
                LogHelper::log('scheduler:lead:update', $mobile . '-------' . $response->status(), 'info');
                $data = $res['value'];
                foreach ($data as $op) {
                    $status = $op['statecode'];
                    $bmw_salesstage = $op['bmw_salesstage'];
                    $lead->status = $status;
                    $lead->sales_stage = $bmw_salesstage;
                    $lead->save();
                }
            } else {
                LogHelper::log('scheduler:lead:update', $mobile . '-------' . $res['error']['message'] . ' status:'. $response->status(), 'error');
            }
        }

    }
}
