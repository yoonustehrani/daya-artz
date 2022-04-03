<?php

namespace Zeus\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    public function index()
    {
        $groups = DB::select("select distinct `group` as 'name' from settings");
        if ($groups) {
            $groups = collect($groups)->pluck('name')->toArray();
        }
        $group = request()->query('group');
        abort_if(! in_array($group, $groups) && $group, 404);
        $settings = $group ? Setting::where('group', $group)->get() : [];
        return view('zview::pages.settings.index', compact('groups', 'settings'));
    }
    public function updateGroup(Request $request, $group)
    {
        $request->validate([
            'settings' => 'required|array'
        ]);
        $settings = Setting::select(['id', 'key', 'type', 'value'])
                    // ->whereIn('key', array_keys($requested))
                    ->where('group', $group)
                    ->get();
        foreach ($settings as $setting) {
            $value = isset($request->input("settings")[$setting->key]) ? $request->input("settings")[$setting->key] : null;
            if ($value) {
                $setting->value = $value;
                $setting->save();
            }
        }
        flash()->success('تنظیمات جدید با موفقیت اعمال شدند.');

        return redirect()->to(route('zeus.settings.index', ['group' => $group]));
    }
}