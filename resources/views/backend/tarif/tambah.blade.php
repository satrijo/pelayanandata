@extends('backend.layout.main')

@section("title", "Tambah Tarif")
@section("judul", "Tambah Tarif")

@section('content')

<div class="w-full overflow-hidden rounded-lg shadow-xs mb-10">
    <div class="w-full overflow-x-auto">

        <section class="max-w-full p-6 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800">
            <form action="{{ route('tarif.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="namalayanan">Nama Layanan</label>
                        <input required placeholder="Angin / Angin Maksimum / Angin Minimum. dsb" name="namalayanan" type="text"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                    </div>

                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="jenislayanan">Jenis Layanan</label>
                        <input placeholder="Udara Permukaan / Maritim / Prakiraan" name="jenislayanan" type="text"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                    </div>

                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="tarif">Tarif</label>
                        <input required placeholder="60000" name="tarif" type="text"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                    </div>

                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="satuan">Satuan</label>
                        <input required placeholder="Tahun / Per Buku / Per Laporan" name="satuan" type="text"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                    </div>
                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="satuan">Status</label>
                        <select name="status" id="status"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                            <option value="aktif">Aktif</option>
                            <option value="nonaktif">Non Aktif</option>
                        </select>
                    </div>
                    <div class="flex justify-center">
                        <button type="submit"
                            class="px-20 py-3 my-5 text-white capitalize font-medium text-base transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Save</button>
                    </div>
                </div>
            </form>
        </section>

    </div>
</div>

@endsection
