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
                    <section class="max-w-full p-6 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800">
                        <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">Tambah Tarif Layanan</h2>

                        <form action="{{ route('tarif.update', ['id'=>$edit->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                                <div>
                                    <label class="text-gray-700 dark:text-gray-200" for="namalayanan">Nama Layanan</label>
                                    <input value="{{$edit->namalayanan}}" required placeholder="Angin / Angin Maksimum / Angin Minimum. dsb" name="namalayanan" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                                </div>

                                <div>
                                    <label class="text-gray-700 dark:text-gray-200" for="jenislayanan">Jenis Layanan</label>
                                    <input value="{{$edit->jenislayanan}}" placeholder="Udara Permukaan / Maritim / Prakiraan" name="jenislayanan" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                                </div>

                                <div>
                                    <label class="text-gray-700 dark:text-gray-200" for="tarif">Tarif</label>
                                    <input value="{{$edit->tarif}}" required placeholder="60000" name="tarif" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                                </div>

                                <div>
                                    <label class="text-gray-700 dark:text-gray-200" for="satuan">Satuan</label>
                                    <input value="{{$edit->satuan}}" required placeholder="Tahun / Per Buku / Per Laporan" name="satuan" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                                </div>
                                <div>
                                    <label class="text-gray-700 dark:text-gray-200" for="satuan">Status</label>
                                    <select name="status" id="status" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                                        <option value="aktif">Aktif</option>
                                        <option value="nonaktif">Non Aktif</option>
                                    </select>
                                </div>
                                <div class="flex justify-center">
                                    <button type="submit" class="px-20 py-3 my-5 text-white capitalize font-medium text-base transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Save</button>
                                </div>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
