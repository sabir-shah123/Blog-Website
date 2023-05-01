<?php

use App\Models\Setting;

function uploadFile($file, $path, $name)
{
    $name = $name . '.' . $file->ClientExtension();
    $file->move($path, $name);
    return $path . '/' . $name;
}

function setting($name,$default = '')
{
    $setting = Setting::where('user_id', 1)->pluck('value', 'name')->toArray();
    return isset($setting[$name]) ? $setting[$name] : $default;
}

