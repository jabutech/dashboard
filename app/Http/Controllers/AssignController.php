<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AssignController extends Controller
{
    public function index()
    {
        $roles = Role::get();
        $permissions = Permission::get();

        return view('permission.assign.assign', compact('roles', 'permissions'));
    }

    public function store()
    {
        request()->validate([
            'role' => 'required',
            'permissions' => 'array|required',
        ]);

        $role = Role::find(request('role'));
        $role->givePermissionTo(request('permissions'));

        return back()->with('success', "Permission berhasil ditambahkan ke role {$role->name}!");
    }

    public function edit(Role $role)
    {

        return view('permission.assign.sync',[
            'role' => $role,
            'roles' => Role::get(),
            'permissions' => Permission::get(),
        ]);
    }

    public function update(Role $role)
    {
        request()->validate([
            'role' => 'required',
        ]);
        
        $role->syncPermissions(request('permissions'));

        return back()->with('success', 'Permission berhasil di sinkron!');
    }
}
