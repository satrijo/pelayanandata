<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Setting;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function meta()
    {
        $data = Setting::first();

        return $data;
    }

    public function kontak()
    {
        $data = Contact::first();

        return $data;
    }

    public function edit()
    {
        $data = Setting::first();

        return view('backend.setting.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Setting::find($id)->update($request->input());

        return back();
    }
}
