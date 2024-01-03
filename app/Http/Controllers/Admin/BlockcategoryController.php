<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blockcategory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class BlockcategoryController extends Controller
{

    public function index(Request $request): View
    {
        $query = Blockcategory::query();
        $categories = [];
        $categoryData = $query->get();

        foreach ($categoryData as $row) {
            $categories[$row->id] = [$row->name, $row->description, $row->parent, $row->status, $row->featured_category, $row->image];
        }

        $search = $request->input('search');
        $categoryFilter = $request->input('parent_filter');

        if ($categoryFilter) {
            $query->where('parent', $categoryFilter);
        }

        if ($categoryFilter) {
            $query->where('parent', '>', 0);
        }

        if ($search) {
            $query->where('name', 'LIKE', '%' . $search . '%'); // Filter based on name column
        }
        $datalist = $query->get();
        return view('admin.blockcategory.list', compact('datalist', 'categories'));
    }

    public function create()
    {
        $data = [];
        $query = Blockcategory::query();
        $categories = Blockcategory::where('parent', '<', 1);

        return view('admin.blockcategory.create', compact('data', 'categories'));
    }
    public function ajax(Request $request, $id)
    {
        $data = [];
        // Find the selected parent category
        $parentCategory = Blockcategory::find($id);
        if ($parentCategory) {
            // Use the 'children' relationship to fetch child categories
            $childCategories = $parentCategory->children;
            $data['childCategories'] = $childCategories;
        }
        return response()->json($data);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'status' => 'nullable|boolean',
            'name' => 'nullable',
            'description' => 'nullable',
            'featured_category' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:20000',
            'image_title' => 'nullable|string|max:255',
            'image_alt' => 'nullable|string|max:255'
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $folderPath = public_path('/uploads/images/blockcategory');
            if (!is_dir($folderPath)) {
                mkdir($folderPath, 0755, true);
            }
            $image->move($folderPath, $imageName);
            $data['image'] = '/uploads/images/blockcategory/' . $imageName;
        }
        $Blockcategory = new Blockcategory();
        $Blockcategory->name = $request->input('name');
        $Blockcategory->description = $request->input('description');
        $Blockcategory->status = $request->input('status');
        if (!$Blockcategory->featured_category) {$Blockcategory->featured_category = '0';}
        Blockcategory::create($data);
        return redirect('admin/blockcategory/list')->with('success', 'Blockcategory saved successfully!');
    }

    public function edit($id)
    {
        $data = Blockcategory::find($id);
        $categories = Blockcategory::pluck('name', 'id');
        return view('admin.blockcategory.edit', compact('data', 'categories'));
    }

    public function update(Request $request)
    {
        $updatedata = $request->validate([
            'status' => 'nullable|boolean',
            'name' => 'nullable',
            'description' => 'nullable',
            'featured_category' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:20000',
            'image_title' => 'nullable|string|max:255',
            'image_alt' => 'nullable|string|max:255'
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $folderPath = public_path('/uploads/images/blockcategory');
            if (!is_dir($folderPath)) {
                mkdir($folderPath, 0755, true);
            }
            $image->move($folderPath, $imageName);
            $updatedata['image'] = '/uploads/images/blockcategory/' . $imageName;
        }
        $id = $request->id;
        if (!isset($updatedata['featured_category'])) {$updatedata['featured_category'] = '0';}
        Blockcategory::where('id', $id)->update($updatedata);

        return redirect('admin/blockcategory/list')->with('success', 'Blockcategory Updated successfully!');
    }

    public function action($action, $id)
    {
        $data = [];
        if ($action == 1) {
            $data = Blockcategory::find($id);
            $data->delete();
            $msg = 'Blockcategory deleted successfully.';
        }
        if ($action == 2) {
            $updatedata = [];
            $updatedata['status'] = 1;
            Blockcategory::where('id', $id)->update($updatedata);
            $msg = 'Blockcategory activated successfully.';
        }
        if ($action == 3) {
            $updatedata = [];
            $updatedata['status'] = 0;
            Blockcategory::where('id', $id)->update($updatedata);
            $msg = 'Blockcategory de-activated successfully.';
        }
        return redirect('admin/blockcategory/list')->with('success', $msg);
    }
}
