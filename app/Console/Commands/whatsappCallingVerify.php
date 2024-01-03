<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Helpers\LogHelper;
use App\Helpers\Helper;
use App\Models\SubscribeUser;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;


class whatsappCallingVerify extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'whatsapp:verify';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Whatsapp number verify and update';

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
        try{
        $subscribeUser = SubscribeUser::where('optenabled', 'no')->where('count', '<' ,'7')->get();
        $contacts = array();
        foreach($subscribeUser as $key=>$mobile){
            $contacts[] = "+91".$mobile->mobile;
        }
        $c = json_encode($contacts);
        $req = [
            "contacts" => $contacts,
        ];
       
        $token = Helper::getRmlAuthToken();
        $murl = Config('credentials.rml_apiurl') . 'wba/v1/contacts';
        $host = Config('credentials.app_host');
        
        $response = Http::contentType('application/json')->withHeaders([
            'Content-Length' => strlen(json_encode($req)),
            'Host' => $host,
            'Authorization' => $token
        ])->post($murl, $req);
        
        $res = $response->json();
        if (isset($res['reason'])) {
            if ($res['reason'] == 'jwt token expired') {
                self::$token = Helper::getRmlAuthToken();
                Log::error("jwt token expired");
                return 0;
            }
            
            LogHelper::log('scheduler:whatsappCallingVerify', $res['reason'], 'error');
        } else {
            
            LogHelper::log('scheduler:whatsappCallingVerify', 'successfully run', 'info');
        if(isset($res['status']) && $res['status'] == 'success'){
            Log::info("Successfully run");
            if(isset($res['result']) && count($res['result']) > 0){
                foreach($res['result'] as $key=>$status){
                    if($status['status'] == 'valid'){
                        SubscribeUser::where('mobile', str_replace("+91","",$status['input']))
                        ->update(['optenabled' => 'yes']);
                    }else{
                        $temp = SubscribeUser::where('mobile', str_replace("+91","",$status['input']))->get('count')->toArray();
                        SubscribeUser::where('mobile', str_replace("+91","",$status['input']))
                        ->update(['count' => $temp[0]['count']+1]);
                    }
                }
            }
        }
    }
    }catch(\Exception $e){
        LogHelper::log('scheduler:whatsappCallingVerify', $e->getMessage(), 'exception');
        Log::error($e->getMessage());
    }
        return 0;
    }
}
