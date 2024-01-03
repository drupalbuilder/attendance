<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\SegmentationScheduler;
use Carbon\Carbon;
use App\Helpers\LogHelper;
use App\Helpers\Helper;
use Illuminate\Support\Facades\Http;

class SegmentScheduler extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'segment:scheduler';

    private static $token = '';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Segmentation scheduler For marking according to filter';

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
        $currentDt = Carbon::now()->format('Y-m-d H:i');
        $data = SegmentationScheduler::where('status', 'Active')->where('schedule_at', 'now')->orWhere('schedule_at', $currentDt)->get();
        $sid = [];
        foreach ($data as $segment) {
            $this->sendMarketingMsg($segment->template_name, $segment->params);
            $sid[] = $segment->id;
        }

        SegmentationScheduler::whereIn('id', $sid)->update(['status' => 'Completed']);

        return 0;
    }

    private function sendMarketingMsg($template, $params) {

        $paramsdec = base64_decode($params);
        $paramsdec = json_decode($paramsdec, 1);
        $lmslists = SegmentationScheduler::getFilteredData($paramsdec);
        $lmslists = $lmslists->get();
        $murl = Config('credentials.rml_apiurl') . 'wba/v1/messages';
        $host = Config('credentials.app_host');

        foreach ($lmslists as $data) {
            try {
                $mobile = $data->mobile;
                $req = [
                    "phone" => "+91".$mobile,
                    "media" => [
                        "type" => "media_template",
                        "lang_code" => "en",
                        "template_name" => $template
                    ]
                ];

                
                $response = Http::contentType('application/json')->withHeaders([
                    'Content-Length' => strlen(json_encode($req)),
                    'Host' => $host,
                    'Authorization' => self::$token
                ])->post($murl, $req);

                $res = $response->json();
                if (isset($res['reason'])) {
                    if ($res['reason'] == 'Please check the integrity/validity of the token sent') {
                        self::$token = Helper::getRmlAuthToken();
                        $response = Http::contentType('application/json')->withHeaders([
                            'Content-Length' => strlen(json_encode($req)),
                            'Host' => $host,
                            'Authorization' => self::$token
                        ])->post($murl, $req);
                        $res = $response->json();
                        LogHelper::log('scheduler:sendMarketingMsg', $res['message'] . '--' . $mobile, 'info');
                    } else {
                        LogHelper::log('scheduler:sendMarketingMsg', $res['reason'] . '--' . $mobile, 'error');
                    }
                } else {
                    LogHelper::log('scheduler:sendMarketingMsg', $res['message'] . '--' . $mobile, 'info');
                }

            } catch (\Exception $e) {
                LogHelper::log('scheduler:sendMarketingMsg', $e->getMessage() . '--' . $mobile, 'exception');
            }
        }
    }
}
