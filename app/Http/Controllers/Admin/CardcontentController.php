<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cardcontent;
use App\Models\Blockcategory;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class CardcontentController extends Controller
{
    public function index(Request $request): View
    {
        $query = Cardcontent::query();

        $categories = [];
        $categoryData = $query->get();
        foreach ($categoryData as $row) {
            $categories[$row->id] = [$row->name, $row->description, $row->status];
        }

        $search = $request->input('search');
        $categoryFilter = $request->input('parent_filter');

        if ($categoryFilter) {
            $query->where('name', $categoryFilter);
        }

        if ($search) {
            $query->where('name', 'LIKE', '%' . $search . '%');
        }

        $datalist = $query->get();

        return view('admin.card.list', compact('datalist', 'categories'));
    }

    public function create()
    {
        $data = [];
        $data['Blockcategory'] = Blockcategory::pluck('name', 'id');
    
        return view('admin.card.create', compact('data'));
    }
    



    public function ajax(Request $request, $id)
    {
        $data = [];

        $parentCategory = Cardcontent::find($id);

        if ($parentCategory) {
            $childCategories = $parentCategory->children;
            $data['childCategories'] = $childCategories;
        }

        return response()->json($data);
    }

    public function up()
    {
        Schema::create('Cardcontent', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'status' => 'nullable|boolean',
            'name' => 'nullable|string|max:255',
            'blockCategory' => 'nullable|string|max:255', // Validate and provide a default value or make it nullable
            'description' => 'nullable|string',
            'lable' => 'nullable|string|max:255',
            'link' => 'nullable|string|max:255',
            'target' => 'nullable|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:20000',
            'image_title' => 'nullable|string|max:255',
            'image_alt' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();

            $folderPath = public_path('/uploads/images/Cardcontents');
            if (!is_dir($folderPath)) {
                mkdir($folderPath, 0755, true);
            }

            $image->move($folderPath, $imageName);

            $data['image'] = '/uploads/images/Cardcontents/' . $imageName;
        }


        Cardcontent::create($data);

        return redirect('admin/card/list')->with('success', 'Card saved successfully!');
    }

 
    public function edit($id)
    {
        $data = Cardcontent::find($id);
        $blockCategory = Blockcategory::pluck('name', 'id');
    
        return view('admin.card.edit', compact('data', 'blockCategory'));
    }

    public function update(Request $request)
    {
        $updatedata = $request->validate([
            'status' => 'nullable|boolean',
            'name' => 'nullable|string|max:255',
            'blockCategory' => 'nullable|string|max:255', // Validate and provide a default value or make it nullable
            'description' => 'nullable|string',
            'lable' => 'nullable|string|max:255',
            'link' => 'nullable|string|max:255',
            'target' => 'nullable|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:20000',
            'image_title' => 'nullable|string|max:255',
            'image_alt' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();

            $folderPath = public_path('/uploads/images/Cardcontents');
            if (!is_dir($folderPath)) {
                mkdir($folderPath, 0755, true);
            }

            $image->move($folderPath, $imageName);

            $updatedata['image'] = '/uploads/images/Cardcontents/' . $imageName;
        }

        $id = $request->id;
        Cardcontent::where('id', $id)->update($updatedata);

        return redirect('admin/card/list')->with('success', 'Card Updated successfully!');
    }


     
    public function action($action, $id)
    {
        $msg = '';

        if ($action == 1) {
            $data = Cardcontent::find($id);
            $data->delete();
            $msg = 'Card deleted successfully.';
        } elseif ($action == 2) {
            Cardcontent::where('id', $id)->update(['status' => 1]);
            $msg = 'Card activated successfully.';
        } elseif ($action == 3) {
            Cardcontent::where('id', $id)->update(['status' => 0]);
            $msg = 'Card de-activated successfully.';
        }

        return redirect('admin/card/list')->with('success', $msg);
    }
}
