<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Card;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class CardController extends Controller
{
    
    public function create()
    {
        $data = [];
        $query = Card::query();
        $categories = $query->where('title', '<', 1)->get();

       
        // Render the view with $data and $categories
        return view('admin.content.card', compact('data', 'categories'));
    }
    public function ajax(Request $request, $id)
    {
        $data = [];

        // Find the selected parent category
        $parentCategory = Card::find($id);

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
            'title' => 'nullable',
            'description' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:20000',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();

            $folderPath = public_path('/uploads/images/card');
            if (!is_dir($folderPath)) {
                mkdir($folderPath, 0755, true);
            }

            $image->move($folderPath, $imageName);

            $data['image'] = '/uploads/images/card/' . $imageName;
        }

        // Check if an ID is provided in the request, and update the existing record
        if ($request->has('id')) {
            $id = $request->input('id');
            Card::where('id', $id)->update($data);
        } else {
            // If no ID is provided, it means you want to create a new record
            Card::create($data);
        }

        return redirect('admin/content/card')->with('success', 'card saved successfully!');
    }
   




    
   


    
  
}
