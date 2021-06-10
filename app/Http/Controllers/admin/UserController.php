<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use App\Models\Role;
use App\Models\Permission;
use App\Models\User;

class UserController extends Controller
{

    public function manage_permisions()
    {
        $roles = DB::table('roles')->get();
        return view('admin.users.manage_permisions')->with(['roles' => $roles]);
    }

    public function create_permission(Request $request)
    {
        $permission = $request->input('permission');
        $permission = strtolower(preg_replace('/[^a-zA-Z0-9_.]/', '_', $permission));
        $display_name = $request->input('display_name');
        $description = $request->input('description');
        $roles = $request->input('roles');
        try {
            $permission = Permission::create([
                'name' => $permission,
                'display_name' => $display_name, // optional
                'description' => $description, // optional
            ]);

            if (count($roles) > 0) {
                foreach ($roles as $role) {
                    $role = Role::where('id', $role)->first();
                    $role->attachPermission($permission);
                }
            }
            $flash = array('type' => 'success', 'msg' => 'New Permission Created');
            $request->session()->flash('flash', $flash);
        } catch (QueryException $ex) {
            $flash = array('type' => 'error', 'msg' => $ex->getMessage());
            $request->session()->flash('flash', $flash);
        }
        return redirect('admin/users/manage_permissions');
    }

    public function manage_roles()
    {
        $permissions = DB::table('permissions')->get();
        return view('admin.users.manage_roles')->with(['permissions' => $permissions]);
    }

    public function create_role(Request $request)
    {
        $role = $request->input('role');
        $role = strtolower(preg_replace('/[^a-zA-Z0-9_.]/', '_', $role));
        $display_name = $request->input('display_name');
        $description = $request->input('description');
        $permissions = $request->input('permissions');
        try {
            $role = Role::create([
                'name' => $role,
                'display_name' => $display_name, // optional
                'description' => $description, // optional
            ]);
            if ($request->has('permissions')) {
                $role->attachPermissions($permissions);
            }
            $flash = array('type' => 'success', 'msg' => 'New Role Created');
            $request->session()->flash('flash', $flash);
        } catch (QueryException $ex) {
            $flash = array('type' => 'error', 'msg' => $ex->getMessage());
            $request->session()->flash('flash', $flash);
        }
        return redirect('admin/users/manage_roles');
    }

    public function manage_user(Request $request)
    {
        $roles = DB::table('roles')->get();
        return view('admin.users.manage_user')->with(['roles' => $roles]);
    }

    public function create_user(Request $request)
    {
        $role = $request->input('role');
        try {
            $user = User::create(request(['name', 'email', 'password']));
            $user->attachRole($role);
            $flash = array('type' => 'success', 'msg' => 'New User Created');
            $request->session()->flash('flash', $flash);
        } catch (QueryException $ex) {
            $flash = array('type' => 'error', 'msg' => $ex->getMessage());
            $request->session()->flash('flash', $flash);
        }
        return redirect('admin/user/manage_user');
    }
}
