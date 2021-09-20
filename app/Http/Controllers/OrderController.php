<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Price;
use Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use DataTables;
use Illuminate\Support\Facades\Storage;

use SimpleSoftwareIO\QrCode\Facades\QrCode;
use File;

use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index()
    {
        $data = Order::orderBy('id', 'DESC')->paginate(6);

        return view('backend.order.order', compact('data'));
    }

    public function batal()
    {
        $data = Order::where('status', 'Batal')->orderBy('id', 'DESC')->paginate(6);

        return view('backend.order.order-batal', compact('data'));
    }

    public function diterima()
    {
        $data = Order::where('status', 'Permohonan Diterima')->orderBy('id', 'DESC')->paginate(6);

        return view('backend.order.order-diterima', compact('data'));
    }

    public function menungguPembayaran()
    {
        $data = Order::where('status', 'Menunggu Pembayaran')->orderBy('id', 'DESC')->paginate(6);

        return view('backend.order.order-menunggu-pembayaran', compact('data'));
    }

    public function diproses()
    {
        $data = Order::where('status', 'Diproses')->orderBy('id', 'DESC')->paginate(6);

        return view('backend.order.order-diproses', compact('data'));
    }

    public function selesai()
    {
        $data = Order::where('status', 'Selesai')->orderBy('id', 'DESC')->paginate(6);

        return view('backend.order.order-selesai', compact('data'));
    }

    public function bermasalah()
    {
        $data = Order::where('status', 'Permohonan Bermasalah')->orderBy('id', 'DESC')->paginate(6);

        return view('backend.order.order-bermasalah', compact('data'));
    }

    public function edit($id)
    {
        $data = Order::where('invoice', $id)->first();

        $produk = $data->prices()->get();
        return view('backend.order.edit-permohonan', compact('data', 'produk'));
    }

    public function update(Request $request, $id)
    {

        $data = Order::where('invoice', $id)->first();

        $request->infoadmin = is_null($request->infoadmin) ? 'Tidak ada pesan dari admin' : $request->infoadmin;
        $request->data = is_null($request->data) ? $data->data : $request->data->store('public/dataselesai');


        $pesan = "*Hallo $data->nama* \n```Status Permohonan Data Cuaca: $request->status``` \n\n```Note: $request->infoadmin```\n********* \n\nNo. invoice anda: $data->invoice \nSilahkan cek di https://ptsp.meteobaubau.com/monitoring/".$data->invoice. " untuk info lebih lanjut." . "\n\n::Pesan ini tidak untuk dibalas::\n::Hubungi admin: 08114037700::";

        // $pesan = 'test update';
        try {
            $baseApiUrl = 'https://api.kirimwa.id/v1';
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
            // dd($response['body']);
        } catch (\Exception $e) {
            print_r($e);
        }


        $update = Order::where('invoice', $id)->first()->update([
            'status'    => $request->status,
            'infoadmin' => $request->infoadmin,
            'officer' => $request->officer,
            'data'      => $request->data,
        ]);
        return back();
    }

    public function destroy($id)
    {
        $cek = Order::find($id);


        if($cek->jenispelayanan == 'nolrupiah')
        {
            Storage::delete($cek->proposal);
            Storage::delete($cek->suratpernyataan);
            Storage::delete($cek->suratpengantar);
        }

        Storage::delete($cek->suratpermohonan);
        Storage::delete($cek->scanktp);
        Storage::delete($cek->qrcode);


        Order::destroy($id);
        return back();
    }



    public function create()
    {
        $category = Category::all();
        $take = Price::where('status', 'aktif')->count();
        $harga = Price::where('status', 'aktif')->orderBy('namalayanan')->get();

        return view('front.order', compact('harga', 'category'));
    }

    public function store(Request $request)
    {
        $jenisPelayanan = $request->jenispelayanan;
        $validasiNolRupiah = $jenisPelayanan == 'nolrupiah' ? 'required|mimes:jpg,bmp,png,doc,docx,pdf|max:1500' : 'nullable|mimes:jpg,bmp,png,doc,docx,pdf|max:1500';

        $validated = $request->validate([
            'suratpermohonan'   => 'required|mimes:jpg,bmp,png,doc,docx,pdf|max:1500',
            'scanktp'           => 'required|mimes:jpg,bmp,png,doc,docx,pdf|max:1500',
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
        $dateDari = str_replace('/', '-', $dari);

        $sampai = $request->periodesampai;
        $dateSampai = str_replace('/', '-', $sampai);

        if($request->category == "hari"){
            $from =  strtotime($dateDari);
            $till=   strtotime($dateSampai);
            $hasil= $till - $from;
            $periode = ($hasil / (60 * 60 * 24) + 1);

        } else if ($request->category == "tahun") {
            $from =  strtotime($dateDari);
            $fromDate = idate('Y', $from);


            $till =   strtotime($dateSampai);
            $tillDate = idate('Y', $till);


            $hasil = $tillDate - $fromDate;
            $periode = ($hasil + 1);

            dd($periode);
        } else {
            $periode = 1;
        }

        // dd(date('Y-m-d', strtotime($dateDari)));


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
            'suratpermohonan'   => $request->suratpermohonan->store('public/datapermohonan'),
            'scanktp'           => $request->scanktp->store('public/datascanktp'),
            'suratpengantar'    => $request->suratpengantar ? $request->suratpengantar->store('public/datasuratpengantar') : null,
            'suratpernyataan'   => $request->suratpernyataan ? $request->suratpernyataan->store('public/datasuratpernyataan') : null,
            'proposal'          => $request->proposal ? $request->proposal->store('public/dataproposal') : null,
            'periodedari'       => $request->periodedari,
            'periodesampai'     => $request->periodesampai,
            'totalperiode'      => $periode,
            'keterangan'        => $request->keterangan,
            'kode'              => $request->kode,
            'pembayaran'        => $request->jenispelayanan == "nolrupiah" ? "nol rupiah" : $request->pembayaran,
            'total'             => $total,
            'qrcode'            => 'images/qr/' . $invoice . '.png',
            'status'            => 'Permohonan Diterima',
        ]);

        $order->prices()->sync($parameter);
        $pesan = "*Hallo $order->nama* \n*Permohonan Data Cuaca Sedang Ditinjau* \n \nNomor invoice anda adalah: $order->invoice \nTotal tarif Rp." . number_format($order->total, 2, ",", ".") . "\n\n::Pesan ini tidak untuk dibalas::\n::Hubungi admin: 08114037700::";
        $gambar = url($order->qrcode);
        try {
            $baseApiUrl = 'https://api.kirimwa.id/v1';
            $reqParams = [
                'token' => 'JYmU8E5eswOll6qd@Us1_Qw_iMtzNnLtefFTjvdXyNrUaqu~-satriyo',
                'url' => $baseApiUrl . '/messages',
                'method' => 'POST',
                'payload' => json_encode([
                    'message' => $gambar,
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
            $baseApiUrl = 'https://api.kirimwa.id/v1';
            $reqParams = [
                'token' => 'JYmU8E5eswOll6qd@Us1_Qw_iMtzNnLtefFTjvdXyNrUaqu~-satriyo',
                'url' => $baseApiUrl . '/messages',
                'method' => 'POST',
                'payload' => json_encode([
                    'message' => "Notifikasi Permohonan data atas nama \n$order->nama \nInstansi: $order->instansi \n\nNIK: $order->nik \nInvoice: $order->invoice \nNo. WA: $order->nohp  \n\n ::Pesan ini dibuat otomatis:: ",
                    'phone_number' => '6282111119138-1629897035',
                    'message_type' => 'text',
                    'device_id' => 'redminote',
                    'is_group_message' => true,
                ])
            ];

            $response = $this->apiKirimWaRequest($reqParams);
            // echo $response['body'];
        } catch (\Exception $e) {
            print_r($e);
        }

        // dd($response['body']);

        $id = $order->invoice;

        return redirect()->route('order.sukses', ['id' => $id])->withInput();
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
