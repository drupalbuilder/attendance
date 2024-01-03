<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AppSettings;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class AppSettingsController extends Controller

{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(Request $request): View
    {
        $categories = Category::all();
        $search = $request->input('search');
        $query = AppSettings::query();
    
        if ($search) {
            $query->where('title', 'LIKE', '%' . $search . '%')
                ->orWhere('description', 'LIKE', '%' . $search . '%');
        }
    
        $datalist = $query->get();
    
        return view('admin.appsettings.dashboard', compact('datalist'));

    }    
}	