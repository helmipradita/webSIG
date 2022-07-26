<?php

namespace App\Http\Controllers\Permissions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\{Permission, Role};

class AssignController extends Controller
{
    public function create() 
    {
        return view('dashboard.spatie.assign.create', [
            'roles' => Role::get(),
            'permissions' => Permission::get(),
        ]);
    }

    public function store() 
    {
        request()->validate([
            'role' => 'required',
            'permissions' => 'array|required',
        ]);

        $role = Role::find(request('role'));
        $role->givePermissionTo(request('permissions'));

        return back()->with('success', "Permission has been assigned to the role {$role->name}");
    }

    public function edit(Role $role) 
    {
        return view('dashboard.spatie.assign.sync',[
            'role' => $role,
            'roles' => Role::get(),
            'permissions' => Permission::get(),
        ]);
    }

    public function update(Role $role) 
    {
        request()->validate([
            'role' => 'required',
            'permissions' => 'array|required',
        ]);

        $role->syncPermissions(request('permissions'));

        return redirect()->route('assign.create')->with('success', "The Permission has been synced");
    }
}
