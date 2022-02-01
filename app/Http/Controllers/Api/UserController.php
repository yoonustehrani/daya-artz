<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function update(Request $request)
    {
        $request->validate([
            'email' => [
                'nullable',
                Rule::requiredIf(is_null($request->input('phone_number'))),
                'string',
                'email:filter', // ,dns
                Rule::unique('users')->ignore($request->user()->id)
            ],
            'phone_number' => [
                'nullable',
                Rule::requiredIf(is_null($request->input('email'))),
                'string',
                'regex:/^9[0-9]{9}$/',
                Rule::unique('users')->ignore($request->user()->id)
            ],
            'password' => 'nullable|string|min:8|max:60|confirmed'
        ]);
        $user = $request->user();
        if ($request->input('email') && $user->email !== $request->email) {
            $user->email = $request->email;
            $user->email_verified_at = null;
        }
        if ($request->input('phone_number') && $user->phone_number !== $request->phone_number) {
            $user->phone_number = $request->phone_number;
            $user->phone_verified = false;
        }
        if ($request->input('password')) {
            $user->password = bcrypt($request->input('password'));
        }
        return response()->json([
            'okay' => $user->isDirty() ? $user->save() : true,
            'user' => $user
        ]);
    }
    public function updateInfo(Request $request)
    {
        $request->validate([
            'firstname' => 'nullable|string|min:2|max:30',
            'lastname' => 'required|string|min:3|max:30'
        ]);
        $user = $request->user();
        $user->firstname = $request->input('firstname');
        $user->lastname = $request->input('lastname');
        return response()->json([
            'okay' => $user->save(),
            'user' => $user
        ]);
    }
    public function updateCompany(Request $request)
    {
        $user_company = $request->user()->company()->first();

        return response()->json($user_company);
        // if (! $company) {
        //     $company = new Company();
        // }
        // $company->title = $request->input('title');
        // $company->title_en = $request->input('title_en');
        // $company->phone_number = $request->input('phone_number');
        // $company->address = $request->input('address');
        // $company->website = $request->input('website');
        // $company->market_type = $request->input('market_type') === 'classic' ? 'classic' : 'modern';
        // $company->intro = $request->input('intro');
        // $company->details = $request->input('details');
    }
}