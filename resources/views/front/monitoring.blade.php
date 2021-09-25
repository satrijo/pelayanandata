@extends('front.layout.main')


@section('title')
Monitoring
@endsection


@section('hero')
@include('front.layout.asset.hero-page')
@endsection

@section('content')
<section class="relative py-16 bg-gray-300">
    <div class="container mx-auto md:px-4">
        <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg -mt-64">
            <div class="bg-white dark:bg-gray-800 shadow- sm:rounded-lg p-10 md:px-10 py-10">

                <form action="{{ route('monitoring.cek') }}" method="POST">
                    @csrf
                    <div class="auto-cols-max sm:mb-5 md:mb-0  md:p-52 bg-gray-50">
                        @if ($message = Session::get('gagal'))
                        <div class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-red-500">
                            <span class="inline-block align-middle mr-8">
                                <b class="capitalize">Gagal</b> {{ $message }}
                            </span>
                        </div>
                        @endif
                        <label class="block text-sm font-medium text-gray-700">
                            Nomor Invoice
                        </label>
                        <div class="mt-1 flex rounded-md shadow-sm">
                            <span
                                class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                                Invoice
                            </span>
                            <input type="text" name="invoice" id="invoice"
                                class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                                placeholder="contoh: 164425382" required>
                        </div>

                        <div class="mt-5">
                            <button type="submit"
                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Check Status
                            </button>
                        </div>
                    </div>
                </form>



            </div>
        </div>
    </div>
</section>
@endsection
