<?php

namespace App\Http\Controllers;

use App\Models\Contact;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $data = Contact::first();

        return view('front.kontak', compact('data'));
    }

    public function edit()
    {
        $data = Contact::first();
        return view('backend.contact.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Contact::find($id)->update($request->input());

        return back();
    }
}
