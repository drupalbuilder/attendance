<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index(Request $request): View
    {
        $query = Category::query();

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

        return view('admin.category.list', compact('datalist', 'categories'));
    }

    public function create()
    {
        $data = [];
        $query = Category::query();
        $categories = Category::where('parent', '<', 1)
            ->orWhere('parent')
            ->get();

        return view('admin.category.create', compact('data', 'categories'));
    }
    public function ajax(Request $request, $id)
    {
        $data = [];

        // Find the selected parent category
        $parentCategory = Category::find($id);

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
            'parent' => 'nullable|string',
            'featured_category' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:20000',

        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();

            $folderPath = public_path('/uploads/images/banners');
            if (!is_dir($folderPath)) {
                mkdir($folderPath, 0755, true);
            }

            $image->move($folderPath, $imageName);

            $data['image'] = '/uploads/images/banners/' . $imageName;
        }

        $Category = new Category();
        $Category->name = $request->input('name');
        $Category->description = $request->input('description');
        $Category->{'parent'} = $request->input('parent');
        $Category->status = $request->input('status');

        if (!$Category->featured_category) {$Category->featured_category = '0';}

        Category::create($data);

        return redirect('admin/category/list')->with('success', 'Category saved successfully!');
    }

    public function edit($id)
    {
        $data = Category::find($id);
        $categories = Category::pluck('name', 'id');
        return view('admin.category.edit', compact('data', 'categories'));
    }

    public function update(Request $request)
    {
        $updatedata = $request->validate([
            'status' => 'nullable|boolean',
            'name' => 'nullable',
            'description' => 'nullable',
            'parent' => 'nullable|string',
            'featured_category' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:20000',
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();

            $folderPath = public_path('/uploads/images/banners');
            if (!is_dir($folderPath)) {
                mkdir($folderPath, 0755, true);
            }

            $image->move($folderPath, $imageName);

            $updatedata['image'] = '/uploads/images/banners/' . $imageName;
        }

        $id = $request->id;
        if (!isset($updatedata['featured_category'])) {$updatedata['featured_category'] = '0';}
        Category::where('id', $id)->update($updatedata);

        return redirect('admin/category/list')->with('success', 'Category Updated successfully!');
    }

    public function action($action, $id)
    {
        $data = [];
        if ($action == 1) {
            $data = Category::find($id);
            $data->delete();
            $msg = 'Category deleted successfully.';
        }
        if ($action == 2) {
            $updatedata = [];
            $updatedata['status'] = 1;
            Category::where('id', $id)->update($updatedata);

            $msg = 'Category activated successfully.';
        }
        if ($action == 3) {
            $updatedata = [];
            $updatedata['status'] = 0;
            Category::where('id', $id)->update($updatedata);
            $msg = 'Category de-activated successfully.';
        }
        return redirect('admin/category/list')->with('success', $msg);
    }
}
