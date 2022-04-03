<?php

namespace Zeus\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Zeus\Http\Controllers\BaseController;
use Zeus\Http\Requests\LoginRequest;

class LoginController extends BaseController
{
    public function store(LoginRequest $request)
    {
        $request->authenticate();
        $request->session()->regenerate();
        $permissions = request()->user('zeus')->permissions()->select('key')->get();
        if ($permissions) {
            $request->session()->put(
                'user_' . request()->user('zeus')->getKey() . '@abilities',
                $permissions->pluck('key')
            );
        }
        return redirect()->intended(route('zeus.dashboard'));
    }
    public function destroy(Request $request)
    {
        auth('zeus')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        flash()->info(__('zlang::main.messages.logout'));
        return redirect()->to(route('zeus.auth.login.form'));
    }
}