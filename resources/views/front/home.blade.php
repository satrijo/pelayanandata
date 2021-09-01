@extends('front.layout.main')

@section('title', 'Halaman Depan')
@section('hero')
    @include('front.layout.asset.hero')
@endsection
{{-- @section('marquee')
    @include('front.layout.asset.marquee-up')
@endsection --}}
@section('content')
<section class="pb-20 bg-gray-300 -mt-24">
    <div class="container mx-auto px-4">
        <div class="flex flex-wrap">
            <div class="pt-6 w-full md:w-4/12 px-4 text-center">
                <div class="relative flex flex-col min-w-0 break-words bg-white hover:bg-blue-200 w-full mb-8 shadow-lg rounded-lg">
                    <div class="px-4 py-5 flex-auto">
                        <div
                            class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-red-400">
                            <i class="fas fa-award"></i>
                        </div>
                        <h6 class="text-xl font-semibold">Daftar Tarif PNBP</h6>
                        <p class="mt-2 mb-4 text-gray-600">
                            Daftar tarif Pelayanan Negara Bukan Pajak sesuai dengan PP No. 47 tahun 2018 tentang
                            jenis dan tarif atas jenis penerimaan negara bukan pajak yang berlaku di BMKG.
                        </p>
                    </div>
                </div>
            </div>
            <a href="{{ route('monitoring') }}" class="pt-6 w-full md:w-4/12 px-4 text-center">
                <div class="relative flex flex-col min-w-0 break-words bg-white hover:bg-green-200 w-full mb-8 shadow-lg rounded-lg">
                    <div class="px-4 py-5 flex-auto">
                        <div
                            class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-blue-400">
                            <i class="fas fa-retweet"></i>
                        </div>
                        <h6 class="text-xl font-semibold">Monitoring Status Permohonan</h6>
                        <p class="mt-2 mb-4 text-gray-600">
                            Pemohon dapat melakukan monitoring status Permohonan data cuaca dengan cara menginput nomor
                            invoice
                            atau nomor KTP pemohon pada form aplikasi yang disediakan.
                        </p>
                    </div>
                </div>
            </a>
            <div class="pt-6 w-full md:w-4/12 px-4 text-center">
                <div class="relative flex flex-col min-w-0 break-words bg-white hover:bg-red-200 w-full mb-8 shadow-lg rounded-lg">
                    <div class="px-4 py-5 flex-auto">
                        <div
                            class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-green-400">
                            <i class="fas fa-fingerprint"></i>
                        </div>
                        <h6 class="text-xl font-semibold">FAQ Pelayanan PNBP</h6>
                        <p class="mt-2 mb-4 text-gray-600">
                            Informasi seputar pelayanan PNBP Stasiun Meteorologi Betoambari Baubau, meliputi alur
                            Permohonan data dan persyaratan
                            yang dibutuhkan oleh pemohon data cuaca.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
