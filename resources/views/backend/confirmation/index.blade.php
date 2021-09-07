@extends('backend.layout.main')

@section('title', 'Konfirmasi')
@section('judul', 'List Data Konfirmasi')

@section('content')

<div class="w-full overflow-hidden rounded-lg shadow-xs">
    <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
            <thead>
                <tr
                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3">No.</th>
                    <th class="px-4 py-3">Invoice</th>
                    <th class="px-4 py-3">Bukti</th>
                    <th class="px-4 py-3">Tanggal</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                @foreach ($data as $d )
                <tr class="text-gray-700 dark:text-gray-400">
                    <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                            <!-- Avatar with inset shadow -->
                            {{-- <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                <img class="object-cover w-full h-full rounded-full"
                                    src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&ixid=eyJhcHBfaWQiOjE3Nzg0fQ"
                                    alt="" loading="lazy" />
                                <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                            </div> --}}
                            <div>
                                <p class="font-semibold">{{ $d->nama }}</p>
                                <p class="text-xs text-gray-600 dark:text-gray-400">
                                    {{ $loop->iteration }}
                                </p>
                            </div>
                        </div>
                    </td>
                    <td class="px-4 py-3 text-sm">
                        {{ $d->invoice }}
                    </td>

                    <td class="px-4 py-3 text-sm">
                        <a href="{{ Storage::url($d->bukti) }}">Download</a>
                    </td>

                    <td class="px-4 py-3 text-sm">
                        {{ date('l, d M Y', strtotime($d->created_at)) }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div
        class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
        <span class="flex items-center col-span-3">
            Showing page {{ $data->currentPage() }}
        </span>
        <span class="col-span-2"></span>
        <!-- Pagination -->
        <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
            <nav aria-label="Table navigation">
                {{ $data->links() }}
            </nav>
        </span>
    </div>
</div>



@endsection
