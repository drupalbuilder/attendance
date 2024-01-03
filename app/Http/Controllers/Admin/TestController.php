<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TestCT;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB; 
use Illuminate\Http\RedirectResponse;

class TestController extends Controller
{

 public function index3(Request $request): View
    {
        $query = TestCT::query();

        $search = $request->input('search');

        if ($search) {
            $query->where('name', 'LIKE', '%' . $search . '%');
        }

        $forms = $query->orderBy('form_type')->get();

        $datalist = $forms->groupBy('group_id')->map(function ($groupedForms) {
            return $groupedForms->groupBy('form_type');
        });

        return view('admin.test_c.list', compact('datalist'));
    }

   public function deleteGroup($groupId)
    {
        try {
            // Delete all data associated with the group ID
            TestCT::where('group_id', $groupId)->delete();

            // Flash a success message to be displayed on the list page
            return redirect()->route('test_c.list')->with('success', 'Group deleted successfully');

            
        } catch (\Exception $e) {
            // Flash an error message if deletion fails
            return redirect()->route('test_c.list')->with('error', 'Error deleting group');

        }
    }

    public function editGroup($groupId)
    {
        // Fetch data for the specified group from the database
        $groupData = TestCT::where('group_id', $groupId)->get();

        // Return the edit group view with the fetched data
        return view('admin.test_c.edit-group', ['groupData' => $groupData, 'groupId' => $groupId]);
    }

    public function index()
    {
        $datalist = TestCT::all();

        return view('admin.test_c.one', compact('datalist'));
    }

    public function index1()
    {
        $content = TestCT::all();

        return view('admin.test_c.xt', compact('content'));
    }

    public function index2()
    {
        $content = TestCT::all();

        return view('admin.test_c.cd', compact('content'));
    }

    public function getHtml()
    {
        $url = 'http://3dcakes.gprlive.com/admin/test_c/xt';

        try {
            $client = new Client();
            $response = $client->request('GET', $url);
            $html = $response->getBody()->getContents();
            return response()->json(['html' => $html]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to fetch HTML']);
        }
    }

    public function getHtml1()
    {
        $url = 'http://3dcakes.gprlive.com/admin/test_c/cd';

        try {
            $client = new Client();
            $response = $client->request('GET', $url);
            $html = $response->getBody()->getContents();
            return response()->json(['html' => $html]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to fetch HTML']);
        }
    }
    public function updateFormData(Request $request, $id)
{
    try {

         // Check if the remove button is clicked
         if ($request->has('remove_section') && $request->input('remove_section') === 'true') {
            // Find the existing form data and delete it
            $formData = TestCT::find($id);
            if ($formData) {
                $formData->delete();
            }

            // Redirect with success message
            return redirect()->route('test_c.list')->with('success', 'Form data removed successfully');
        }

        // Find the existing form data
        $formData = TestCT::find($id);

        if (!$formData) {
            // Redirect with error if form data not found
            return redirect()->route('test_c.list')->with('error', 'Form data not found');
        }

        // Check the form type and update relevant fields
        if ($formData->form_type === 'text_image') {
            $formData->title = $request->input('title');
            $formData->description = $request->input('description');
            $formData->selection = $request->input('selection');

            // Handle image upload if provided
            if ($request->hasFile('image')) {
                // Handle image upload logic and update the $formData->image
                $imagePath = $request->file('image')->store('images'); // Change 'images' to your desired storage path
                $formData->image = $imagePath;
            }
        } elseif ($formData->form_type === 'card') {
            $formData->title = $request->input('title');
            $formData->description = $request->input('description');
            $formData->selection = $request->input('selection');

            // Handle icon upload if provided
            if ($request->hasFile('icone')) {
                // Handle icon upload logic and update the $formData->icone
                $iconPath = $request->file('icone')->store('icons'); // Change 'icons' to your desired storage path
                $formData->icone = $iconPath;
            }

            $formData->text_link = $request->input('text_link');
            $formData->link = $request->input('link');
        } else {
            // Redirect with error if form type or type parameter doesn't match
            return redirect()->route('test_c.list')->with('error', 'Invalid form type or type parameter');
        }

        // Save the updated form data
        $formData->save();

        // Redirect with success message
        return redirect()->route('test_c.list')->with('success', 'Form data updated successfully');
    } catch (\Exception $e) {
        // Handle any exceptions that may occur
        return redirect()->route('test_c.list')->with('error', 'An error occurred while updating form data');
    }
}
    

public function removeSection($id)
{
    try {
        // Find the existing form data and delete it
        $formData = TestCT::find($id);
        if ($formData) {
            $formData->delete();

            // Return a success response
            return response()->json(['message' => 'Form data removed successfully']);
        } else {
            // Return an error response if form data not found
            return response()->json(['error' => 'Form data not found'], 404);
        }
    } catch (\Exception $e) {
        // Return an error response if an exception occurs
        return response()->json(['error' => 'An error occurred while removing form data'], 500);
    }
}

public function updateFormOrder(Request $request)
{
    try {
        $order = $request->input('order');

        // Use a transaction to ensure data consistency
        DB::beginTransaction();

        // Loop through the order and update the weight in the database
        foreach ($order as $index => $formId) {
            TestCT::where('id', $formId)->update(['weight' => $index]);
        }

        // Commit the transaction
        DB::commit();

        return response()->json(['success' => true]);
    } catch (\Exception $e) {
        // Rollback the transaction in case of an error
        DB::rollBack();

        return response()->json(['error' => 'An error occurred while updating form order'], 500);
    }
}


    public function store(Request $request)
    {
        try {
            $formDataArray = $request->input('formDataArray');

            if (count($formDataArray) > 0) {
                $groupId = uniqid();

                foreach ($formDataArray as $data) {
                    $formType = $data['formType'] ?? '';
                    $description = $data['data'][4]['value'] ?? '';

                    $title = $data['data'][3]['value'] ?? '';
                    $selection = $data['data'][5]['value'] ?? '';
                    $link = $data['data'][7]['value'] ?? '';
                    $text_link = $data['data'][6]['value'] ?? '';

                    $formData = new TestCT([
                        'title' => $title,
                        'selection' => $selection,
                        'description' => $description,
                        'link' => $link,
                        'text_link' => $text_link,
                        'form_type' => $formType,
                        'group_id' => $groupId,
                    ]);

                    $formData->save();
                }

                return redirect('test_c/list')->with('success', 'content saved successfully!');
            }
        } catch (\Exception $e) {
            \Log::error('Error storing data: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error storing data');
        }
    }


}

