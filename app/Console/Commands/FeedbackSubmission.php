<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\WhatsappScheduler;
use App\Helpers\LogHelper;
use App\Helpers\Helper;
use App\Models\MessageHistory;
use App\Models\SubscribeUser;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Models\CarModel;
use App\Models\Menu;
use App\Models\ModelAssignMenu;
use App\Models\MenuLevelMap;
use App\Models\UserAnalytics;

class FeedbackSubmission extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'feedback:submission';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test drive feedback submission';

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
        // self::$token = Helper::getRmlAuthToken();
        $env = Config('app.env');
        $mobin = ['7357908936','8955164732'];
        DB::table('subscribe_users')->where('optin','subscribed')->orderBy('created_at','desc')->chunk(20, function($data) use($mobin)
        {
            $mobileArray = array();
            // $last20Hours = Carbon::now('Asia/Kolkata')->subHours(45)->format('Y-m-d H:i:s');
            // $last23Hours = Carbon::now('Asia/Kolkata')->subHours(48)->format('Y-m-d H:i:s');
            foreach ($data as $key=>$val)
            {
                $env = Config('app.env');
                $tempData = MessageHistory::where('mobile', $val->mobile)->where('model_name','!=','report')->orderBy('id','desc')->get()->first();
                $status = '';   
                if ($env == 'production' || in_array($form->mobile, $mobin) && $status == 'td_provided'){
                    $this->sendFeedbackMessage($val->mobile, $tempData->model_name, $tempData->lead_id);
                }  
            }           
        });
        echo 'done'."\n"; 

        return 0;
    }

    private function sendFeedbackMessage($mobile, $model, $lead_id) {


        try {
            $level = 0;
            $parent_id = 0;
            
            $model_name = CarModel::where('model_crm',$model)->where('status',1)->first('model');
            
            $tempn = 'feedback_message_verbiage_1';
					    	$req = [
				                "phone" => "+91".$mobile,
				                "media" => [
				                    "type" => "media_template",
				                    "lang_code" => "en",
				                    "template_name" => $tempn,
                                    "body"=> [
                                        [
                                            "text"=>$model_name->model
                                        ]
                                    ]
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
				            $message_history_id = MessageHistory::create([
                                'lead_id' => $lead_id,
					            'model_name' => $model, 
					            'request_id' => $reqidd, 
					            'mobile' => $mobile, 
								'message' => $tempn,
								'is_bot' => 1,
								'level' => $level,
								'response' => json_encode($res),
								'parent_id' => $parent_id
					        ])->id;

                            if(isset($message_history_id) && $message_history_id > 0){
            
                                UserAnalytics::create([
                                    'message_history_id' => $message_history_id, 
                                    'menu_id' => 0, 
                                    'mobile' => $mobile, 
                                    'message' => 'feedback_message_verbiage_1', 
                                ]);
                            }
                            
				            $info = isset($res['message']) ? $res['message'] : '';
				            LogHelper::log('scheduler:feedbackSubmission', $info, 'info');
			
        } catch (\Exception $e) {
            LogHelper::log('scheduler:feedbackSubmission', $e->getMessage(), 'exception');
        }

        return true;
    }
}
