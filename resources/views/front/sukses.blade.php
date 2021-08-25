@extends('front.layout.main')


@section('title')
Monitoring:  {{ $data->status }}
@endsection
@section('marquee')
    @include('front.layout.asset.marquee-bottom')
@endsection

@section('content')
    <script>
            (function (global) {

            if(typeof (global) === "undefined")
            {
                throw new Error("window is undefined");
            }

            var _hash = "!";
            var noBackPlease = function () {
                global.location.href += "#";

                // making sure we have the fruit available for juice....
                // 50 milliseconds for just once do not cost much (^__^)
                global.setTimeout(function () {
                    global.location.href += "!";
                }, 1);
            };

            // Earlier we had setInerval here....
            global.onhashchange = function () {
                if (global.location.hash !== _hash) {
                    global.location.hash = _hash;
                }
            };

            global.onload = function () {

                noBackPlease();

                // disables backspace on page except on input fields and textarea..
                document.body.onkeydown = function (e) {
                    var elm = e.target.nodeName.toLowerCase();
                    if (e.which === 8 && (elm !== 'input' && elm  !== 'textarea')) {
                        e.preventDefault();
                    }
                    // stopping event bubbling up the DOM tree..
                    e.stopPropagation();
                };

            };

        })(window);
        </script>

        <div class="bg-white dark:bg-gray-800 shadow- sm:rounded-b-lg px-5 py-3 -mt-2">
            <section class="text-gray-600 body-font">
                <div class="container px-5 py-20 mx-auto">
                    <div class="flex flex-col text-center w-full mb-8 ">
                        <h1 class="sm:text-4xl text-3xl font-medium title-font mb-2 text-gray-900">Status Monitoring Permohonan Data</h1>
                        <p class="lg:w-2/3 mx-auto leading-relaxed text-base mb-20">Informasi mengenai progres permohonan data yang diperbaharui secara berkala, Pastikan telah melakukan pembayaran agar permohonan anda segera ditindaklanjuti.</p>
                        @if (($data->status == "Menunggu Pembayaran") && ($data->jenispelayanan == "pnbp") && ($data->pembayaran == "transfer"))
                            <div class="lg:w-2/3 mx-auto leading-relaxed text-base mb-20 border-2 border-dashed border-blue-500 p-2">
                                <div class="bg-gray-200 p-4">
                                    <h2 class="text-xl font-medium title-font text-gray-900 ">Informasi Pembayaran</h2>
                                    <span>
                                        Silahkan Melakukan Transfer Ke Rekening<br>
                                        BANK SYARIAH INDONESIA: 8765444111 <br>
                                        a/n Satriyo Unggul Wicaksono<br>
                                        senilai Rp.{{ number_format($data->total,2) }}
                                    </span>
                                </div>
                            </div>
                        @endif

                        <div class="flex justify-between grid-cols-2 mx-auto lg:w-4/5 w-full">
                            <div class="block auto-cols-max text-left">
                                <p class="mx-auto leading-relaxed text-base font-bold">Invoice: {{$data->invoice}} </p>
                                <p class="mx-auto leading-relaxed text-base">Dibuat: {{ date('l, d M Y', strtotime($data->created_at))}} </p>
                                <p class="mx-auto leading-relaxed text-base">Status: {{$data->status}} </p>
                                <p class="mx-auto leading-relaxed text-base">Status: {{$data->jenispelayanan == "pnbp" ? "PNBP / Bertarif" : "Nol Rupiah"}} </p>
                                <p class="mx-auto leading-relaxed text-base">Periode: {{$data->periodedari}} - {{$data->periodesampai}} </p>
                                <p class="mx-auto leading-relaxed text-base capitalize">Metode Pembayaran: {{$data->pembayaran}} </p>
                            </div>
                            <div class="block auto-cols-max text-right">
                                <p class="mx-auto leading-relaxed text-base text-right font-bold">Informasi Pemohon</p>
                                <p class="mx-auto leading-relaxed text-base text-right">{{ $data->nama }}</p>
                                <p class="mx-auto leading-relaxed text-base text-right">{{ $data->instansi }}</p>
                                <p class="mx-auto leading-relaxed text-base text-right">{{ $data->email }} - {{ $data->nohp }}</p>
                                <a href="{{ route('order.pdf', ['id'=>$data->invoice]) }}">
                                    <p class="text-center bg-blue-600 text-white rounded-md py-2 px-4">Download Invoice</p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div id="report" class="lg:w-4/5 w-full mx-auto overflow-auto">
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
                            <td class="px-4 py-3">{!! ($data->periodesampai - $data->periodedari) + 1 !!} {{$p->satuan}}</td>
                            <td class="px-4 py-3">{{ number_format($p->tarif, 2) }}</td>
                            <td class="px-4 py-3 text-right">Rp.{{ number_format($p->tarif * (($data->periodesampai - $data->periodedari) +1), 2) }}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    </div>
                    <div class="flex pl-4 mt-4 lg:w-4/5 w-full mx-auto justify-between">
                        <img src="{{url($data->qrcode)}}" class="object-scale-down h-28" />
                    <div class="block mb-20">
                        <div class="flex justify-between gap-6 border-t-2 border-gray-300">
                            <p class="leading-relaxed text-lg text-left">Subtotal: </p>
                            <p class="leading-relaxed text-lg text-right">Rp.{{ number_format($data->total,2) }}</p>
                        </div>
                        <div class="flex justify-between">
                            <p class="leading-relaxed text-lg text-left">Kode: </p>
                            <p class="leading-relaxed text-lg text-right"> - </p>
                        </div>
                        <div class="flex justify-between font-bold">
                            <p class="leading-relaxed text-lg text-left">Total: </p>
                            <p class="leading-relaxed text-lg text-right">Rp.{{ number_format($data->total,2) }} </p>
                        </div>
                    </div>
                    </div>
                </div>
            </section>
        </div>
        <script>
            setTimeout(function(){
                document.getElementById('report').click();
            },50);
        </script>
@endsection
