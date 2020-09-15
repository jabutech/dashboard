<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::get();
        $permission = new Permission;
        return view('permission.permissions.permission', compact('permissions', 'permission'));
    }

    public function store()
    {
        request()->validate([
            'name' => 'required',
        ]); 

        Permission::create([
            'name' => request('name'),
            'guard_name' => request('guard_name') ?? 'web',
        ]);

        return back()->with('success', 'Permission berhasil ditambahkan!');
    }

    public function edit(Permission $permission)
    {
        return view('permission.permissions.edit', [
            'permission' => $permission,
            'submit' => 'Update' ,
        ]);
    }

    public function update(Permission $permission)
    {
        request()->validate([
            'name' => 'required',
        ]); 

        $permission->update([
            'name' => request('name'),
            'guard_name' => request('guard_name') ?? 'web',
        ]);

        return back()->with('success', 'Permission berhasil di update!');
    }

    public function delete(Permission $permission)
    {
        $permission->delete();
        
        return back()->with('success', 'Permission berhasil di hapus!');
    }
}
