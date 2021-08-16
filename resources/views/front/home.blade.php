@extends('front.layout.main')

@section('title', 'Halaman Depan')
@section('hero')
    @include('front.layout.asset.hero')
@endsection
@section('content')
<div class="mt-5 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
    <div class="grid grid-cols-1 md:grid-cols-2">
        <div class="p-6 hover:bg-green-100">
            <a href="{{ route('order') }}">
                <div class="flex items-center">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                    <div class="ml-4 text-lg leading-7 font-semibold text-gray-900 dark:text-white hover:text-gray-500">Permohonan Data Cuaca</div>
                </div>

                <div class="ml-12">
                    <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm hover:text-gray-500">
                        Untuk mendukung manajemen pengguna layanan Data Online BMKG Baubau dalam rangka meningkatkan layanan, pemohon dapat melakukan Permohonan data cuaca melalui form aplikasi online.
                    </div>
                </div>
            </a>
        </div>

        <div class="p-6 hover:bg-green-100 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
            <a href="">
                <div class="flex items-center">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    <div class="ml-4 text-lg leading-7 font-semibold text-gray-900 dark:text-white hover:text-gray-500">Monitoring Status Permohonan</div>
                </div>

                <div class="ml-12">
                    <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm hover:text-gray-500">
                        Menu ini dapat digunakan oleh pemohon untuk monitoring status Permohonan data cuaca dengan cara menginput nomor invoice atau nomor KTP pemohon pada form aplikasi yang disediakan.
                    </div>
                </div>
            </a>
        </div>

        <div class="p-6 hover:bg-green-100 border-t border-gray-200 dark:border-gray-700">
            <a href="">
                <div class="flex items-center">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path></svg>
                    <div class="ml-4 text-lg leading-7 font-semibold text-gray-900 dark:text-white hover:text-gray-500">Daftar Tarif PNBP</div>
                </div>

                <div class="ml-12">
                    <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm hover:text-gray-500">
                        Daftar tarif Pelayanan Negara Bukan Pajak Stasiun Meteorologi Betoambari sesuai dengan PP No. 47 tahun 2018 tentang jenis dan tarif atas jenis penerimaan negara bukan pajak yang berlaku di BMKG.
                    </div>
                </div>
            </a>
        </div>

        <div class="p-6 hover:bg-green-100 border-t border-gray-200 dark:border-gray-700 md:border-l">
            <a href="">
                <div class="flex items-center">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <div class="ml-4 text-lg leading-7 font-semibold text-gray-900 dark:text-white hover:text-gray-500">FAQ Pelayanan PNBP</div>
                </div>

                <div class="ml-12">
                    <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm hover:text-gray-500">
                        Informasi seputar pelayanan PNBP Stasiun Meteorologi Betoambari Baubau, meliputi alur Permohonan data dan persyaratan yang dibutuhkan oleh pemohon data cuaca.
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>

@endsection
