<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;


class PageController extends Controller
{

    public function index(Request $request): View
{
    $query = Page::query();

    $categories = [];
    $categoryData = $query->get();
    foreach ($categoryData as $row) {
        $categories[$row->id] = [$row->name, $row->description, $row->status];
    }

    $search = $request->input('search');
    $categoryFilter = $request->input('parent_filter'); // Change the input name to parent_filter

    if ($categoryFilter) {
        $query->where('name', $categoryFilter);
    }

    if ($search) {
        $query->where('name', 'LIKE', '%' . $search . '%'); // Filter based on name column
    }

    $datalist = $query->get();

    return view('admin.page.list', compact('datalist', 'categories'));
}

    public function create()
    {
        $data = [];
        $query = Page::query();
        $categories = $query->where('name', '<', 1)->get();


        // Render the view with $data and $categories
        return view('admin.page.create', compact('data', 'categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'status' => 'nullable|boolean',
            'name' => 'nullable',
            'description' => 'nullable',
         
        ]);

        $Page = new Page();
        $Page->name = $request->input('name');
        $Page->description = $request->input('description');
        $Page->status = $request->input('status');
        // $Category->save();

      
        Page::create($data);

        return redirect('admin/page/list')->with('success', 'Page saved successfully!');
    }


    public function edit($id)
    {
        $data = Page::find($id);
        $categories = Page::pluck('name', 'id');
        return view('admin.page.edit', compact('data', 'categories'));
    }



    public function update(Request $request)
    {
        $updatedata = $request->validate([
            'status' => 'nullable|boolean',
            'name' => 'nullable',
            'description' => 'nullable',
            
        ]);


        $id = $request->id;
        Page::where('id', $id)->update($updatedata);

        return redirect('admin/page/list')->with('success', 'Page Updated successfully!');
    }


    public function action($action, $id)
    {
        $data = [];
        if ($action == 1) {
            $data = Page::find($id);
            $data->delete();
            $msg = 'Page deleted successfully.';
        }
		
        if ($action == 2) {
            $updatedata = [];
            $updatedata['status'] = 1;
            Page::where('id', $id)->update($updatedata);

            $msg = 'Page activated successfully.';
        }
        if ($action == 3) {
            $updatedata = [];
            $updatedata['status'] = 0;
            Page::where('id', $id)->update($updatedata);
            $msg = 'Page de-activated successfully.';
        }
        return redirect('admin/page/list')->with('success', $msg);
    }
}



