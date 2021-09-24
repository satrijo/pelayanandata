<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Order;
use App\Models\Setting;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;


use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = Contact::first();

        return view('front.home', compact('data'));
    }

    public function monitoring()
    {
        return view('front.monitoring');
    }

    public function monitoringCek(Request $request)
    {
        $id = $request->invoice;
        return redirect()->route('order.sukses', ['id' => $id])->withInput();
    }

    public function sukses($id)
    {

        $data = Order::where('invoice', $id)->first();

        // ->delay(Carbon::now()->addSeconds(10))

        $produk = $data->prices()->get();

        return view('front.sukses', compact('data', 'produk'));
    }

    public function pdf($id)
    {
        $data = Order::where('invoice', $id)->first();

        $qr = $data->qrcode;

        $produk = $data->prices()->get();

        $pdf = PDF::loadView('pdf.invoice', compact('data', 'produk', 'qr'))->setPaper('a4', 'portrait');
        return $pdf->stream($data->invoice . '.pdf');

        // return view('pdf.invoice', compact('data', 'produk', 'qr'));
    }
}
