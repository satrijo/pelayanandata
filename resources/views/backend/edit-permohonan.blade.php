<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight mr-5">
                {{ __('Tarif') }}
            </h2>

        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    {{-- Form tambah tarif --}}
                        <!-- This example requires Tailwind CSS v2.0+ -->
                    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                    <div class="px-4 py-5 sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Informasi Permohonan Data Cuaca: {{ $data->status }}
                        </h3>
                        <p class="mt-1 max-w-2xl text-sm text-gray-500">
                        Diajukan tanggal: {{ date('l, d M Y', strtotime($data->created_at))}}.
                        </p>
                    </div>
                    <div class="border-t border-gray-200">
                        <dl>
                        <form action="{{ route('permohonan.update', ['id'=>$data->invoice]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-800">
                            Status
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                <ul role="list" class="border border-gray-200 rounded-md divide-y divide-gray-200">
                                <li class="pl-3 pr-4 py-3 block items-center justify-between text-sm">
                                    <div class="mt-1 flex rounded-md shadow-sm mb-4">
                                        <select onchange="yesnoCheck(this);" name="status" id="status" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-max rounded-md sm:text-sm border-gray-300">
                                            <option value="Batal" {{ $data->status == 'Batal' ? 'selected' : ''}}>Batal</option>
                                            <option value="Menunggu Pembayaran" {{ $data->status == 'Menunggu Pembayaran' ? 'selected' : ''}}>Menunggu Pembayaran</option>
                                            <option value="Diproses" {{ $data->status == 'Diproses' ? 'selected' : ''}}>Diproses</option>
                                            <option value="Selesai" {{ $data->status == 'Selesai' ? 'selected' : ''}}>Selesai</option>
                                        </select>

                                        <button type="submit" class="ml-6 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Update Status
                                        </button>

                                    </div>
                                    <span class="font-mono ml-3">Note: {{$data->infoadmin}} </span>

                                </li>
                                <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                    <input type="text" name="infoadmin" id="infoadmin" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 rounded-md sm:text-sm border-gray-300" placeholder="Pesan untuk pemohon (isi jika ada)">
                                </li>
                                <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm" id="ifYes"
                                @if ($data->status !== "Selesai")
                                    style="display: none;">
                                @endif

                                    <div class="flex text-sm text-gray-600 no-underline">
                                        <input id="data" name="data" type="file" class="not-sr-only" accept=".pdf,.docx,.doc,image/*">
                                        <p class="pl-1">pdf or image only</p>
                                    </div>
                                </li>
                                </ul>
                            </dd>
                        </div>




                        </form>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                            No. Invoice
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{$data->invoice}}
                            </dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                            Nama Pemohon
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{$data->nama}}
                            </dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                            Instansi
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{$data->instansi}}
                            </dd>
                        </div>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                            Nomor KTP
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{$data->nik}}
                            </dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                            E-mail
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{$data->email}}
                            </dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                            No. HP / Whatsapp
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            +{{$data->nohp}}
                            </dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                            Jenis Permohonan
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ strtoupper($data->jenispelayanan)}}
                            </dd>
                        </div>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                            Alamat
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{$data->alamat}}
                            </dd>
                        </div>

                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-800">
                            Periode
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                <ul role="list" class="border border-gray-200 rounded-md divide-y divide-gray-200">
                                <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">

                                    @if ($data->periodedari == $data->periodesampai)
                                        Tahun {{$data->periodesampai}}
                                    @endif
                                    Tahun {{ $data->periodedari}} - {{ $data->periodesampai }}
                                </li>
                                </ul>
                            </dd>
                        </div>

                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-800">
                            Parameter Cuaca
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">

                                <ul role="list" class="border border-gray-200 rounded-md divide-y divide-gray-200">
                                @foreach ($produk as $p )
                                <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                    {{ $p->namalayanan }}
                                    <div class="ml-4 flex-shrink-0 font-medium">
                                        Rp.{{ number_format($p->tarif, 2, ',','.') }} / {{$p->satuan}}   ({{ $p->jenislayanan }})
                                    </div>
                                </li>
                                @endforeach
                                <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm bg-gray-200">
                                    <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z" />
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="ml-2 flex-1 w-0 truncate">
                                    Total
                                    </span>
                                    <div class="ml-4 flex-shrink-0 font-medium">
                                        Rp.{{ number_format($data->total, 2, ',','.') }}
                                    </div>
                                </li>
                                </ul>
                            </dd>
                        </div>


                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-800">
                            Keterangan
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                <ul role="list" class="border border-gray-200 rounded-md divide-y divide-gray-200">
                                <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                    {{ $data->keterangan }}
                                </li>
                                </ul>
                            </dd>
                        </div>

                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                            Attachments
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            <ul role="list" class="border border-gray-200 rounded-md divide-y divide-gray-200">
                                <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                <div class="w-0 flex-1 flex items-center">
                                    <!-- Heroicon name: solid/paper-clip -->
                                    <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="ml-2 flex-1 w-0 truncate">
                                    Surat Permohonan
                                    </span>
                                </div>
                                <div class="ml-4 flex-shrink-0">
                                    <a href="{{ Storage::url($data->suratpermohonan) }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                                    Download
                                    </a>
                                </div>
                                </li>
                                    <iframe width="100%" height="550px" src="{{Storage::url($data->suratpermohonan)}}"></iframe>
                                <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                <div class="w-0 flex-1 flex items-center">
                                    <!-- Heroicon name: solid/paper-clip -->
                                    <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="ml-2 flex-1 w-0 truncate">
                                    Scan KTP
                                    </span>
                                </div>
                                <div class="ml-4 flex-shrink-0">
                                    <a href="{{ Storage::url($data->scanktp) }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                                    Download
                                    </a>
                                </div>
                                </li>
                                    <iframe width="100%" height="550px" src="{{Storage::url($data->scanktp)}}"></iframe>


                                @if ($data->jenispelayanan == 'nolrupiah')
                                <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                <div class="w-0 flex-1 flex items-center">
                                    <!-- Heroicon name: solid/paper-clip -->
                                    <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="ml-2 flex-1 w-0 truncate">
                                    Surat Pengantar
                                    </span>
                                </div>
                                <div class="ml-4 flex-shrink-0">
                                    <a href="{{ Storage::url($data->suratpengantar) }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                                    Download
                                    </a>
                                </div>
                                </li>
                                    <iframe width="100%" height="550px" src="{{Storage::url($data->suratpengantar)}}"></iframe>
                                <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                <div class="w-0 flex-1 flex items-center">
                                    <!-- Heroicon name: solid/paper-clip -->
                                    <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="ml-2 flex-1 w-0 truncate">
                                    Surat Pernyataan
                                    </span>
                                </div>
                                <div class="ml-4 flex-shrink-0">
                                    <a href="{{ Storage::url($data->suratpernyataan) }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                                    Download
                                    </a>
                                </div>
                                </li>
                                    <iframe width="100%" height="550px" src="{{Storage::url($data->suratpernyataan)}}"></iframe>
                                <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                <div class="w-0 flex-1 flex items-center">
                                    <!-- Heroicon name: solid/paper-clip -->
                                    <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="ml-2 flex-1 w-0 truncate">
                                    Proposal
                                    </span>
                                </div>
                                <div class="ml-4 flex-shrink-0">
                                    <a href="{{ Storage::url($data->proposal) }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                                    Download
                                    </a>
                                </div>
                                </li>
                                    <iframe width="100%" height="550px" src="{{Storage::url($data->proposal)}}"></iframe>

                                @endif
                            </ul>
                            </dd>
                        </div>
                        </dl>
                    </div>
                    </div>


                        {{-- end of line --}}
                </div>
            </div>
        </div>
    </div>
<script>
    function yesnoCheck(that) {
    if (that.value == "Selesai") {
        document.getElementById("ifYes").style = " ";
    } else {
        document.getElementById("ifYes").style.display = "none";
    }
}
</script>
</x-app-layout>
