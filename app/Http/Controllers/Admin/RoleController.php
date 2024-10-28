<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use Yajra\DataTables\Facades\DataTables;

class RoleController extends Controller
{
    public function __construct()
    {
        // $this->middleware('permission:roles.view', ['only' => ['index', 'show']]);
        // $this->middleware('permission:roles.add', ['only' => ['create', 'store']]);
        // $this->middleware('permission:roles.edit', ['only' => ['edit', 'update']]);
        // $this->middleware('permission:roles.delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $roles = Role::select('id', 'name');

        if ($request->ajax()) {
            return DataTables::of($roles)
                ->addIndexColumn()
                ->addColumn('name', function ($row) {
                    return $row->name;
                })
                ->editColumn('action', 'admin.roles.datatables.action')
                ->rawColumns(['name', 'action'])
                ->make(true);
        }

        $role_permission = Permission::select('name')->groupBy('name')->get();

        $permissions = [];

        foreach ($role_permission as $per) {
            $key = substr($per->name, 0, strpos($per->name, '.'));

            if (str_starts_with($per->name, $key)) {
                $permissions[$key][] = $per;
            }
        }

        return view('admin.roles.index', compact('permissions'));
    }

    public function create()
    {
        $role_permission = Permission::select('name')->groupBy('name')->get();

        $custom_permission = [];

        foreach ($role_permission as $per) {
            $key = substr($per->name, 0, strpos($per->name, '.'));

            if (str_starts_with($per->name, $key)) {
                $custom_permission[$key][] = $per;
            }
        }

        return view('admin.roles.create', compact('custom_permission'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name',
            'permissions' => 'required',
        ]);

        $role = Role::create(['name' => $request->name]);

        if ($request->permissions) {
            foreach ($request->permissions as $permission) {
                $role->givePermissionTo($permission);
            }
        }

        return to_route('roles.index')->with('success', 'Created Successfully');
    }

    public function show(Role $role)
    {
        $role_permission = Permission::select('name', 'id')->get();

        $custom_permission = [];

        foreach ($role_permission as $per) {
            $key = substr($per->name, 0, strpos($per->name, '.'));

            if (str_starts_with($per->name, $key)) {
                $custom_permission[$key][] = $per;
            }
        }

        return view('admin.roles.view', compact('role_permission', 'role', 'custom_permission'));
    }

    public function edit(Role $role)
    {
        if (in_array($role->id, ['1'])) {
            return to_route('roles.index')->with('error', 'System role can not be edit.');
        }

        $role_permission = Permission::select('name', 'id')->get();

        $custom_permission = [];

        foreach ($role_permission as $per) {
            $key = substr($per->name, 0, strpos($per->name, '.'));

            if (str_starts_with($per->name, $key)) {
                $custom_permission[$key][] = $per;
            }
        }

        return view('admin.roles.edit', compact('role_permission', 'role', 'custom_permission'));
    }

    public function update(Request $request, Role $role)
    {
        if (in_array($role->id, ['1'])) {
            return to_route('roles.index')->with('error', 'System role cannot be edit.');
        }

        $request->validate([
            'name' => 'required|unique:roles,name,'.$role->id,
        ]);

        $role->name = $request->name;
        $role->save();

        $role->syncPermissions($request->permissions);

        return to_route('roles.index')->with('success', 'Updated Successfully');
    }

    public function destroy(Role $role)
    {
        if (in_array($role->id, ['1'])) {
            return response()->json(['success' => false, 'message' => 'System role can not be edit.']);
        }

        $users = User::role($role->name)->get();

        if ($users->isNotEmpty()) {
            return response()->json(['success' => false, 'message' => 'Cannot delete this role user has attached to this role.']);
        }

        $role->permissions()->detach();
        $role->delete();

        // foreach ($users as $user) {
        //     $user->permissions()->detach();
        //     $user->roles()->detach();
        // }

        return to_route('roles.index')->with('delete', 'Deleted Successfully');
    }
}
