<?php

namespace Zeus\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Zeus\Models\ModelType;
use Zeus\Models\Permission;
use Zeus\Models\Role;
use Zeus\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', \Zeus\Models\User::class);
        $admins = User::with('role')->get();
        return view('zview::pages.security.admins', compact('admins'));
    }
    public function create(Request $request)
    {
        $user = $request->user('zeus');
        $user->load('role');
        $roles = Role::where('rank', '>=', $user->role->rank)->get();
        $permissions = Permission::active()->get();
        return view('zview::pages.security.create-admin', compact('roles', 'permissions'));
    }
    public function store(Request $request)
    {
        $this->authorize('create', User::class);
        $request->validate([
            'name' => 'required|string|max:25|unique:users,name',
            'email' => 'required|email:filter|unique:users,email',
            'role' => 'required|numeric|min:1',
            'password' => 'required|string|min:8|max:60|confirmed',
            'first_name' => 'nullable|string|min:3|max:60',
            'last_name' => 'nullable|string|min:3|max:60',
            // ''
        ]);
        $role = Role::findOrFail($request->input('role'));
        $user = new User();
        $user->name = $request->input('name');
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('name'));
        $user->lang = $request->input('lang');
        $user->role()->associate($role);
        $user->save();
        $user->permissions()->attach(array_keys($request->input('permissions')));
        flash()->success(__('zlang::main.messages.admin-created'));

        return redirect()->to(route('zeus.admins.index'));
    }
}