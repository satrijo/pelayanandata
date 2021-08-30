<?php

namespace App\Http\Controllers;

use App\Models\Price;

use Illuminate\Http\Request;

class PriceController extends Controller
{
    public $data;

    public function index()
    {

        $data = Price::orderBy('namalayanan')->paginate(6);

        return view('backend.tarif.tarif', compact('data'));
    }

    public function create()
    {
        return view('backend.tarif.tambah');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        Price::create($data);

        return redirect()->route('tarif');
    }

    public function edit($id)
    {
        $edit = Price::find($id);

        return view('backend.tarif.edit', compact('edit'));
    }

    public function update(Request $request, $id)
    {
        $update = Price::find($id)->update($request->all());

        return redirect()->route('tarif');
    }
}
