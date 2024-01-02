<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{

	public function users(Request $request) {

        // Start query
        $users = User::where('status', 1);

        // Filter Data According to search 
        if (!empty($request->search)) {               
            $users = $users->where(function ($users) use ($request) {
                $users->where('name','like', '%'.$request->search. '%')
                ->orWhere('email', 'like', '%'.$request->search. '%');
            });
        } 
        
        // Filter Data According to sorting 
        if (!empty($request->sortby) && !empty($request->orderby)) {
            if ($request->orderby == 'ascending') {
                $users = $users->orderBy($request->sortby, 'asc');
            } else {
                $users = $users->orderBy($request->sortby, 'desc');
            }
        } else {
            $users = $users->orderBy('created_at', 'desc');
        }
       
        // Final Query
        $users = $users->paginate(20)->appends('search', $request->search)->appends('sortby', $request->sortby)->appends('orderby', $request->orderby);

        // Parameter Data for blade file
        $paramdata = array(
            'search'=> !empty($request->search)? $request->search : '',
            'order'=> !empty($request->order)? $request->order : '',
            'sort'=> !empty($request->sort)? $request->sort : '',
        );

    	return view('admin.user.users', compact('users','paramdata'));
    }

    public function profile(Request $request) {

    	$user = Auth::user();

    	return view('admin.user.profile');
    }

    public function logout() {

    	Auth::logout();

    	return redirect('/');
    }

    public function addUser() {

        $roles = Role::all();
        return view('admin.user.user-create', compact('roles'));
    }

    public function editUser($id) {

        $user = User::find($id);
        $roles = Role::all();
        return view('admin.user.user-edit', compact('user', 'roles'));
    }


    public function saveUser(Request $request) {

        $rules = [
            'name' => 'bail|required|string|max:255',
            'email' => 'bail|required|email|max:255',
            'password' => 'bail|required|string|confirmed|min:6',
            'role_id' => 'bail|required|exists:roles,id',
            'status' => 'nullable|boolean'
        ];

        $customMessages = [
            'role_id.required' => 'User role is required',
        ];

        $validatedData = $this->validate($request, $rules, $customMessages);

        $validatedData['password'] = Hash::make($validatedData['password']);
        User::create($validatedData);

        return redirect('admin/users')->with('success', 'user saved successfully!');
    }
    
    public function updateUser(Request $request) {
        
        $rules = [
            'name' => 'bail|required|string|max:255',
            'email' => 'bail|required|email|max:255',
            'role_id' => 'bail|required|exists:roles,id',
            'status' => 'nullable|boolean'
        ];

        $customMessages = [
            'role_id.required' => 'User role is required',
            
        ];

        $validatedData = $this->validate($request, $rules, $customMessages);

        $id = $request->id;
        User::find($id)->update($validatedData);

        return redirect('admin/user/edit/'.$id)->with('success', 'user details update successfully!');
    }

    public function editPasswordUser($id) {

        $user = User::find($id);
        $roles = Role::all();
      
        return view('admin.user.user-update-password', compact('user'));
    }

    public function passwordUpdateUser(Request $request) {

        $validatedData = $request->validate([
            'email' => 'bail|required|email|max:255',
            'password' => 'bail|required|string|confirmed|min:6',
            'id' => 'nullable|int'
        ]);
       
        $id = $request->id;
        $validatedData['password'] = Hash::make($validatedData['password']);
        User::find($id)->update($validatedData);

        return redirect('admin/user/password-edit/'.$id)->with('success', 'user password update successfully!');
    }

    public function noAuth(Request $request) {

        return view('admin.not-authorized');
    }
}