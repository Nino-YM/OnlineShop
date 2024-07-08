<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $this->authorize('viewAny', User::class);
        $users = User::with('role')->get();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $this->authorize('create', User::class);
        return view('users.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create', User::class);
        User::create($request->all());
        return redirect()->route('users.index');
    }

    public function show(User $user)
    {
        $this->authorize('view', $user);
        $user->load('role');
        $roles = Role::all();
        return view('users.show', compact('user', 'roles'));
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $this->authorize('update', $user);
        $user->update($request->all());
        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
        $this->authorize('delete', $user);
        $user->reviews()->delete();
        $user->orders()->delete();
        $user->favorites()->delete();
        $user->addresses()->detach();
        $user->delete();
    
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
    
    public function updateRole(Request $request, User $user)
    {
        $this->authorize('update', $user);
        $request->validate([
            'role_id' => 'required|exists:roles,id',
        ]);
    
        $user->update(['role_id' => $request->role_id]);
        return redirect()->route('users.show', $user)->with('success', 'User role updated successfully.');
    }
    
}
