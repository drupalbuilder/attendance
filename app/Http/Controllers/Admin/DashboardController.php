<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Helpers\Helper;

class DashboardController extends Controller
{

    public function dashboard(Request $request) {
		$data = [];
		
    	return view('admin.dashboard', compact('data'));
    }
}