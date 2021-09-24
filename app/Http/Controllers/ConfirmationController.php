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

        $meta = new OrderController;

        $ada = Order::where('invoice', $request->invoice)->first();

        if (is_null($ada)){
            return back()->with(['gagal' => 'Maaf nomor invoice yang anda masukan tidak tersedia']);
        }

        if ($meta->metasetting()->token !== null) {

            try {
                $baseApiUrl = 'https://api.kirimwa.id/v1';
                $reqParams = [
                    'token' => $meta->metasetting()->token,
                    'url' => $baseApiUrl . '/messages',
                    'method' => 'POST',
                    'payload' => json_encode([
                        'message' => "Notifikasi\nKonfirmasi Pembayaran \n```Nomor Invoice: " . $request->invoice ." ```  \n\n ::Pesan ini dibuat otomatis:: ",
                        'phone_number' => $meta->metasetting()->wag,
                        'message_type' => 'text',
                        'device_id' => 'redminote',
                        'is_group_message' => true,
                    ])
                ];

                $response = $meta->apiKirimWaRequest($reqParams);
                // echo $response['body'];
            } catch (\Exception $e) {
                print_r($e);
            }

        }

        $konfirmasi = Confirmation::create([
            'invoice'       =>      $request->invoice,
            'bukti'         =>      $request->bukti->store('public/buktikonfirmasi'),
        ]);

        return back()->with(['berhasil' => 'Sukses mengirim konfirmasi']);



    }

    public function tabel()
    {
        $data = Confirmation::orderBy('id', 'DESC')->paginate(5);

        return view('backend.confirmation.index', compact('data'));
    }
}
