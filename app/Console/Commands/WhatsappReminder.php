<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\LmsForm;
use App\Models\WhatsappScheduler;
use Illuminate\Support\Facades\Http;
use App\Helpers\LogHelper;
use App\Helpers\Helper;
use App\Models\CarModel;
use App\Models\ModelAssignMenu;
use App\Models\Menu;
use App\Models\MessageHistory;
use App\Models\SubscribeUser;
use App\Models\MenuLevelMap;
use App\Models\BmwDealer;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class WhatsappReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'whatsapp:reminder-msg';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send whatsapp reminder message to customer';

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
        $env = Config('app.env');
        $mobin = ['9873751240', '9555483332', '7042154089','7357908936','8955164732'];

        DB::table('subscribe_users')->where('optin','subscribed')->orderBy('created_at','desc')->chunk(20, function($data) use($mobin)
        {
            $mobileArray = array();
            $last20Hours = Carbon::now('Asia/Kolkata')->subHours(45)->format('Y-m-d H:i:s');
            $last23Hours = Carbon::now('Asia/Kolkata')->subHours(48)->format('Y-m-d H:i:s');
            // print_r($last20Hours); print_r($last23Hours); exit();
            $env = Config('app.env');
            foreach ($data as $key=>$val)
            {
                $tempData = MessageHistory::where('mobile', $val->mobile)->where('model_name','!=','report')->orderBy('id','desc')->get()->first();
                $emicalcreminder = strpos($tempData->message, 'speak_representative') !== FALSE ? true : false;
			    $spofferreminder = strpos($tempData->message, 'interested in the offer shared and would like a call back') !== FALSE ? true : false;
                $servicecalcreminder = strpos($tempData->message, 'service_calculator') !== FALSE ? true : false;

                $temp = isset($tempData->created_at)?$tempData->created_at->__toString():Carbon::now()->format('Y-m-d H:i:s');
                if( strtotime($temp) < strtotime($last20Hours) && strtotime($temp) > strtotime($last23Hours)){
                    \DB::statement("SET SQL_MODE=''");
                    $forms = LmsForm::where('mobile', $val->mobile)->groupBy('mobile')->get()->all();
                    foreach ($forms as $key=>$form) {
                        if ($env == 'production' || in_array($form->mobile, $mobin) && $tempData->count < 2 && ($emicalcreminder || $spofferreminder || $servicecalcreminder) ){
                            $this->sendReminderMessage($form->mobile, $form->model_crm_name, $form->id);
                        }
                    }
                }
            }           
        });
        echo 'done'."\n"; 

        return 0;
    }

    private function sendReminderMessage($mobile, $model, $lead_id) {
        
        try {
            $level = 0;
            $parent_id = 0;
            $tempn = 'financial_solution';
					    	$req = [
				                "phone" => "+91".$mobile,
				                "media" => [
				                    "type" => "media_template",
				                    "lang_code" => "en",
				                    "template_name" => $tempn
				                ]
				            ];
                            $token = Helper::getRmlAuthToken();
                            $murl = Config('credentials.rml_apiurl') . 'wba/v1/messages';
                            $host = Config('credentials.app_host');
				            $response = Http::contentType('application/json')->withHeaders([
				                'Content-Length' => strlen(json_encode($req)),
				                'Host' => $host,
				                'Authorization' => $token
				            ])->post($murl, $req);

				            $res = $response->json();
				            $reqidd = isset($res['request_id']) ? $res['request_id'] : '';
				            MessageHistory::create([
                                'lead_id' => $lead_id,
					            'model_name' => $model, 
					            'request_id' => $reqidd, 
					            'mobile' => $mobile, 
								'message' => $tempn,
								'is_bot' => 1,
								'level' => $level,
								'response' => json_encode($res),
								'parent_id' => $parent_id
					        ]);
				            $info = isset($res['message']) ? $res['message'] : '';
				            LogHelper::log('scheduler:customercall', $info, 'info');
			
        } catch (\Exception $e) {
            LogHelper::log('scheduler:customercall', $e->getMessage(), 'exception');
        }

        return true;
    }
}
