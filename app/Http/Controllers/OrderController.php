<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function create()
    {
        return view('front.order');
    }

    public function store(Request $request)
    {
        dd($request->input());
    }
}
