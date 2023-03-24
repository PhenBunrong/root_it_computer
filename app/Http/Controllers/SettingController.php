<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function index()
    {
        return view('backEnd.setting.edit');
    }

    public function store(Request $request)
    {
        /*1- dd($request); */

        /*2- dd($request->all()); */

        /* 3- */
        $data = $request->except('_token');
        foreach ($data as $key => $value){
            $setting = Setting::firstOrCreate(['key' => $key]);
            $setting->value = $value;
            $setting->save();
        }

        /* return response([
            'success' => true
        ]); */

        return redirect()->route('settings.index');
    }
}
