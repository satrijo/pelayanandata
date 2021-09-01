<?php

namespace App\Http\Controllers;

use App\Models\Confirmation;
use App\Models\Order;


use Illuminate\Http\Request;

class ConfirmationController extends Controller
{
    public function index()
    {
        return view('front.konfirmasi');
    }

    public function store(Request $request)
    {
        $validate =  $request->validate([
            'invoice'   =>  'required|numeric',
            'bukti'     =>  'required|mimes:png,jpg,pdf|max:5000',
        ]);

        $ada = Order::where('invoice', $request->invoice)->first();

        if (is_null($ada)){
            return back()->with(['gagal' => 'Maaf nomor invoice yang anda masukan tidak tersedia']);
        }

        $konfirmasi = Confirmation::create([
            'invoice'       =>      $request->invoice,
            'bukti'         =>      $request->bukti->store('public/buktikonfirmasi'),
        ]);


        return back()->with(['berhasil' => 'Sukses mengirim konfirmasi']);



    }
}
