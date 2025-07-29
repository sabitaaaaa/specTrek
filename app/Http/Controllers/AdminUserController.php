<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::with('roles')->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
{
    $request->validate([
        'name' => 'required|string',
        'email' => 'required|email',
        'role' => 'required|exists:roles,name',
        'status' => 'required|boolean',
    ]);

    $user->update($request->only(['name', 'email', 'status']));

    // Assign a single role
    $user->syncRoles([$request->role]);

    return redirect()->route('admin.users.index')->with('success', 'User updated.');
}

    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('success', 'User deleted.');
    }
}
