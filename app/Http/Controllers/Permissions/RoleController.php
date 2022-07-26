<?php

namespace App\Http\Controllers\Permissions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index() 
    {
        $roles = Role::get();
        $role = new Role;
        return view('dashboard.spatie.roles.index', compact('roles', 'role'));
    }

    public function store() 
    {
        request()->validate([
            'name' => 'required',
        ]);

        Role::create([
            'name' => request('name'),
            'guard_name' => request('guard_name') ?? 'web',
        ]);

        return back();
    }

    public function edit(Role $role) 
    {
        return view('dashboard.spatie.roles.edit', [
            'role' => $role,
            'submit' => 'Update',
        ]);
    }

    public function update(Role $role) 
    {
        request()->validate([
            'name' => 'required',
        ]);

        $role->update([
            'name' => request('name'),
            'guard_name' => request('guard_name') ?? 'web',
        ]);

        return redirect()->route('roles.index');
    }

    public function destroy(Role $role) 
    {
        $role->delete();

        return redirect()->route('roles.index');
    }
}

