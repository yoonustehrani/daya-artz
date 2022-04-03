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
            'name' => 'required|string|max:25|unique:zeus_users,name',
            'email' => 'required|email:filter|unique:zeus_users,email',
            'role' => 'required|numeric|min:1',
            'password' => 'required|string|min:8|max:60|confirmed',
            'first_name' => 'nullable|string|min:3|max:60',
            'last_name' => 'nullable|string|min:3|max:60',
        ]);
        try {
            \DB::beginTransaction();
            $role = Role::findOrFail($request->input('role'));
            $user = new User();
            $user->name = $request->input('name');
            $user->first_name = $request->input('first_name');
            $user->avatar = $request->input('avatar');
            $user->last_name = $request->input('last_name');
            $user->email = $request->input('email');
            $user->password = bcrypt($request->input('password'));
            $user->lang = $request->input('lang');
            $user->role()->associate($role);
            if ($user->save()) {
                $user->permissions()->attach(array_keys($request->input('permissions')));
                flash()->success(__('zlang::main.messages.admin-created'));
                \DB::commit();
            }
            return redirect()->to(route('zeus.admins.index'));
        } catch (\Throwable $th) {
            \DB::rollback();
            return back();
        }
    }
    public function edit(User $admin)
    {
        $admin->load('permissions', 'role');
        $roles = $admin->role ? Role::where('rank', '>=', $admin->role->rank)->get() : [];
        $permissions = Permission::active()->get();
        return view('zview::pages.security.edit-admin', compact('admin', 'roles', 'permissions'));
    }
    public function update(Request $request, User $admin)
    {
        $request->validate([
            'name' => 'required|string|max:25|unique:zeus_users,name,' . $admin->id,
            'email' => 'required|email:filter|unique:zeus_users,email,' . $admin->id,
            'role' => 'required|numeric|min:1',
            'password' => 'nullable|string|min:8|max:60|confirmed',
            'first_name' => 'nullable|string|min:3|max:60',
            'last_name' => 'nullable|string|min:3|max:60',
        ]);
        try {
            \DB::beginTransaction();
            $role = Role::findOrFail($request->input('role'));
            $admin->name = $request->input('name');
            $admin->first_name = $request->input('first_name');
            $admin->avatar = $request->input('avatar');
            $admin->last_name = $request->input('last_name');
            $admin->email = $request->input('email');
            if ($request->input('password')) {
                $admin->password = bcrypt($request->input('password'));
            }
            $admin->lang = $request->input('lang');
            $admin->role()->associate($role);

            if ($admin->save()) {
                flash()->success(__('zlang::main.messages.admin-updated', ['adminId' => $admin->getKey()]));
                $admin->permissions()->sync(array_keys($request->input('permissions')));
                \DB::commit();
            }
            return redirect()->to(route('zeus.admins.edit', ['admin' => $admin->getKey()]));
        } catch (\Throwable $th) {
            \DB::rollback();
            return back();
        }
        
    }
}