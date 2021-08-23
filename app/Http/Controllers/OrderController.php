<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Price;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Redirect;

use SimpleSoftwareIO\QrCode\Facades\QrCode;

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

        ]);

        $invoice = time();

        $qr = QrCode::format('png')->merge(url('images/logo_putih.png'), 0.25, true)->size(300)->margin(1)->errorCorrection('H')
            ->generate('www.joglohub.com', public_path('images/qr/' . $invoice . '.png'));

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

        // dd($request->file());

        $order = Order::create([
            'invoice'           => $invoice,
            'nama'              => $request->nama,
            'nik'               => $request->nik,
            'nohp'              => $request->nohp,
            'email'             => $request->email,
            'instansi'          => $request->instansi,
            'jenispelayanan'    => $request->jenispelayanan,
            'alamat'            => $request->alamat,
            'suratpermohonan'   => $request->suratpermohonan->store('berkas'),
            'scanktp'           => $request->scanktp->store('berkas'),
            'suratpengantar'    => $request->suratpengantar ? $request->suratpengantar->store('berkas') : null,
            'suratpernyataan'   => $request->suratpernyataan ? $request->suratpernyataan->store('berkas') : null,
            'proposal'          => $request->proposal ? $request->proposal->store('berkas') : null,
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


        // return view('front.sukses');
        return redirect()->route('order.sukses', ['id' => $id])->withInput();
    }

    public function sukses($id)
    {
        $data = Order::where('invoice', $id)->first();

        return view('front.sukses', compact('data'));
    }
}
