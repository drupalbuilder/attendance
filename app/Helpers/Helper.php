<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Log;
use \Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Helpers\LogHelper;
use App\Models\BmwDealer;

class Helper
{
	public static function getRmlAuthToken() {

		try {
			$url = Config('credentials.rml_apiurl') . 'auth/v1/login/';
	        $username = Config('credentials.rml_username');
	        $password = Config('credentials.rml_password');
	        $host = Config('credentials.app_host');

	        $data = [
	            'username' => $username,
	            'password' => $password
	        ];
	        $response = Http::contentType('application/json')->withHeaders([
	            'Content-Length' => strlen(json_encode($data)),
	            'Host' => $host,
	        ])->post($url, $data);

	        $dt = $response->json();
	        if (isset($dt['status'])) {
	            LogHelper::log('Helper:getRmlAuthToken', $res['status'], 'error');
	        }
	        $token = isset($dt['JWTAUTH']) ? $dt['JWTAUTH'] : '';

	        return $token;
        } catch (\Exception $e) {
            LogHelper::log('Helper:getRmlAuthToken', $e->getMessage(), 'exception');
            return '';
        }
	}

	public static function getDealerName($code) {

		$dealer = BmwDealer::where('dealer_code', $code)->first();

        return isset($dealer->dealer_name) ? $dealer->dealer_name : '';
	}

	public static function getCRMAuthToken() {

		try {
            $url = Config('credentials.crm_authurl');
            $baseurl = Config('credentials.crm_baseurl');
            $client_id = Config('credentials.crm_appid');
            $client_secret = Config('credentials.crm_cientsecret');
            $host = Config('credentials.app_host');

            $data = [
                'grant_type' => 'client_credentials',
                'resource' => $baseurl,
                'client_id' => $client_id,
                'client_secret' => $client_secret
            ];

            $response = Http::asForm()->post($url, $data);

            $dt = $response->json();
            if (isset($dt['error'])) {
                LogHelper::log('Helper:getCRMAuthToken', $res['error_description'], 'error');
            }
            $token = isset($dt['access_token']) ? $dt['access_token'] : '';

            return $token;
            
        } catch (\Exception $e) {
        	
           	LogHelper::log('Helper:getCRMAuthToken', $e->getMessage(), 'exception');
            return '';
        }
	}

	public static function getTemplates() {

		return ['optin_template' => 'Optin Template A', 'quick_reply_subscription_3' => 'Optin Template B', 'quick_reply_subscription_4' => 'Optin Template C'];
	}

	public static function getEmojis() {

		return [
			1 => '1️⃣',
			2 => '2️⃣',
			3 => '3️⃣',
			4 => '4️⃣',
			5 => '5️⃣',
			6 => '6️⃣',
			7 => '7️⃣',
			8 => '8️⃣',
			9 => '9️⃣',
			10 => '🔟',
			11 => '1️⃣1️⃣',
			12 => '1️⃣2️⃣',
			13 => '1️⃣3️⃣',
			14 => '1️⃣4️⃣',
			15 => '1️⃣5️⃣',
			16 => '1️⃣6️⃣',
			17 => '1️⃣7️⃣',
			18 => '1️⃣8️⃣',
			19 => '1️⃣9️⃣'
		];
	}
}