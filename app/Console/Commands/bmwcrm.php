<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Helpers\LogHelper;
use App\Helpers\Helper;
use App\Models\LmsForm;
use App\Models\CarModel;
use App\Models\MessageHistory;
use App\Models\SubscribeUser;
use App\Models\BmwDealer;
use App\Models\CrmScheduler;
use Carbon\Carbon;

class bmwcrm extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crm:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update whatsapp status in bmw CRM Api with reference to mobile.';

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
        try {
            $env = Config('app.env');
            $mobin = ['9873751240', '9555483332', '7042154089', '9910799766', '8285860138', '8955164732', '6677002171'];

            $urlcontacts = Config('credentials.crm_baseurl') . Config('credentials.crm_apiuri') . 'contacts';
            $urladdcontacts = Config('credentials.crm_baseurl') . Config('credentials.crm_apiuri') . 'bmw_additionalcontacts';
            $urlconsents = Config('credentials.crm_baseurl') . Config('credentials.crm_apiuri') . 'bmw_communicationconsents';

            $data = SubscribeUser::with('crm')->get();
            self::$token = Helper::getCRMAuthToken();
            foreach ($data as $v) {
                if (!(isset($v->crm['updated']) && $v->crm['updated'] == 1) && ($env == 'production' || in_array($v->mobile, $mobin))) {

                    $params = [
                        '$select' => 'bmw_messengerenabled,mobilephone,firstname,lastname',
                        '$filter' => 'mobilephone eq \'' . $v->mobile . '\''
                    ];

                    $response = Http::contentType('application/json')->withHeaders([
                        'Authorization' => 'Bearer ' . self::$token
                    ])->get($urlcontacts, http_build_query($params));
                    $bmw_messengerenabled = $v->optenabled == 'yes' ? true : false;
                    $bmw_messengeraccepted = $v->optin == 'subscribed' ? 174640000 : 174640001;
                    $res = $response->json();
                    //$messages = MessageHistory::where('is_crm', 0)->get();
                    if ($response->successful()) {
                        $data = $res['value'];
                        foreach ($data as $op) {
                            $req = [
                                "bmw_messengerenabled" => $bmw_messengerenabled,
                                "bmw_contactid@odata.bind" => "/contacts(".$op['contactid'].")"
                            ];

                            $response = Http::contentType('application/json')->withHeaders([
                                'Authorization' => 'Bearer ' . self::$token,
                                'Prefer' => 'return=representation'
                            ])->post($urladdcontacts, $req);

                            $res = $response->json();
                            if ($response->successful()) {
                                LogHelper::log('scheduler:crm:update', $v->mobile . '-------' . $response->status(), 'info');
                            } else {
                                LogHelper::log('scheduler:crm:update', $v->mobile . '-------' . $res['error']['message'], 'error');
                            }

                            $req = [
                                '$select' => 'bmw_messengeraccepted',
                                '$filter' => '_bmw_parentcontactid_value eq ' . $op['contactid']
                            ];

                            $response = Http::contentType('application/json')->withHeaders([
                                'Authorization' => 'Bearer ' . self::$token
                            ])->get($urlconsents, http_build_query($req));


                            $res = $response->json();
                            if ($response->successful()) {
                                LogHelper::log('scheduler:crm:update', $response->status(), 'info');
                                $req = [
                                    "bmw_messengeraccepted" => $bmw_messengeraccepted,
                                    "bmw_consentsyncflag" => true
                                ];
                                $cnstid = isset($res['value'][0]['bmw_communicationconsentid']) ? $res['value'][0]['bmw_communicationconsentid'] : '';
                                $urladdcontacts .= '(' . $cnstid .')?$select=bmw_messengeraccepted';

                                $response = Http::contentType('application/json')->withHeaders([
                                    'Authorization' => 'Bearer ' . self::$token,
                                    'Prefer' => 'return=representation'
                                ])->post($urladdcontacts, $req);

                                $res = $response->json();
                                if ($response->successful()) {
                                    LogHelper::log('scheduler:crm:update', $v->mobile . '-------' . $response->status(), 'info');
                                } else {
                                    LogHelper::log('scheduler:crm:update', $v->mobile . '-------' . $res['error']['message'], 'error');
                                }
                            } else {
                                LogHelper::log('scheduler:crm:update', $v->mobile . '-------' . $res['error']['message'], 'error');
                            }
                        }
                    } else {
                        LogHelper::log('scheduler:crm:update', $v->mobile . '-------' . $res['error']['message'], 'error');
                    }
                }
            }
        } catch (\Exception $e) {
            LogHelper::log('scheduler:crm:update', $e->getMessage(), 'exception');
        }

        echo 'done'."\n"; 

        return 0;
    }
}