<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
        $data = Category::all();
        return view('backend.tarif.tambah', compact('data'));
    }

    public function store(Request $request)
    {
        $id = $request->category_id;
        $category = Category::find($id);

        $data = new Price;
        $data->namalayanan = $request->namalayanan;
        $data->jenislayanan = $category->nama;
        $data->tarif = $request->tarif;
        $data->category_id = $id;
        $data->satuan = $category->waktu;
        $data->status = $request->status;
        $data->save();


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
