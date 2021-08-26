<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Price;
use Barryvdh\DomPDF\Facade as PDF;
use Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use DataTables;


use SimpleSoftwareIO\QrCode\Facades\QrCode;

use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index()
    {
        return view('backend.order');
    }

    public function getJson()
    {

        $data = Order::with('prices')->selectRaw('distinct orders.*')->get();

        return DataTables::of($data)
            ->addColumn('namalayanan', function ($data) {
                return implode(', ', $data->prices->pluck('namalayanan')->toArray());
            })
            ->addColumn('action', function ($data) {
                $actionBtn = "<a href='/dashboard/permohonan/$data->invoice/edit' class='edit btn btn-success btn-sm'>Edit</a>";
                return $actionBtn;
            })->editColumn('created_at', function ($data) {
                return date('l, d M Y', strtotime($data->created_at));
            })->editColumn('jenispelayanan', function ($data) {
                return strtoupper($data->jenispelayanan);
            })->editColumn('pembayaran', function ($data) {
                return ucwords($data->pembayaran);
            })

            ->rawColumns(['namalayanan', 'action'])
            ->make(true);
    }

    public function edit($id)
    {
        $data = Order::where('invoice', $id)->first();

        $produk = $data->prices()->get();
        return view('backend.edit-permohonan', compact('data', 'produk'));
    }

    public function update(Request $request, $id)
    {

        $data = Order::where('invoice', $id)->first();

        $pesan = "*Hallo $data->nama* \n*Status Permohonan Data Cuaca: $request->status* \n \nNo. invoice anda: $data->invoice \nSilahkan cek di http://ptsp.meteobaubau.com/monitoring/$data->invoice untuk info lebih lanjut." . "\n\n::Pesan ini tidak untuk dibalas::\n::Hubungi admin: 08114037700::";

        try {
            $baseApiUrl = getenv('API_BASEURL') ? getenv('API_BASEURL') : 'https://api.kirimwa.id/v1';
            $reqParams = [
                'token' => 'JYmU8E5eswOll6qd@Us1_Qw_iMtzNnLtefFTjvdXyNrUaqu~-satriyo',
                'url' => $baseApiUrl . '/messages',
                'method' => 'POST',
                'payload' => json_encode([
                    'message' => $pesan,
                    'phone_number' => $data->nohp,
                    'message_type' => 'text',
                    'device_id' => 'redminote',
                ])
            ];

            $response = $this->apiKirimWaRequest($reqParams);
            // echo $response['body'];
        } catch (\Exception $e) {
            print_r($e);
        }


        $update = Order::where('invoice', $id)->first()->update(['status' => $request->status, 'infoadmin' => $request->infoadmin]);
        return back();
    }

    public function create()
    {
        $take = Price::where('status', 'aktif')->count();
        $harga = Price::where('status', 'aktif')->orderBy('namalayanan')->get();

        return view('front.order', compact('harga'));
    }

    public function store(Request $request)
    {
        $jenisPelayanan = $request->jenispelayanan;
        $validasiNolRupiah = $jenisPelayanan == 'nolrupiah' ? 'required|mimes:jpg,bmp,png,doc,docx,pdf' : 'nullable|mimes:jpg,bmp,png,doc,docx,pdf';

        $validated = $request->validate([
            'suratpermohonan'   => 'required|mimes:jpg,bmp,png,doc,docx,pdf',
            'scanktp'           => 'required|mimes:jpg,bmp,png,doc,docx,pdf',
            'suratpengantar'    =>  $validasiNolRupiah,
            'suratpernyataan'   =>  $validasiNolRupiah,
            'proposal'          =>  $validasiNolRupiah,
            'parametercuaca'    => 'required',
            'periodedari'       => 'required',
            'periodesampai'     => 'required',
            'keterangan'        => 'required',

        ]);

        // dd($request);

        $invoice = time();

        $qr = QrCode::format('png')->merge(url('images/logo_putih.png'), 0.25, true)->size(300)->margin(1)->errorCorrection('H')
            ->generate(url('monitoring/' . $invoice), public_path('images/qr/' . $invoice . '.png'));

        $dari = $request->periodedari;
        $sampai = $request->periodesampai;
        $periode = ($sampai - $dari) + 1;

        $parameter = $request->parametercuaca;

        $prices = Price::whereIn('id', $parameter)->get('tarif')->toArray();

        $i = 0;
        $batas = count($parameter);
        while ($i < $batas) {
            $push[] = $prices[$i]['tarif'] * $periode;
            $i++;
        }

        $total = array_sum($push);

        if ($request->jenispelayanan == "nolrupiah") {
            $total = 0;
        }

        $nohp = $request->nohp;

        if (!preg_match('/[^+0-9]/', trim($nohp))) {
            // cek apakah no hp karakter 1-3 adalah +62
            if (substr(trim($nohp), 0, 3) == '+62') {
                $hp = substr(trim($nohp), 1);
            } elseif (substr(trim($nohp), 0, 1) == '0') {
                $hp = '62' . substr(trim($nohp), 1);
            } else if (substr(trim($nohp), 0, 1) == '8') {
                $hp = '62' . trim($nohp);
            }
        }

        $order = Order::create([
            'invoice'           => $invoice,
            'nama'              => $request->nama,
            'nik'               => $request->nik,
            'nohp'              => $hp,
            'email'             => $request->email,
            'instansi'          => $request->instansi,
            'jenispelayanan'    => $request->jenispelayanan,
            'alamat'            => $request->alamat,
            'suratpermohonan'   => $request->suratpermohonan->store('public'),
            'scanktp'           => $request->scanktp->store('public'),
            'suratpengantar'    => $request->suratpengantar ? $request->suratpengantar->store('public') : null,
            'suratpernyataan'   => $request->suratpernyataan ? $request->suratpernyataan->store('public') : null,
            'proposal'          => $request->proposal ? $request->proposal->store('public') : null,
            'periodedari'       => $request->periodedari,
            'periodesampai'     => $request->periodesampai,
            'keterangan'        => $request->keterangan,
            'kode'              => $request->kode,
            'pembayaran'        => $request->pembayaran,
            'total'             => $total,
            'qrcode'            => '/images/qr/' . $invoice . '.png',
            'status'            => 'Menunggu Pembayaran',
        ]);

        $order->prices()->sync($parameter);

        $id = $order->invoice;
        $data = $order;
        $mail = $order->toArray();

        $produk = $order->prices()->get();

        $pdf = PDF::loadView('pdf.invoice', compact('data', 'produk'))->setPaper('a4', 'portrait');

        Mail::send('email.laporan', $mail, function ($message) use ($mail, $pdf) {
            $message->to($mail['email'])
                ->subject("Pelayanan BMKG: "  . $mail['status'])
                ->attachData($pdf->output(), "invoice-" . $mail['invoice'] . ".pdf");
        });


        $pesan = "*Hallo $order->nama* \n*Permohonan Data Cuaca Sedang Ditinjau* \n \nNomor invoice anda adalah: $order->invoice \nTotal tarif Rp." . number_format($order->total, 2, ",", ".") . "\n\n::Pesan ini tidak untuk dibalas::\n::Hubungi admin: 08114037700::";

        $gambar = url($order->qrcode);

        try {
            $baseApiUrl = getenv('API_BASEURL') ? getenv('API_BASEURL') : 'https://api.kirimwa.id/v1';
            $reqParams = [
                'token' => 'JYmU8E5eswOll6qd@Us1_Qw_iMtzNnLtefFTjvdXyNrUaqu~-satriyo',
                'url' => $baseApiUrl . '/messages',
                'method' => 'POST',
                'payload' => json_encode([
                    'message' => 'https://img.okezone.com/content/2021/08/07/608/2452402/bmkg-pantau-24-titik-panas-di-sumut-ini-daftarnya-OCpqGDEzjN.jpg',
                    'phone_number' => $hp,
                    'message_type' => 'image',
                    'device_id' => 'redminote',
                    'caption' => $pesan,
                ])
            ];

            $response = $this->apiKirimWaRequest($reqParams);
            // echo $response['body'];
        } catch (\Exception $e) {
            print_r($e);
        }

        try {
            $baseApiUrl = getenv('API_BASEURL') ? getenv('API_BASEURL') : 'https://api.kirimwa.id/v1';
            $reqParams = [
                'token' => 'JYmU8E5eswOll6qd@Us1_Qw_iMtzNnLtefFTjvdXyNrUaqu~-satriyo',
                'url' => $baseApiUrl . '/messages',
                'method' => 'POST',
                'payload' => json_encode([
                    'message' => "Notifikasi Permohonan data atas nama \n$order->nama \nInstansi: $order->instansi \n\nNIK: $order->nik \nInvoice: $order->invoice \nNo. WA: $order->nohp  \n\n ::Pesan ini dibuat otomatis:: ",
                    'phone_number' => '6282111119138-1629897035',
                    'message_type' => 'text',
                    'device_id' => 'redminote',
                    'is_group_message' => true
                ])
            ];

            $response = $this->apiKirimWaRequest($reqParams);
            // echo $response['body'];
        } catch (\Exception $e) {
            print_r($e);
        }

        // dd($response['body']);


        return redirect()->route('order.sukses', ['id' => $id])->withInput();
    }

    public function sukses($id)
    {
        $data = Order::where('invoice', $id)->first();

        $produk = $data->prices()->get();

        return view('front.sukses', compact('data', 'produk'));
    }

    public function pdf($id)
    {
        $data = Order::where('invoice', $id)->first();

        $produk = $data->prices()->get();

        $pdf = PDF::loadView('pdf.invoice', compact('data', 'produk'))->setPaper('a4', 'portrait');
        return $pdf->download($data->invoice . '.pdf');

        // return view('pdf.invoice', compact('data', 'produk'));
    }

    public function konfirmasi()
    {
        //
    }

    function apiKirimWaRequest(array $params)
    {
        $httpStreamOptions = [
            'method' => $params['method'] ?? 'GET',
            'header' => [
                'Content-Type: application/json',
                'Authorization: Bearer ' . ($params['token'] ?? '')
            ],
            'timeout' => 15,
            'ignore_errors' => true
        ];

        if ($httpStreamOptions['method'] === 'POST') {
            $httpStreamOptions['header'][] = sprintf('Content-Length: %d', strlen($params['payload'] ?? ''));
            $httpStreamOptions['content'] = $params['payload'];
        }

        // Join the headers using CRLF
        $httpStreamOptions['header'] = implode("\r\n", $httpStreamOptions['header']) . "\r\n";

        $stream = stream_context_create(['http' => $httpStreamOptions]);
        $response = file_get_contents($params['url'], false, $stream);

        // Headers response are created magically and injected into
        // variable named $http_response_header
        $httpStatus = $http_response_header[0];

        preg_match('#HTTP/[\d\.]+\s(\d{3})#i', $httpStatus, $matches);

        if (!isset($matches[1])) {
            throw new \Exception('Can not fetch HTTP response header.');
        }

        $statusCode = (int)$matches[1];
        if ($statusCode >= 200 && $statusCode < 300) {
            return ['body' => $response, 'statusCode' => $statusCode, 'headers' => $http_response_header];
        }

        throw new \Exception($response, $statusCode);
    }
}
