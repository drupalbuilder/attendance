<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Attribute;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Models\AttributeValue;


class ProductController extends Controller
{

    public function index(Request $request): View
    {
        $query = Product::query();

        $categories = [];
        $categoryData = $query->get();
        foreach ($categoryData as $row) {
            $categories[$row->id] = [$row->name, $row->description, $row->parent, $row->image, $row->image_title, $row->image_alt, $row->price, $row->sell_price, $row->discount, $row->amount_percantage, $row->shipping_charge, $row->status, $row->featured_category];
        }

        $search = $request->input('search');
        $categoryFilter = $request->input('parent_filter'); // Change the input name to parent_filter

        if ($categoryFilter) {
            $query->where('parent', $categoryFilter);
        }

        if ($search) {
            $query->where('name', 'LIKE', '%' . $search . '%'); // Filter based on name column
        }

        $datalist = $query->get();

        return view('admin.product.list', compact('datalist', 'categories'));
    }

    public function create()
    {
        $data = [];
        $query = Product::query();
        $productAttributes = Attribute::pluck('name', 'id');

        // Render the view with $data and $categories
        return view('admin.product.create', compact('data', 'productAttributes'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'status' => 'nullable|boolean',
            'name' => 'nullable',
            'description' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:20000',
            'image_title' => 'nullable',
            'image_alt' => 'nullable',
            'price' => 'nullable|numeric',
            'sell_price' => 'nullable|numeric',
            'discount' => 'nullable|numeric',
            'amount_percantage' => 'nullable|boolean',
            'shipping_charge' => 'nullable|numeric',
            'category' => 'nullable|string',
            'featured_category' => 'nullable|string',
        ]);

        $Product = new Product();
        $Product->name = $request->input('name');
        $Product->description = $request->input('description');
        $Product->image = $request->input('image');
        $Product->image_title = $request->input('image_title');
        $Product->image_alt = $request->input('image_alt');
        $Product->price = $request->input('price');
        $Product->sell_price = $request->input('sell_price');
        $Product->discount = $request->input('discount');
        $Product->amount_percantage = $request->input('amount_percantage');
        $Product->shipping_charge = $request->input('shipping_charge');
        $Product->status = $request->input('status');
        if (!$Product->featured_category) {
            $Product->featured_category = '0';
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();

            $folderPath = public_path('/uploads/images/product');
            if (!is_dir($folderPath)) {
                mkdir($folderPath, 0755, true);
            }

            $image->move($folderPath, $imageName);

            $data['image'] = '/uploads/images/product/' . $imageName;
        }

        $Product->save();

        return redirect('admin.product.list')->with('success', 'Product saved successfully!');
    }

    public function edit($id)
    {
        $data = Product::find($id);
        $categories = Product::pluck('name', 'id');
        $productAttributes = Attribute::all();
        $attributeValues = AttributeValue::where('product_id', $id)->get();

        // Transform the attribute values into an associative array for easier access
        $attributeValuesArray = [];
        foreach ($attributeValues as $value) {
            $attributeValuesArray[$value->product_attribute_id] = $value->value;
        }

        return view('admin.product.edit', compact('data', 'categories', 'productAttributes', 'attributeValues', 'attributeValuesArray'));
    }


