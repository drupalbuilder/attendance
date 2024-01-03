<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Log;
use \Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Models\ErrorLog;

class LogHelper
{
	public static function log($name, $type, $msg) {
		ErrorLog::create(['api_name' => $name, 'error_msg' => $msg, 'error_type' => $type]);
	}
}