<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight mr-5">
                {{ __('Tarif') }}
            </h2>

            <button id="tambah" style="display: inline" onclick="yesnoCheck(this);" class="px-4 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-blue-600 rounded-md dark:bg-gray-800 hover:bg-blue-500 dark:hover:bg-gray-700 focus:outline-none focus:bg-blue-500 dark:focus:bg-gray-700">
                Tambah Tarif
            </button>
            <button id="batal" style="display: none" onclick="batal(this);" class="px-4 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-red-600 rounded-md dark:bg-gray-800 hover:bg-red-500 dark:hover:bg-gray-700 focus:outline-none focus:bg-red-500 dark:focus:bg-gray-700">
                Batal Tambah
            </button>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    {{-- Form tambah tarif --}}


                    <section id="ifYes" class="max-w-full p-6 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800" style="display: none">
                        <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">Tambah Tarif Layanan</h2>

                        <form action="{{ route('tarif.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                                <div>
                                    <label class="text-gray-700 dark:text-gray-200" for="namalayanan">Nama Layanan</label>
                                    <input required placeholder="Angin / Angin Maksimum / Angin Minimum. dsb" name="namalayanan" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                                </div>

                                <div>
                                    <label class="text-gray-700 dark:text-gray-200" for="jenislayanan">Jenis Layanan</label>
                                    <input placeholder="Udara Permukaan / Maritim / Prakiraan" name="jenislayanan" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                                </div>

                                <div>
                                    <label class="text-gray-700 dark:text-gray-200" for="tarif">Tarif</label>
                                    <input required placeholder="60000" name="tarif" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                                </div>

                                <div>
                                    <label class="text-gray-700 dark:text-gray-200" for="satuan">Satuan</label>
                                    <input required placeholder="Tahun / Per Buku / Per Laporan" name="satuan" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
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


                    <!-- This example requires Tailwind CSS v2.0+ -->
                    <div id="list" class="flex flex-col" style="display: inline">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nama Layanan
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Jenis Layanan
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Tarif
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Satuan
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status
                                </th>
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Edit</span>
                                </th>
                                </tr>
                            </thead>

                            @foreach ($data as $d )
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="text-sm font-medium text-gray-900">
                                        {{ $d->namalayanan }}
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $d->jenislayanan }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">Rp.{{ $d->tarif }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $d->satuan }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if ($d->status == "aktif")
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            Aktif
                                        </span>
                                    @else
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                            Non Aktif
                                        </span>
                                    @endif

                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="{{ route('tarif.edit', ['id'=>$d->id]) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                </td>
                                </tr>

                                <!-- More people... -->
                            </tbody>
                            @endforeach
                            </table>
                        </div>
                        <div class="mt-5 px-10">
                            {{ $data->links() }}
                        </div>

                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
            function yesnoCheck(that) {
                document.getElementById("ifYes").style = " ";
                document.getElementById("list").style.display = "none";
                document.getElementById("batal").style = " ";
                document.getElementById("tambah").style.display = "none";
            }
            function batal(that) {
                document.getElementById("ifYes").style.display = "none";
                document.getElementById("list").style = " ";
                document.getElementById("tambah").style = " ";
                document.getElementById("batal").style.display = "none";
            }
            </script>
</x-app-layout>
