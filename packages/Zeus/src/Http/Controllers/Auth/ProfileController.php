<?php

namespace Zeus\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    public function show()
    {
        // return auth('zeus')->user();
        return view('zview::pages.profile')->with('user', auth('zeus')->user());
    }
    public function update(Request $request)
    {
        $request->validate([
            'first_name' => 'nullable|string|min:2|max:20',
            'last_name' => 'required|string|min:3|max:20',
            'lang' => Rule::in(['fa', 'en'])
        ]);
        $user = auth('zeus')->user();
        $user->fill($request->all());
        
        if ($user->save()) {
            flash()->success(__('zlang::main.messages.profile-updated'));
        } else {
            flash()->error(__('Error'));
        }
        return redirect()->to(route('zeus.auth.profile'));
    }
    public function authUpdate(Request $request)
    {
        $request->validate([
            'email' => 'required|email:rfc,dns',
            'name' => 'required|alpha_num|min:4|max:20',
            'password' => [
                'nullable',
                'confirmed',
                Password::min(8)->letters()->mixedCase()->numbers()->symbols()
            ]
        ]);
        $user = auth('zeus')->user();
        $user->name = $request->input('name');
        if ($user->email !== $request->input('email')) {
            $user->email = $request->input('email');
            $user->email_verified_at = null;
        }
        if ($request->input('password')) {
            $user->password = bcrypt($request->input('password'));
        }
        if ($user->save()) {
            flash()->success(__('zlang::main.messages.profile-updated'));
        } else {
            flash()->error(__('Error'));
        }
        return redirect()->to(route('zeus.auth.profile'));
    }
    public function updateAvatar(Request $request)
    {
        $request->validate([
            'avatar' => 'nullable|string'
        ]);
        $user = auth('zeus')->user();
        $user->avatar = $request->input('avatar');
        if ($user->save()) {
            flash()->success(__('zlang::main.messages.profile-updated'));
        } else {
            flash()->error(__('Error'));
        }
        return redirect()->to(route('zeus.auth.profile'));
    }
}