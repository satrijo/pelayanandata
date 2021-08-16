<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index($nama = 'jamal', $pekerjaan = 'programmer')
    {
        $data = [];
        $data['nama'] = $nama;
        $data['pekerjaan'] = $pekerjaan;

        return view('front.permohonan', compact('data'));
    }
}
