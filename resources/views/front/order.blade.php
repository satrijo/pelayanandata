@extends('front.layout.main')


@section('title', 'Form Permohonan Data')

@section('hero')
    @include('front.layout.asset.hero-page')
@endsection

@push('assets')
        <style>
            .fixtures {
            display:none;
            }
        </style>

        <script>
            function ok(that) {
            @foreach ($category as $cat)
                if (that.value == "{{ $cat->id }}") {
                document.getElementById("{{ $cat->id }}").style = " ";
                document.getElementById("{{ $cat->id . $cat->waktu }}").style = " ";

                } else {
                document.getElementById("{{ $cat->id }}").style.display = "none";
                document.getElementById("{{ $cat->id . $cat->waktu }}").style.display = "none";
                var cbarray = document.getElementsByClassName("cek");
                for(var i = 0; i < cbarray.length; i++){ cbarray[i].checked = false }

                }
            @endforeach


            }
        </script>
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <link href="{{ asset('css/datepicker.min.css') }}" rel="stylesheet" type="text/css">
        <script src="{{ asset('js/datepicker.min.js') }}"></script>

        <!-- Include English language -->
        <script src="{{ asset('js/datepicker.en.js') }}"></script>

@endpush

@section('content')
<section class="relative py-16 bg-gray-300">
    <div class="container mx-auto md:px-4">
        <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg -mt-64">

            <div class="bg-white dark:bg-gray-800 shadow- sm:rounded-lg md:px-5 md:py-3">
                <form action="{{ route('order.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mx-10">
                    <div class="md:px-4 py-5 bg-white space-y-6 sm:p-6">
                        <div class="md:grid md:grid-cols-2 gap-6 mt-8">
                            <div class="auto-cols-max">
                                <label class="block text-sm font-medium text-gray-700">
                                Nama Lengkap
                                </label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                <input value="{{ old('nama') }}" type="text" name="nama" id="nama" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="contoh: Satriyo Unggul Wicaksono" required>
                                </div>
                            </div>
                            <div class="auto-cols-max ">
                                <label class="block text-sm font-medium text-gray-700">
                                Nomor KTP (NIK)
                                </label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                <input value="{{ old('nik') }}" type="number" name="nik" id="nik" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="contoh: 6603042903940002" required>
                                </div>
                            </div>
                        </div>
                        <div class="md:grid md:grid-cols-2 gap-6">
                            <div class="auto-cols-max sm:mb-5 md:mb-0">
                                <label class="block text-sm font-medium text-gray-700">
                                Nomor Handphone (Whatsapp)
                                </label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                                    +62
                                </span>
                                <input value="{{ old('nohp') }}" type="text" name="nohp" id="nohp" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="contoh: 85727557521" required>
                                </div>
                            </div>
                            <div class="auto-cols-max">
                                <label class="block text-sm font-medium text-gray-700">
                                E-mail
                                </label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                <input value="{{ old('email') }}" type="email" name="email" id="email" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="contoh: stamet.baubau@gmail.com" required>
                                </div>
                            </div>
                        </div>

                        <div class="md:grid md:grid-cols-2 gap-6">
                            <div class="auto-cols-max sm:mb-5 md:mb-0">
                                <label class="block text-sm font-medium text-gray-700">
                                Instansi
                                </label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                <input value="{{ old('instansi') }}" type="text" name="instansi" id="instansi" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="contoh: PT. Sawit Maju Raya">
                                </div>
                                @error('instansi')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="auto-cols-max">
                                <label class="block text-sm font-medium text-gray-700">
                                Jenis Permohonan
                                </label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <select onchange="yesnoCheck(this);" name="jenispelayanan" id="jenispelayanan" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">
                                        <option value="pnbp">PNBP</option>
                                        <option value="nolrupiah" {{ old('jenispelayanan') == 'nolrupiah' ? 'selected' : ''}}>Pelayanan Nol Rupiah (Mahasiswa)</option>
                                    </select>
                                    @error('jenispelayanan')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="md:grid md:grid-cols-2 gap-6">
                            <div class="auto-cols-max">
                                <label class="block text-sm font-medium text-gray-700">
                                    Alamat
                                </label>
                                <div class="mt-1">
                                    <textarea required id="alamat" name="alamat" rows="2"
                                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md"
                                        placeholder="Jl. Macan Raya No. 19 Kelurahan Cipete, Kecamatan Karang Nangka">{{ old('alamat') }}</textarea>
                                </div>
                            </div>

                            <div class="auto-cols-max">
                                <label class="block text-sm font-medium text-gray-700">
                                    Kategori Permohonan
                                </label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <select onchange="ok(this);" name="category" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">
                                        <option value="hari">Pilih Category</option>
                                        @foreach ($category as $cat)
                                            <option value="{{ $cat->id }}">{{ $cat->nama }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                        </div>


                        {{-- Start of attach file --}}
                        <div class="md:py-5">

                            <div class="md:grid md:grid-cols-2 gap-6">
                                <div class="auto-cols-max sm:mb-5 md:mb-0">
                                    <label class="block text-sm font-medium text-gray-700">
                                    Surat Permohonan Instansi/Universitas
                                        <button
                                            class="text-gray-700 font-extralight text-xs transition-all duration-150"
                                            onmouseenter="openPopover(event,'popover-id')" onmouseleave="openPopover(event,'popover-id')">
                                            (Lihat contoh)
                                        </button>
                                    </label>
                                    <label for="suratpermohonan" class="relative cursor-pointer bg-white rounded-md no-underline">
                                    <div class="mt-1 md:flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                        <div class="space-y-1 text-center">
                                            <div class="md:flex text-sm text-gray-600 no-underline">
                                                <input id="suratpermohonan" name="suratpermohonan" type="file" class="not-sr-only" accept=".pdf,.docx,.doc,image/*">
                                                <p class="pl-1">pdf only (Max 1500Kb)</p>

                                            </div>
                                            @error('suratpermohonan')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror

                                        </div>
                                    </div>
                                    </label>
                                </div>
                                <div class="auto-cols-max sm:mb-5 md:mb-0">
                                    <label class="block text-sm font-medium text-gray-700">
                                        Scan/Foto KTP
                                        <button class="text-gray-700 font-extralight text-xs transition-all duration-150"
                                            onmouseenter="openPopover(event,'popover-id')" onmouseleave="openPopover(event,'popover-id')">
                                            (Lihat contoh)
                                        </button>
                                    </label>
                                    <label for="scanktp" class="relative cursor-pointer bg-white rounded-md no-underline">
                                    <div class="mt-1 md:flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                        <div class="space-y-1 text-center">
                                            <div class="md:flex text-sm text-gray-600 no-underline">
                                                <input id="scanktp" name="scanktp" type="file" class="not-sr-only" accept=".pdf,.docx,.doc,image/*">
                                                <p class="pl-1">pdf only (Max 1500Kb)</p>
                                            </div>
                                            @error('scanktp')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    </label>
                                </div>
                            </div>
                            <div class="md:grid md:grid-cols-2 gap-6 mt-5" id="ifYes"
                                @if($errors->has('suratpengantar') || $errors->has('suratpernyataan') || $errors->has('proposal'))
                                    style="";
                                @else
                                    style="display: none;
                                @endif
                                ">

                                <div class="auto-cols-auto mt-1 sm:mb-5 md:mb-0" >
                                    <label class="block text-sm font-medium text-gray-700">
                                        Surat Pengantar dari Kampus / Instansi
                                        <button class="text-gray-700 font-extralight text-xs transition-all duration-150"
                                            onmouseenter="openPopover(event,'popover-id')" onmouseleave="openPopover(event,'popover-id')">
                                            (Lihat contoh)
                                        </button>
                                    </label>
                                    <label for="suratpengantar" class="relative cursor-pointer bg-white rounded-md no-underline">
                                    <div class="mt-1 md:flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                        <div class="space-y-1 text-center">
                                            <div class="md:flex text-sm text-gray-600 no-underline">
                                                <input id="suratpengantar" name="suratpengantar" type="file" class="not-sr-only" accept=".pdf,.docx,.doc,image/*">
                                                <p class="pl-1">pdf only (Max 1500Kb)</p>
                                            </div>
                                            @error('suratpengantar')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    </label>
                                </div>
                                <div class="auto-cols-max mt-1 sm:mb-5 md:mb-0" >
                                    <label class="block text-sm font-medium text-gray-700">
                                        Surat Pernyataan tidak Penyalahgunaan Data
                                        <button class="text-gray-700 font-extralight text-xs transition-all duration-150"
                                            onmouseenter="openPopover(event,'popover-id')" onmouseleave="openPopover(event,'popover-id')">
                                            (Lihat contoh)
                                        </button>
                                    </label>
                                    <label for="suratpernyataan" class="relative cursor-pointer bg-white rounded-md no-underline">
                                    <div class="mt-1 md:flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                        <div class="space-y-1 text-center">
                                            <div class="md:flex text-sm text-gray-600 no-underline">
                                                <input id="suratpernyataan" name="suratpernyataan" type="file" class="not-sr-only" accept=".pdf,.docx,.doc,image/*">
                                                <p class="pl-1">pdf only (Max 1500Kb)</p>
                                            </div>
                                            @error('suratpernyataan')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    </label>
                                </div>
                                <div class="auto-cols-max mt-1" >
                                    <label class="block text-sm font-medium text-gray-700">
                                        Proposal
                                        <button class="text-gray-700 font-extralight text-xs transition-all duration-150"
                                            onmouseenter="openPopover(event,'popover-id')" onmouseleave="openPopover(event,'popover-id')">
                                            (Lihat contoh)
                                        </button>
                                    </label>
                                    <label for="proposal" class="relative cursor-pointer bg-white rounded-md no-underline">
                                    <div class="mt-1 md:flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                        <div class="space-y-1 text-center">
                                            <div class="md:flex text-sm text-gray-600 no-underline">
                                                <input id="proposal" name="proposal" type="file" class="not-sr-only" accept=".pdf,.docx,.doc,image/*">
                                                <p class="pl-1">pdf only (Max 1500Kb)</p>
                                            </div>
                                            @error('proposal')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                        {{-- End of attach file --}}




                        <div class="bg-gray-100 md:grid md:grid-cols-4 gap-6 justify-center px-6 pt-5 pb-6 border-2 border-gray-100 border-dashed rounded-md">
                            @foreach ($category as $cat )
                                <div class="col-span-2 sm:mb-5 md:mb-0" id="{{ $cat->id }}" style="display: none;">
                                    <label class="block text-sm font-medium text-gray-700 required">
                                        {{ $cat->nama }}
                                    </label>
                                    <div class="justify-center">
                                        <div class="mt-2 overflow-auto h-28">
                                            @foreach ($cat->prices as $nilai )
                                            @if ($nilai->status == 'aktif')
                                                <label class="block items-center mr-3 pl-4">
                                                    <input type="checkbox" name="parametercuaca[]" value="{{$nilai->id}}" class="cek">
                                                    <span class="ml-2">{{$nilai->namalayanan}} - Rp.{{number_format($nilai->tarif,2,',','.')}}
                                                        {{ $nilai->category->satuan }} @if ($nilai->satuan !== "series")
                                                        / {{ ucfirst($nilai->category->waktu) }}
                                                        @endif</span>
                                                </label>
                                            @endif
                                            @endforeach
                                        </div>
                                        @error('parametercuaca')
                                        <p class="text-sm text-red-600 pt-4">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-span-2 sm:mb-5 md:mb-0" id="{{ $cat->id . $cat->waktu }}" style="display: none;">
                                    <label class="block text-sm font-medium text-gray-700 required">
                                        Deskripsi
                                    </label>
                                    <label class="block text-sm font-mono text-gray-700 required mb-5">
                                        {{ $cat->deskripsi }}
                                    </label>
                                </div>
                            @endforeach

                            <div class="col-span-2 sm:mb-5 md:mb-0">
                                <label class="block text-sm font-medium text-gray-700">
                                Periode Permintaan Data
                                </label>
                                <div class="mt-1 block md:flex rounded-md shadow-sm">
                                    {{-- <select required name="periodedari" id="periodedari" class="focus:ring-indigo-500 focus:border-indigo-500 md:flex-1 sm:rounded-md md:rounded-none md:rounded-l-md sm:text-sm border-gray-300">
                                        @for ($i = 2000; $i <= date('Y'); $i++)
                                            <option value="{{ $i }}"  {{ old('periodedari') == $i ? 'selected' : ''}}>Dari - {{ $i }}</option>
                                        @endfor
                                    </select> --}}
                                    <span
                                        class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                                        Dari
                                    </span>
                                    <input data-language='en' autocomplete="off" required placeholder="contoh: 15/03/2020" type="text" name="periodedari" class="datepicker-here focus:ring-indigo-500 focus:border-indigo-500 md:flex-1 sm:rounded-md md:rounded-none md:rounded-l-md sm:text-sm border-gray-300">
                                    @error('periodedari')
                                            <p class="text-sm text-red-600 pt-4">{{ $message }}</p>
                                    @enderror
                                    {{-- <select required name="periodesampai" id="periodesampai" class="focus:ring-indigo-500 focus:border-indigo-500 md:flex-1 md:rounded-none sm:rounded-md md:rounded-r-md sm:text-sm border-gray-300">
                                        @for ($i = date('Y'); $i > 2010; $i--)
                                            <option value="{{ $i }}" {{ old('periodesampai') == $i ? 'selected' : ''}}>Sampai - {{ $i }}</option>
                                        @endfor
                                    </select> --}}
                                    <span
                                        class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                                        Sampai
                                    </span>
                                    <input data-language='en' autocomplete="off" required placeholder="contoh: 21/03/2020" type="text" name="periodesampai"
                                        class="datepicker-here focus:ring-indigo-500 focus:border-indigo-500 md:flex-1 sm:rounded-md md:rounded-none md:rounded-l-md sm:text-sm border-gray-300">
                                    @error('periodesampai')
                                            <p class="text-sm text-red-600 pt-4">{{ $message }}</p>
                                    @enderror
                                </div>


                            </div>

                            <div class="col-span-1">
                                <label class="block text-sm font-medium text-gray-700" id="nolrupiah">
                                    Pembayaran
                                </label>
                                <div class="mt-1 flex rounded-md shadow-sm " id="nolrupiah2">
                                    <select required name="pembayaran"
                                        class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 rounded-md sm:text-sm border-gray-300">
                                        <option value="transfer">Transfer</option>
                                        <option value="tunai">Cash/Tunai</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-span-1">
                                <label class="block text-sm font-medium text-gray-700">
                                    Kode
                                </label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <input disabled type="text" name="kode" id="kode"
                                        class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300"
                                        placeholder="">
                                </div>
                            </div>

                            <div class="col-span-3 sm:mb-5 md:mb-0">
                                <label class="block text-sm font-medium text-gray-700">
                                    Keterangan
                                </label>
                                <div class="mt-1">
                                    <textarea required id="keterangan" name="keterangan" rows="2" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" placeholder="Contoh: Data digunakan untuk menjadi rujukan dalam menentukan pembangunan Jembatan di Wilayah Selat Buton"></textarea>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6 justify-between md:flex items-center mb-10">
                        <div>
                            <input type="checkbox" required>
                            <span class="text-sm">
                                Dengan ini saya menyatakan data pada formulir diatas benar adanya.
                            </span>
                        </div>
                        <div class="sm:mb-5 md:mb-0">
                            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Kirim Permohonan
                            </button>
                        </div>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<div class="hidden bg-blueGray-600 border-0 mb-3 z-50 font-normal leading-normal text-sm max-w-xs text-left no-underline break-words rounded-lg"
    id="popover-id">
    <div>
        <div
            class="bg-blueGray-600 text-white opacity-75 font-semibold p-3 mb-0 border-b border-solid border-blueGray-100 uppercase rounded-t-lg">
            Informasi
        </div>
        <div class="text-white p-3">
            Download di menu dokumen pendukung
        </div>
    </div>
</div>
<script src="https://unpkg.com/@popperjs/core@2.9.1/dist/umd/popper.min.js" charset="utf-8"></script>
<script>
    function openPopover(event,popoverID){
        let element = event.target;
        while(element.nodeName !== "BUTTON"){
        element = element.parentNode;
        }
        var popper = Popper.createPopper(element, document.getElementById(popoverID), {
        placement: 'top'
        });
        document.getElementById(popoverID).classList.toggle("hidden");
    }
</script>
<script>
    function yesnoCheck(that) {
    if (that.value == "nolrupiah") {
        document.getElementById("ifYes").style = " ";
        document.getElementById("nolrupiah").style.display = "none";
        document.getElementById("nolrupiah2").style.display = "none";


    } else {
        document.getElementById("ifYes").style.display = "none";
        document.getElementById("nolrupiah").style = " ";
        document.getElementById("nolrupiah2").style = " ";
    }

    }
</script>






@endsection
