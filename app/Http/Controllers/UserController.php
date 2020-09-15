<?php

namespace App\Http\Controllers;

use App\User;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $roles = Role::get();
        $users = User::has('roles')->get();
        return view('permission.assignUser.assignUser', compact('roles', 'users'));
    }

    public function store()
    {
        request()->validate([
            'username' => 'required',
            'roles' => 'array|required'
        ]);

        $user = User::where('username', request('username'))->first();
        $user->assignRole(request('roles'));

        return back()->with('success', "Permission berhasil ditambahkan ke {$user->username}!");
    }

    public function edit(User $user)
    {
        return view('permission.assignUser.edit', [
            'user' => $user,
            'roles' => Role::get(),
            'users' => User::has('roles')->get(),

        ]);
    }

    public function update(User $user)
    {
        $user->syncRoles(request('roles'));

        return back()->with('success', "User{$user->name} berhasil disinkron!");
    }
}
