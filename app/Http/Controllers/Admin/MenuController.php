<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;


class MenuController extends Controller
{
  public function index(Request $request): View
{
    $parent = Menu::all();
    $query = Menu::query();
    $Parent = [];
    $menus = Menu::where('parent', '<', 1)->pluck('name', 'id'); // Fetch parent menu items

    $search = $request->input('search');

    foreach ($parent as $rows) {
        $Parent[$rows['id']] = [$rows['name'], $rows['description'], $rows['link']];
    }

    $parentFilter = $request->input('parent_filter');

    if ($parentFilter) {
        $query->where('parent', $parentFilter);
    }
    
    if ($parentFilter) {
        $query->where('parent', '>', 0); // Filter for parents > 0
    }

   
    
    if ($search) {
        $query->where('name', 'LIKE', '%' . $search . '%');
    }
    
    // Add the orderBy clause to sort by the "weight" column in ascending order
    // $query->orderBy('weight', 'asc');
    
    $menuList = $query->get();
    
    // Pass both $menuList and $Parent to the view
    return view('admin.menu.list', compact('menuList', 'menus', 'Parent'));
}

    public function create()
    {
        $data = [];
        $menuItems = Menu::where('parent', '<', 1)
                        ->orWhereNull('parent')
                        ->get();
        return view('admin.menu.create', compact('data', 'menuItems'));
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'nullable',
            'description' => 'nullable',
            'link' => 'nullable',
			'weight' => 'nullable',
            'parent' => 'nullable|string',
        ]);

        Menu::create($data);

        return redirect('admin/menu/list')->with('success', 'Menu saved successfully!');
    }



    public function edit($id)
    {
        $data = Menu::find($id);
        $menuItems = Menu::pluck('name', 'id');
        return view('admin.menu.edit', compact('data', 'menuItems'));
    }
    public function update(Request $request)
    {
        $updatedata = $request->validate([
            'name' => 'nullable',
            'description' => 'nullable',
            'link' => 'nullable',
			'weight' => 'nullable',
            'parent' => 'nullable|string',
        ]);

       
        $id = $request->id;
       
        Menu::where('id', $id)->update($updatedata);

        return redirect('admin/menu/list')->with('success', 'Menu updated successfully!');
    }
    public function action($action, $id)
    {
        $data = [];
        if ($action == 1) {
            $data = Menu::find($id);
            $data->delete();
            $msg = 'Menu deleted successfully.';
        }
        if ($action == 2) {
            $updatedata = [];
            $updatedata['status'] = 1;
            Menu::where('id', $id)->update($updatedata);
            $msg = 'Menu activated successfully.';
        }
        if ($action == 3) {
            $updatedata = [];
            $updatedata['status'] = 0;
            Menu::where('id', $id)->update($updatedata);
            $msg = 'Menu de-activated successfully.';
        }
        return redirect('admin/menu/list')->with('success', $msg);
    }

    public function getMenu() {
        $menu = $this->buildMenu();
        return response()->json($menu);
    }
    

    private function buildMenu($parentId = 0, $parentWeight = 0) {
        $menuItems = [];
        $menuItemsQuery = DB::table('menu')
            ->where('parent', $parentId)
            ->orderBy('weight') 
            ->get();
    
        foreach ($menuItemsQuery as $index => $menuItem) {
            $submenu = $this->buildMenu($menuItem->id, $parentWeight + $index + 1);
            $menuItems[] = [
                'id' => $menuItem->id,
                'name' => $menuItem->name,
                'link' => $menuItem->link,
                'weight' => $parentWeight + $index + 1,
                'submenu' => $submenu,
            ];
        }
    
        return $menuItems;
    }
    
}    