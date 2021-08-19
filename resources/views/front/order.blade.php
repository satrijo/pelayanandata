@extends('front.layout.main')


@section('title', 'Form Permohonan Data')

@section('marquee')
    @include('front.layout.asset.marquee-bottom')
@endsection

@section('content')
<div class="flex text-base text-white text-light justify-center bg-white -mt-2">
    <section class="bg-transparent dark:bg-gray-900 lg:pt-8 lg:flex lg:justify-center px-8">
        <div class="bg-white dark:bg-gray-800 lg:mx-10 lg:flex lg:max-w-5xl lg:shadow lg:rounded-lg">
            <div class="lg:w-1/2">
                <div class="h-12 bg-cover bg-center lg:rounded-lg lg:h-full" style="background-image:url('/images/baubau.jpg')"></div>
            </div>

            <div class="max-w-xl px-6 lg:max-w-5xl lg:w-1/2">
                <h2 class="text-xl font-bold text-gray-800 dark:text-white md:text-2xl">Form Permohonan Data <span class="text-indigo-600 dark:text-indigo-400">Meteorologi</span></h2>
                <p class="mt-4 text-gray-600 dark:text-gray-400 pb-16">Data meteorologi meliputi unsur - unsur beberapa parameter cuaca, silahkan pilih sesuai data yang ingin anda peroleh. Mohon untuk mencantumkan nomor whatsapp pada kolom nomor handphone agar pemberitahuan dapat diinfokan secara otomatis.</p>
            </div>
        </div>
    </section>