    public function update(Request $request)
    {
        $updatedata = $request->validate([
            'status' => 'nullable|boolean',
            'name' => 'nullable',
            'description' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:20000',
            'image_title' => 'nullable',
            'image_alt' => 'nullable',
            'price' => 'nullable|numeric',
            'sell_price' => 'nullable|numeric',
            'discount' => 'nullable|numeric',
            'amount_percantage' => 'nullable|boolean',
            'shipping_charge' => 'nullable|numeric',
            'category' => 'nullable|string',
            'featured_category' => 'nullable|string',

        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();

            $folderPath = public_path('/uploads/images/product');
            if (!is_dir($folderPath)) {
                mkdir($folderPath, 0755, true);
            }

            $image->move($folderPath, $imageName);

            $updatedata['image'] = '/uploads/images/product/' . $imageName;
        }

        $id = $request->id;
        if (!isset($updatedata['featured_category'])) {
            $updatedata['featured_category'] = '0';
        }
        Product::where('id', $id)->update($updatedata);

        return redirect('admin/product/list')->with('success', 'Product Updated successfully!');
    }


    public function action($action, $id)
    {
        $data = [];
        if ($action == 1) {
            $data = Product::find($id);
            $data->delete();
            $msg = 'Product deleted successfully.';
        }
        if ($action == 2) {
            $updatedata = [];
            $updatedata['status'] = 1;
            Product::where('id', $id)->update($updatedata);

            $msg = 'Product activated successfully.';
        }
        if ($action == 3) {
            $updatedata = [];
            $updatedata['status'] = 0;
            Product::where('id', $id)->update($updatedata);
            $msg = 'Product de-activated successfully.';
        }
        return redirect('admin/product/list')->with('success', $msg);
    }


    public function productAttribute($productId)
    {
        $product = Product::find($productId);

        if (!$product) {
            // Handle the case when the product is not found
            return redirect()->route('admin.product.list')->with('error', 'Product not found.');
        }

        $attributes = Attribute::all();

        // Fetch existing attribute values for the product
        $attributeValues = AttributeValue::where('product_id', $productId)->get();

        // Transform the attribute values into an associative array for easier access
        $attributeValuesArray = [];
        foreach ($attributeValues as $value) {
            $attributeValuesArray[$value->product_attribute_id] = $value->value;
        }

        return view('admin.product.product_attribute', compact('product', 'attributes', 'attributeValuesArray'));
    }

    public function saveAttributes(Request $request, $productId)
    {
        $product = Product::find($productId);

        if (!$product) {
            return redirect()->route('admin.product.list')->with('error', 'Product not found.');
        }

        $selectedAttributes = $request->input('attributes', []);

        // Clear existing attribute values for the product
        AttributeValue::where('product_id', $productId)->delete();

        // Save selected attribute values for the product
        foreach ($selectedAttributes as $attributeId) {
            $attribute = Attribute::find($attributeId);

            if ($attribute) {
                AttributeValue::create([
                    'product_id' => $productId,
                    'product_attribute_id' => $attributeId,
                    'product_attribute_name' => $attribute->name,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        return redirect()->route('admin.product.list')->with('success', 'Attributes saved successfully!');
    }

    public function showAttributeOptions($productId, $attributeId): View
    {
        $product = Product::find($productId);
        $attribute = Attribute::find($attributeId);

        if (!$product || !$attribute) {
            return view('admin.product.list', compact('datalist', 'categories'))->with('error', 'Product or Attribute not found.');
        }
 
        $options = AttributeValue::where('product_id', $productId)
            ->where('product_attribute_id', $attributeId)
            ->get();
            
        $existingOptionsArray = $options->pluck('id')->toArray();

        return view('admin.product.product_attribute_options', compact('product', 'attribute', 'options', 'attributeId', 'existingOptionsArray'));
    }

    public function storeAttributeOption(Request $request)
    {
        $data = $request->validate([
            'option_name' => 'required|string',
            'product_id' => 'required|exists:products,id',
            'product_attribute_name' => 'required|string',
        ]);

        // Create new option
        $attributeOption = AttributeValue::create([
            'product_id' => $data['product_id'],
            'product_attribute_id' => $request->input('product_attribute_id'),
            'product_attribute_name' => $data['product_attribute_name'],
            'attribute_option' => $data['option_name'],
        ]);

        if ($attributeOption) {
            return redirect()->back()->with('success', 'Option added successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to add option!')->withErrors('Option could not be added.');
        }
    }
    public function saveAttributeOptions(Request $request, $productId, $attributeId)
    {
        
        $allOptions = AttributeValue::where('product_id', $productId)
            ->where('product_attribute_id', $attributeId)
            ->get();

        // Update or delete existing options
        foreach ($allOptions as $option) {
            $isChecked = $request->has('existing_options') && in_array($option->id, $request->input('existing_options'));

            // Update or modify the existing option as needed
            $option->update(['checked' => $isChecked]);
        }

        return redirect()->route('admin.product.list')->with('success', 'Options updated successfully!');
    }


    // Add a new route for deleting an attribute option
    public function deleteAttributeOption($optionId)
    {
        $option = AttributeValue::find($optionId);

        if (!$option) {
            return redirect()->back()->with('error', 'Option not found.');
        }

        $option->delete();

        return redirect()->back()->with('success', 'Option deleted successfully!');
    }
}
