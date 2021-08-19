<?php

namespace App\Http\Controllers;

use App\Models\Price;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return view('backend.order');
    }

    public function show()
    {
        return view('backend.order-detail');
    }

    public function create()
    {
        $take = Price::where('status', 'aktif')->count();
        $harga = Price::where('status', 'aktif')->orderBy('namalayanan')->get();

        return view('front.order', compact('harga'));
    }

    public function store(Request $request)
    {
        dd($request->input());
    }
}