</div>
<div class="bg-white dark:bg-gray-800 shadow- sm:rounded-b-lg px-5 py-3">
    <form action="{{ route('order.store') }}" method="POST">
        @csrf
        <div class="mx-10">
        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
            <div class="grid grid-cols-2 gap-6">
                <div class="auto-cols-max">
                    <label class="block text-sm font-medium text-gray-700">
                    Nama Lengkap
                    </label>
                    <div class="mt-1 flex rounded-md shadow-sm">
                    <input type="text" name="nama" id="nama" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="contoh: Bambang Apriyanto" required>
                    </div>
                </div>
                <div class="auto-cols-max">
                    <label class="block text-sm font-medium text-gray-700">
                    Nomor KTP (KTP)
                    </label>
                    <div class="mt-1 flex rounded-md shadow-sm">
                    <input type="text" name="nik" id="nik" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="contoh: 6603042903940002" required>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-6">
                <div class="auto-cols-max">
                    <label class="block text-sm font-medium text-gray-700">
                    Nomor Handphone (Whatsapp)
                    </label>
                    <div class="mt-1 flex rounded-md shadow-sm">
                    <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                        +62
                    </span>
                    <input type="text" name="nohp" id="nohp" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="contoh: 85727557521" required>
                    </div>
                </div>
                <div class="auto-cols-max">
                    <label class="block text-sm font-medium text-gray-700">
                    E-mail
                    </label>
                    <div class="mt-1 flex rounded-md shadow-sm">
                    <input type="email" name="email" id="email" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="contoh: stamet.baubau@gmail.com" required>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-6">
                <div class="auto-cols-max">
                    <label class="block text-sm font-medium text-gray-700">
                    Instansi
                    </label>
                    <div class="mt-1 flex rounded-md shadow-sm">
                    <input type="text" name="instansi" id="instansi" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="contoh: PT. Sawit Maju Raya">
                    </div>
                </div>
                <div class="auto-cols-max">
                    <label class="block text-sm font-medium text-gray-700">
                    Jenis Permintaan
                    </label>
                    <div class="mt-1 flex rounded-md shadow-sm">
                        <select onchange="yesnoCheck(this);" name="jenispelayanan" id="jenispelayanan" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">
                            <option value="pnbp">PNBP</option>
                            <option value="nolrupiah">Pelayanan Nol Rupiah (Mahasiswa)</option>
                        </select>
                    </div>
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">
                    Alamat
                </label>
                <div class="mt-1">
                    <textarea id="alamat" name="alamat" rows="2" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" placeholder="Jl. Macan Raya No. 19 Kelurahan Cipete, Kecamatan Karang Nangka"></textarea>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-6">
                <div class="auto-cols-max">
                    <label class="block text-sm font-medium text-gray-700">
                    Surat Permohonan Instansi/Universitas
                    </label>
                    <label for="surat-permohonan" class="relative cursor-pointer bg-white rounded-md no-underline">
                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                        <div class="space-y-1 text-center">
                            <div class="flex text-sm text-gray-600 no-underline">
                                <input id="surat-permohonan" name="surat-permohonan" type="file" class="not-sr-only" accept=".pdf,.docx,.doc,image/*">
                                <p class="pl-1">pdf or image only</p>
                            </div>
                        </div>
                    </div>
                    </label>
                </div>
                <div class="auto-cols-max">
                    <label class="block text-sm font-medium text-gray-700">
                        Scan/Foto KTP
                    </label>
                    <label for="scanktp" class="relative cursor-pointer bg-white rounded-md no-underline">
                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                        <div class="space-y-1 text-center">
                            <div class="flex text-sm text-gray-600 no-underline">
                                <input id="scanktp" name="scanktp" type="file" class="not-sr-only" accept=".pdf,.docx,.doc,image/*">
                                <p class="pl-1">pdf or image only</p>
                            </div>
                        </div>
                    </div>
                    </label>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-6 mt-5" id="ifYes" style="display: none;">
                <div class="auto-cols-auto mt-1" >
                    <label class="block text-sm font-medium text-gray-700">
                        Surat Pengantar dari Kampus / Instansi
                    </label>
                    <label for="suratpengantar" class="relative cursor-pointer bg-white rounded-md no-underline">
                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                        <div class="space-y-1 text-center">
                            <div class="flex text-sm text-gray-600 no-underline">
                                <input id="suratpengantar" name="suratpengantar" type="file" class="not-sr-only" accept=".pdf,.docx,.doc,image/*">
                                <p class="pl-1">pdf or image only</p>
                            </div>
                        </div>
                    </div>
                    </label>
                </div>
                <div class="auto-cols-max mt-1" >
                    <label class="block text-sm font-medium text-gray-700">
                        Surat Pernyataan tidak Penyalahgunaan Data
                    </label>
                    <label for="suratpernyataan" class="relative cursor-pointer bg-white rounded-md no-underline">
                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                        <div class="space-y-1 text-center">
                            <div class="flex text-sm text-gray-600 no-underline">
                                <input id="suratpernyataan" name="suratpernyataan" type="file" class="not-sr-only" accept=".pdf,.docx,.doc,image/*">
                                <p class="pl-1">pdf or image only</p>
                            </div>
                        </div>
                    </div>
                    </label>
                </div>
                <div class="auto-cols-max mt-1" >
                    <label class="block text-sm font-medium text-gray-700">
                        Proposal
                    </label>
                    <label for="proposal" class="relative cursor-pointer bg-white rounded-md no-underline">
                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                        <div class="space-y-1 text-center">
                            <div class="flex text-sm text-gray-600 no-underline">
                                <input id="proposal" name="proposal" type="file" class="not-sr-only" accept=".pdf,.docx,.doc,image/*">
                                <p class="pl-1">pdf or image only</p>
                            </div>
                        </div>
                    </div>
                    </label>
                </div>
            </div>
            <div class="bg-gray-200 grid grid-cols-3 gap-6 justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                <div class="col-span-2">
                    <label class="block text-sm font-medium text-gray-700">
                    Parameter Cuaca
                    </label>
                    <div class="justify-center">
                        <div class="mt-2 overflow-auto h-24">
                            @foreach ($harga as $nilai )
                            <label class="block items-center mr-3 pr-4">
                                <input type="checkbox" name="parametercuaca[]" value="{{$nilai->id}}">
                                <span class="ml-2">{{$nilai->namalayanan}} - Rp.{{$nilai->tarif}} per {{ $nilai->satuan }}</span>
                            </label>
                            @endforeach

                        </div>
                    </div>
                </div>

                <div class="auto-cols-max">
                    <label class="block text-sm font-medium text-gray-700">
                    Periode Permintaan Data
                    </label>
                    <div class="mt-1 flex rounded-md shadow-sm">
                        <select name="periodedari" id="periodedari" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 rounded-none rounded-l-md sm:text-sm border-gray-300">
                            @for ($i = 2000; $i < date('Y'); $i++)
                                <option value="{{ $i }}">Dari - {{ $i }}</option>
                            @endfor
                        </select>
                        <select name="periodesampai" id="periodesampai" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 rounded-none rounded-r-md sm:text-sm border-gray-300">
                            @for ($i = date('Y'); $i > 2000; $i--)
                                <option value="{{ $i }}">Hingga - {{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="col-span-2">
                    <label class="block text-sm font-medium text-gray-700">
                        Keterangan
                    </label>
                    <div class="mt-1">
                        <textarea id="keterangan" name="keterangan" rows="2" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" placeholder="Contoh: Data digunakan untuk menjadi rujukan dalam menentukan pembangunan Jembatan"></textarea>
                    </div>
                </div>

                <div class="auto-cols-max">
                    <label class="block text-sm font-medium text-gray-700">
                    Kode
                    </label>
                    <div class="mt-1 flex rounded-md shadow-sm">
                    <input type="text" name="kode" id="kode" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="-">
                    </div>
                </div>
            </div>
        </div>
        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Save
            </button>
        </div>
        </div>
    </form>
</div>

<script>
    function yesnoCheck(that) {
    if (that.value == "nolrupiah") {
        document.getElementById("ifYes").style = " ";
    } else {
        document.getElementById("ifYes").style.display = "none";
    }
}
</script>
@endsection
