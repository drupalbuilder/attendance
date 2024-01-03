<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */


    public function index(Request $request): View
    {   $category = Category::all();
        $search = $request->input('search');
        $query = Faq::query();
    
		$categories = [];
		foreach($category as $rows){
				$categories[$rows['id']] = [$rows['name'],$rows['description'],$rows['status']];
		}
		
        if ($search) {
            $query->where('question', 'LIKE', '%' . $search . '%')
                ->orWhere('answer', 'LIKE', '%' . $search . '%');
        }
    
		 $categoryFilter = $request->input('category_filter');
		if ($categoryFilter) {
            $query->whereHas('category', function ($q) use ($categoryFilter) {
                $q->where('id', $categoryFilter);
            });
        }
	
		
        $datalist = $query->get();
    
        return view('admin.faq.list', compact('datalist', 'categories'));
    }

	 /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $addata = [];	
        $categories = Category::pluck('name', 'id');
        return view('admin.faq.create', compact('addata', 'categories'));

    }
    public function edit($id)
    {
        $data = Faq::find($id);
        $categories = Category::pluck('name', 'id');
        
        return view('admin.faq.edit', compact('data', 'categories'));

    }
    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required',
            'category' => 'required',
            'answer' => 'required',
            'status' => 'required',
        ]);
    
        $faq = new Faq();
        $faq->question = $request->input('question');
        $faq->category = $request->input('category');
        $faq->answer = $request->input('answer');
        $faq->status = $request->input('status');
        $faq->save();
    
        return redirect('admin/faq/list')->with('success', 'FAQ added successfully!');
    }
      
    public function update(Request $request)
    {
        $updatedata = $request->validate([
            'question' => 'nullable',
            'category' => 'nullable|string',
            'answer' => 'nullable',
            'status' => 'nullable|boolean',
        ]);

        $id = $request->id;
        Faq::where('id', $id)->update($updatedata);

        return redirect('admin/faq/list')->with('success', 'FAQ Updated successfully!');
    }

    public function action($action, $id)
    {	
		$data = [];
        if($action == 1){
			$data = Faq::find($id);
			$data->delete();
			$msg = 'FAQ deleted successfully.';
		}
        if($action == 2){
			$updatedata = [];
			$updatedata['status']=1;
			Faq::where('id', $id)->update($updatedata);
		
			$msg = 'FAQ activated successfully.';
		}
        if($action == 3){
			$updatedata = [];
			$updatedata['status']=0;
			Faq::where('id', $id)->update($updatedata);
			$msg = 'FAQ de-activated successfully.';
		}
        return redirect('admin/faq/list')->with('success', $msg);
    }
}  