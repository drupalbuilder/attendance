<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Block;
use App\Models\Blockcategory;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class BlockController extends Controller
{
    public function index(Request $request): View
    {
        $query = Block::query();

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

        return view('admin.block.list', compact('datalist', 'categories'));
    }

    public function create()
    {
        $data = [];
        $query = Block::query();
        $data['blockCategory'] = Blockcategory::pluck('name', 'id');

        return view('admin.block.create', $data);
    }

    public function ajax(Request $request, $id)
    {
        $data = [];

        $parentCategory = Block::find($id);

        if ($parentCategory) {
            $childCategories = $parentCategory->children;
            $data['childCategories'] = $childCategories;
        }

        return response()->json($data);
    }

    public function up()
    {
        Schema::create('block', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'status' => 'nullable|boolean',
            'name' => 'nullable|string|max:255',
            'blockCategory' => 'nullable|string|max:255',
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

            $folderPath = public_path('/uploads/images/blocks');
            if (!is_dir($folderPath)) {
                mkdir($folderPath, 0755, true);
            }

            $image->move($folderPath, $imageName);

            $data['image'] = '/uploads/images/blocks/' . $imageName;
        }


        Block::create($data);

        return redirect('admin/block/list')->with('success', 'Block saved successfully!');
    }

    public function edit($id)
    {
        $data = Block::find($id);
        $blockCategory = Blockcategory::pluck('name', 'id');

        return view('admin.block.edit', compact('data','blockCategory'));
    }

    public function update(Request $request)
    {
        $updatedata = $request->validate([
            'status' => 'nullable|boolean',
            'name' => 'nullable|string|max:255',
            'blockCategory' => 'nullable|string|max:255',
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

            $folderPath = public_path('/uploads/images/blocks');
            if (!is_dir($folderPath)) {
                mkdir($folderPath, 0755, true);
            }

            $image->move($folderPath, $imageName);

            $updatedata['image'] = '/uploads/images/blocks/' . $imageName;
        }

        $id = $request->id;
        Block::where('id', $id)->update($updatedata);

        return redirect('admin/block/list')->with('success', 'Block Updated successfully!');
    }


     
    public function action($action, $id)
    {
        $msg = '';

        if ($action == 1) {
            $data = Block::find($id);
            $data->delete();
            $msg = 'Block deleted successfully.';
        } elseif ($action == 2) {
            Block::where('id', $id)->update(['status' => 1]);
            $msg = 'Block activated successfully.';
        } elseif ($action == 3) {
            Block::where('id', $id)->update(['status' => 0]);
            $msg = 'Block de-activated successfully.';
        }

        return redirect('admin/block/list')->with('success', $msg);
    }
}
