@extends('front.layout.main')


@section('title')
Tarif Permohonan Data
@endsection


@section('hero')
@include('front.layout.asset.hero-page')
@endsection

@section('content')
<section class="relative py-16 bg-gray-300">
    <div class="container mx-auto md:px-4">
        <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg -mt-64">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-10 md:px-10 py-10">

                <div class="block items-center justify-center space-y-5 gap-5">
                    <table class="w-full whitespace-no-wrap">
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                            @foreach ($category as $d )
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3">
                                    <div class="block items-center text-sm">
                                        <div class="text-xl font-semibold tracking-wide text-left text-gray-800 capitalize border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                            <p class="font-semibold">{{ $d->nama }}</p>
                                        </div>
                                        <table class="w-full whitespace-no-wrap table-fixed">
                                            <thead>
                                                <tr
                                                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                                    <th class="md:px-10 py-3 w-2/3">Nama Layanan</th>
                                                    <th class="px-4 py-3 w-1/3">Tarif</th>
                                                </tr>
                                            </thead>
                                            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                                @foreach ($d->prices as $e )
                                                @if ($e->status == 'aktif')
                                                    <tr class="text-gray-700 dark:text-gray-400">
                                                        <td class="md:px-10 py-3">
                                                            <div class="flex items-center text-sm">
                                                                <p class="font-semibold">{{ $e->namalayanan }}</p>
                                                            </div>
                                                        </td>
                                                        <td class="px-4 py-3 text-sm">
                                                            Rp.{{ number_format($e->tarif,2, ',','.') }}
                                                        </td>
                                                    </tr>
                                                @endif
                                                @endforeach
                                                <tr class="text-gray-700 dark:text-gray-400">
                                                    <td class="md:px-10 py-3">
                                                        <div class="flex items-center text-sm">
                                                            <p class="font-semibold"></p>
                                                        </div>
                                                    </td>
                                                    <td class="px-4 py-3 text-sm">

                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>


            </div>
        </div>
    </div>
</section>
@endsection
