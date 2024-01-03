<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cms;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class CmsController extends Controller
{
    public function index(Request $request): View
    {
        $query = Cms::query();

        $search = $request->input('search');


        if ($search) {
            $query->where('title', 'LIKE', '%' . $search . '%');
        }

        $datalist = $query->get();

        return view('admin.cms.list', compact('datalist'));
    }

    public function create()
    {
        $data = [];
        $query = Cms::query();
     

        return view('admin.cms.card', compact('data'));
    }

    public function create1()
    {
        $data = [];
        $query = Cms::query();
     

        return view('admin.cms.text', compact('data'));
    }

    public function ajax(Request $request, $id)
    {
        $data = [];

        $parentCategory = Cms::find($id);

        if ($parentCategory) {
            $childCategories = $parentCategory->children;
            $data['childCategories'] = $childCategories;
        }

        return response()->json($data);
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'selection' => 'required', // Validate 'selection' field, 
            'icon' => 'nullable|image|mimes:jpeg,png,jpg|max:20000',
            'title' => 'nullable',
            'description' => 'nullable',
            'text' => 'nullable',
            'link' => 'nullable',
            'status' => 'nullable|boolean',
        ]);
    
        if ($request->hasFile('icon')) {
            $icon = $request->file('icon');
            $iconName = time() . '_' . $icon->getClientOriginalName();
    
            $folderPath = public_path('/uploads/icons/cms'); // Adjust the folder path as needed.
            if (!is_dir($folderPath)) {
                mkdir($folderPath, 0755, true);
            }
    
            $icon->move($folderPath, $iconName);
    
            $data['icon'] = '/uploads/icons/cms/' . $iconName;
        }

         // 'selection' is now correctly assigned to 'images_style'
    $data['images_style'] = $data['selection'];
    unset($data['selection']); // Remove the temporary 'selection' field.

    
        // Check if an ID is provided in the request, and update the existing record
        if ($request->has('id')) {
            $id = $request->input('id');
            Cms::where('id', $id)->update($data);
        } else {
            // If no ID is provided, it means you want to create a new record
            Cms::create($data);
        }
    
        return redirect('admin/cms/list')->with('success', 'Card saved successfully!');
    }
    
    public function store1(Request $request)
    {
        $data = $request->validate([
            'selection' => 'required', // Validate 'selection' field, 
            'icon' => 'nullable|image|mimes:jpeg,png,jpg|max:20000',
            'title' => 'nullable',
            'description' => 'nullable',
            'text' => 'nullable',
            'link' => 'nullable',
            'status' => 'nullable|boolean',
        ]);
    


         // 'selection' is now correctly assigned to 'images_style'
    $data['images_style'] = $data['selection'];
    unset($data['selection']); // Remove the temporary 'selection' field.

    
        // Check if an ID is provided in the request, and update the existing record
        if ($request->has('id')) {
            $id = $request->input('id');
            Cms::where('id', $id)->update($data);
        } else {
            // If no ID is provided, it means you want to create a new record
            Cms::create($data);
        }
    
        return redirect('admin/cms/list')->with('success', 'Card saved successfully!');
    }
    public function edit($id)
    {
        $data = Cms::find($id);
      
        return view('admin.cms.edit', compact('data'));
    }

    public function update(Request $request)
    {
        $updatedata = $request->validate([
            'selection' => 'required', 
            'icon' => 'nullable|image|mimes:jpeg,png,jpg|max:20000',
            'title' => 'nullable',
            'description' => 'nullable',
            'text' => 'nullable',
            'link' => 'nullable',
            'status' => 'nullable|boolean',
        ]);
            

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();

            $folderPath = public_path('/uploads/images/cms');
            if (!is_dir($folderPath)) {
                mkdir($folderPath, 0755, true);
            }

            $image->move($folderPath, $imageName);

            $updatedata['image'] = '/uploads/images/cms/' . $imageName;
        }

             // 'selection' is now correctly assigned to 'images_style'
    $data['images_style'] = $data['selection'];
    unset($data['selection']); // Remove the temporary 'selection' field.


        $id = $request->id;
        if (!isset($updatedata['featured_category'])) {
            $updatedata['featured_category'] = '0';
        }
        Cms::where('id', $id)->update($updatedata);

        return redirect('admin/cms/list')->with('success', 'Cms updated successfully!');
    }

    public function action($action, $id)
    {
        $data = [];
        if ($action == 1) {
            $data = Cms::find($id);
            $data->delete();
            $msg = 'Cms deleted successfully.';
        }
        if ($action == 2) {
            $updatedata = [];
            $updatedata['status'] = 1;
            Cms::where('id', $id)->update($updatedata);
            $msg = 'Cms activated successfully.';
        }
        if ($action == 3) {
            $updatedata = [];
            $updatedata['status'] = 0;
            Cms::where('id', $id)->update($updatedata);
            $msg = 'Cms deactivated successfully.';
        }
        return redirect('admin/cms/list')->with('success', $msg);
    }
}
