<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\AttributeOption;
use App\Models\Product;
use App\Models\AttributeValue;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class AttributeController extends Controller
{

    public function index(Request $request): View
    {
        $query = Attribute::query();

        $search = $request->input('search');

        if ($search) {
            $query->where('name', 'LIKE', '%' . $search . '%');
        }

        $datalist = $query->get();

        return view('admin.attribute.list', compact('datalist'));
    }
    public function create()
    {
        $data = [];
        $query = Attribute::query();

        // Render the view with $data and $categories
        return view('admin.attribute.create', compact('data'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'nullable|required',
            'type' => 'nullable',
            'sku' => 'nullable',
            'stock' => 'nullable',
            'status' => 'nullable|boolean'
        ]);

        $id = $request->id;

        if ($id) {
            // Update existing record
            Attribute::where('id', $id)->update($data);
        } else {
            // Create a new record
            Attribute::create($data);
        }

        return redirect('admin/attribute/list')->with('success', 'Attribute saved successfully!');
    }
    public function edit($id)
    {
        $data = Attribute::find($id);
        return view('admin.attribute.edit', compact('data'));
    }
    public function option($id)
    {
        $data = Attribute::find($id);
        return view('admin.attribute.option', compact('data'));
    }

    public function storeOption(Request $request)
    {
        $data = $request->validate([
            'title' => 'nullable|required',
            'price' => 'nullable',
            'weight' => 'nullable',           
        ]);

        $id = $request->id;

        if ($id) {
            // Update existing record
            AttributeOption::where('id', $id)->update($data);
        } else {
            // Create a new record
            AttributeOption::create($data);
        }

        return redirect('admin/attribute/list')->with('success', 'Attribute Option saved successfully!');
    }

    public function update(Request $request)
    {
        $updatedata = $request->validate([
            'name' => 'nullable|required',
            'type' => 'nullable',
            'sku' => 'nullable',
            'stock' => 'nullable',
            'status' => 'nullable|boolean'
        ]);

        $id = $request->id;
        Attribute::where('id', $id)->update($updatedata);

        return redirect('admin/attribute/list')->with('success', 'Attribute updated successfully!');
    }

    public function action($action, $id)
    {
        $data = [];
        if ($action == 1) {
            $data = Attribute::find($id);
            $data->delete();
            $msg = 'Attribute deleted successfully.';
        }
        if ($action == 2) {
            $updatedata = [];
            $updatedata['status'] = 1;
            Attribute::where('id', $id)->update($updatedata);
            $msg = 'Attribute activated successfully.';
        }
        if ($action == 3) {
            $updatedata = [];
            $updatedata['status'] = 0;
            Attribute::where('id', $id)->update($updatedata);
            $msg = 'Attribute deactivated successfully.';
        }
        return redirect('admin/attribute/list')->with('success', $msg);
    }

    

}