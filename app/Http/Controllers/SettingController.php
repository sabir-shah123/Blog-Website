<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    protected $page_title = 'Settings';
    public function __construct()
    {
        view()->share('page_title', $this->page_title);
    }

    function list() {
        $setting = Setting::where('user_id', 1)->pluck('value', 'name')->toArray();
        return view('backend.setting', compact('setting'));
    }

    public function save(Request $request)
    {
        foreach ($request->except('_token') as $key => $value) {
            if($key == 'logo' || $key == 'favicon') {
                $value = uploadFile($value, 'uploads/logo', $key.'_'.time());
            }
            Setting::updateOrCreate(
                ['user_id' => 1, 'name' => $key],
                ['value' => $value]
            );
        }
        return redirect()->back()->with('success', 'Settings saved successfully');
    }

}
