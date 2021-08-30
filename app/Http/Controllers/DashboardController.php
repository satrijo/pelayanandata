<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    public function index()
    {
        $count = Order::all();
        $sum    = $count->where('status', 'Selesai')->sum('total');
        $selesai    = $count->where('status', 'Selesai')->count();
        $ditinjau   = $count->where('status', 'Permohonan Diterima')->count();



        $data = Order::orderBy('id','DESC')->paginate(5);

        return view('backend.dashboard', compact('data', 'count', 'sum', 'selesai', 'ditinjau'));

    }
}
