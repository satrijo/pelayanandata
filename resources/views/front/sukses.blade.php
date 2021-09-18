@extends('front.layout.main')


@section('title')
Monitoring:  {{ $data->status }}
@endsection


@section('hero')
@include('front.layout.asset.hero-page')
@endsection

@section('content')
<section class="relative py-16 bg-gray-300">
    <div class="container mx-auto md:px-4">
        <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg -mt-64">
            <div class="bg-white dark:bg-gray-800 shadow- sm:rounded-lg md:px-10 py-3">

                {{-- Isi --}}
                <div class="bg-white dark:bg-gray-800 shadow- sm:rounded-b-lg px-10 py-3 -mt-2">
                    <section class="text-gray-600 body-font">
                        <div class="container md:px-5 py-20 mx-auto">
                            <div class="flex flex-col md:text-center w-full mb-8 ">
                                <h1 class="sm:text-4xl text-center text-3xl font-medium title-font mb-2 text-gray-900">Status Monitoring Permohonan Data</h1>
                                <p class="lg:w-2/3 text-center mx-auto leading-relaxed text-base mb-20">Informasi mengenai progres permohonan data yang diperbaharui secara berkala, Pastikan telah melakukan pembayaran agar permohonan anda segera ditindaklanjuti.</p>
                                @if (($data->status == "Menunggu Pembayaran") && ($data->jenispelayanan == "pnbp") && ($data->pembayaran == "transfer"))
                                    <div class="lg:w-2/3 mx-auto leading-relaxed text-base mb-20 border-2 border-dashed border-blue-500 p-2">
                                        <div class="bg-gray-200 p-4">
                                            <h2 class="text-xl font-medium title-font text-gray-900 ">Informasi Pembayaran</h2>
                                            <span>
                                                Silahkan Melakukan Transfer Ke Rekening<br>
                                                BANK SYARIAH INDONESIA: 7141499372 <br>
                                                a/n Satriyo Unggul Wicaksono<br>
                                                senilai Rp.{{ number_format($data->total,2) }}
                                            </span>
                                            <a href="{{ route('konfirmasi') }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                                                <p class="w-auto text-center bg-blue-600 text-white rounded-md py-2 px-4 mt-8 mb-3">Kirim konfirmasi Pembayaran</p>
                                            </a>
                                        </div>
                                    </div>
                                @elseif (($data->status == "Diproses") || ($data->status == "Selesai")  )

                                    <div class="lg:w-2/3 mx-auto text-center leading-relaxed text-base mb-20 p-2">
                                        <div class="bg-gray-100 p-4 rounded-md">
                                            <h2 class="text-xl font-medium title-font text-gray-900">Permohonan anda: {{$data->status}}</h2>
                                            <span class="font-mono mb-5">Note: {{$data->infoadmin}} </span>
                                            @if ($data->status == 'Selesai')
                                                <a href="{{ Storage::url($data->data) }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                                                    <p class="w-auto text-center bg-blue-600 text-white rounded-md py-2 px-4 mt-8 mb-3">Download Data Permohonan</p>
                                                </a>
                                            @endif
                                            <img class="mt-5" src="{{url('/images/'.strtolower($data->status).'.png')}}" />

                                        </div>
                                    </div>
                                @elseif ($data->status == "Permohonan Diterima")

                                    <div class="lg:w-2/3 mx-auto leading-relaxed text-base mb-20 p-2">
                                        <div class="bg-gray-100 p-4 rounded-md">
                                            <h2 class="text-xl font-medium title-font text-gray-900">{{$data->status}}, Silahkan Menunggu Konfirmasi Admin</h2>
                                            {{-- <span class="font-mono mb-5">Note: {{$data->infoadmin}} </span> --}}
                                            <img class="mt-5" src="{{url('/images/diterima.png')}}" />

                                        </div>
                                    </div>


                                @elseif ($data->status == "Permohonan Bermasalah")

                                    <div class="lg:w-2/3 mx-auto leading-relaxed text-base mb-20 p-2">
                                        <div class="bg-gray-100 p-4 rounded-md">
                                            <h2 class="text-xl font-medium title-font text-gray-900">{{$data->status}}, Silahkan berdiskusi dengan admin</h2>
                                            <span class="font-mono mb-5">Note: {{$data->infoadmin}} </span>
                                            <img class="mt-5" src="{{url('/images/bermasalah.png')}}" />

                                        </div>
                                    </div>

                                @endif

                                <div class="md:flex md:justify-between md:grid-cols-2 sm:mx-8 lg:mx-auto lg:w-2/3 sm:w-full md:w-2/3">
                                    <div class="md:block md:auto-cols-max text-left">
                                        <p class="mx-auto leading-relaxed text-base font-bold">Invoice: {{$data->invoice}} </p>
                                        <p class="mx-auto leading-relaxed text-base">Dibuat: {{ date('l, d M Y', strtotime($data->created_at))}} </p>
                                        <p class="mx-auto leading-relaxed text-base">Status: {{$data->status}} </p>
                                        <p class="mx-auto leading-relaxed text-base">Status: {{$data->jenispelayanan == "pnbp" ? "PNBP / Bertarif" : "Nol Rupiah"}} </p>
                                        <p class="mx-auto leading-relaxed text-base">Periode: {{$data->periodedari}} - {{$data->periodesampai}} </p>
                                        <p class="mx-auto leading-relaxed text-base capitalize">Metode Pembayaran: {{$data->pembayaran}} </p>
                                    </div>
                                    <div class="md:block md:auto-cols-max md:text-right sm:mt-5 md:mt-0">
                                        <p class="mx-auto leading-relaxed text-base md:text-right font-bold">Informasi Pemohon</p>
                                        <p class="mx-auto leading-relaxed text-base md:text-right">{{ $data->nama }}</p>
                                        <p class="mx-auto leading-relaxed text-base md:text-right">{{ $data->instansi }}</p>
                                        <p class="mx-auto leading-relaxed text-base md:text-right">{{ $data->email }} - {{ $data->nohp }}</p>
                                        <a href="{{ route('order.pdf', ['id'=>$data->invoice]) }}">
                                            <p class="text-center bg-blue-600 text-white rounded-md py-2 px-4">Download Invoice</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="lg:w-2/3 md:w-2/3 sm:mx-8 lg:mx-auto overflow-auto">
                            <p class="mx-auto leading-relaxed text-base text-left font-bold">Informasi Produk:</p>
                            <table class="table-auto w-full text-left whitespace-no-wrap">
                                <thead>
                                <tr>
                                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Produk</th>
                                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Jenis Layanan</th>
                                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Periode</th>
                                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Tarif</th>
                                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($produk as $p)
                                    <tr>
                                    <td class="px-4 py-3">{{ $p->namalayanan }}</td>
                                    <td class="px-4 py-3">{{ $p->jenislayanan }}</td>
                                    <td class="px-4 py-3">{{ $data->totalperiode }} {{  $p->satuan }}</td>
                                    <td class="px-4 py-3">{{ number_format($p->tarif, 2) }}</td>
                                    <td class="px-4 py-3 text-right">Rp.{{ number_format($p->tarif * $data->totalperiode, 2,',','.') }}</td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            </div>
                            <div class="md:flex pl-4 mt-4 lg:w-2/3 w-2/3 mx-auto justify-between">
                                <img src="{{ url($data->qrcode)}}" class="object-scale-down h-28 sm:mt-10 md:mt-0" />
                            <div class="block mb-20 sm:mt-10 md:mt-0">
                                <div class="flex justify-between gap-6 border-t-2 border-gray-300">
                                    <p class="leading-relaxed text-lg text-left">Subtotal: </p>
                                    <p class="leading-relaxed text-lg text-right">Rp.{{ number_format($data->total,2,',','.') }}</p>
                                </div>
                                <div class="flex justify-between">
                                    <p class="leading-relaxed text-lg text-left">Kode: </p>
                                    <p class="leading-relaxed text-lg text-right"> - </p>
                                </div>
                                <div class="flex justify-between font-bold">
                                    <p class="leading-relaxed text-lg text-left">Total: </p>
                                    <p class="leading-relaxed text-lg text-right">Rp.{{ number_format($data->total,2,',','.') }} </p>
                                </div>
                            </div>
                            </div>
                        </div>
                    </section>
                </div>
                {{-- end isi --}}

            </div>
        </div>
    </div>
</section>
@endsection
