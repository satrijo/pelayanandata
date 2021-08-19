<?php

namespace App\Http\Controllers;

use App\Models\Price;

use Illuminate\Http\Request;

class PriceController extends Controller
{
    public $data;

    public function create()
    {

        $data = Price::orderBy('namalayanan')->paginate(6);

        return view('backend.tarif', compact('data'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        Price::create($data);

        return back();
    }

    public function edit($id)
    {
        $edit = Price::find($id);

        return view('backend.edit-tarif', compact('edit'));
    }

    public function update(Request $request, $id)
    {
        $update = Price::find($id)->update($request->all());

        return redirect()->route('tarif');
    }
}
