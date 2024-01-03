<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banners;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class BannersController extends Controller
{
    public function index(Request $request): View
    {
        $query = Banners::query();

        $categories = [];
        $categoryData = $query->get();
        foreach ($categoryData as $row) {
            $categories[$row->id] = [$row->name, $row->description, $row->parent, $row->status];
        }

        $search = $request->input('search');
        $categoryFilter = $request->input('parent_filter'); // Change the input name to parent_filter

        if ($categoryFilter) {
            $query->where('parent', $categoryFilter);
        }

        if ($search) {
            $query->where('name', 'LIKE', '%' . $search . '%');
        }

        $datalist = $query->get();

        return view('admin.banners.list', compact('datalist', 'categories'));
    }

    public function create()
    {
        $data = [];
        $query = Banners::query();
        $categories = $query->where('category', '<', 1)->get();

        return view('admin.banners.create', compact('data', 'categories'));
    }

    public function ajax(Request $request, $id)
    {
        $data = [];

        $parentCategory = Banners::find($id);

        if ($parentCategory) {
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
            'category' => 'nullable|string',
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

        // Check if an ID is provided in the request, and update the existing record
        if ($request->has('id')) {
            $id = $request->input('id');
            Banners::where('id', $id)->update($data);
        } else {
            // If no ID is provided, it means you want to create a new record
            Banners::create($data);
        }

        return redirect('admin/banners/list')->with('success', 'Banners saved successfully!');
    }

    public function edit($id)
    {
        $data = Banners::find($id);
        $categories = Banners::pluck('name', 'id');
        return view('admin.banners.edit', compact('data', 'categories'));
    }

    public function update(Request $request)
    {
        $updatedata = $request->validate([
            'status' => 'nullable|boolean',
            'name' => 'nullable',
            'description' => 'nullable',
            'category' => 'nullable|string',
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
        if (!isset($updatedata['featured_category'])) {
            $updatedata['featured_category'] = '0';
        }
        Banners::where('id', $id)->update($updatedata);

        return redirect('admin/banners/list')->with('success', 'Banners updated successfully!');
    }

    public function action($action, $id)
    {
        $data = [];
        if ($action == 1) {
            $data = Banners::find($id);
            $data->delete();
            $msg = 'Banners deleted successfully.';
        }
        if ($action == 2) {
            $updatedata = [];
            $updatedata['status'] = 1;
            Banners::where('id', $id)->update($updatedata);
            $msg = 'Banners activated successfully.';
        }
        if ($action == 3) {
            $updatedata = [];
            $updatedata['status'] = 0;
            Banners::where('id', $id)->update($updatedata);
            $msg = 'Banners deactivated successfully.';
        }
        return redirect('admin/banners/list')->with('success', $msg);
    }
}
