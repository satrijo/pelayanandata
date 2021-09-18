@extends('backend.layout.main')

@section("title", "Edit Category")
@section("judul", "Edit Category")

@section('content')

<div class="w-full overflow-hidden rounded-lg shadow-xs mb-10">
    <div class="w-full overflow-x-auto">

        <section class="max-w-full p-6 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800">
            <form action="{{ route('category.update', ['id' => $edit->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="grid grid-cols-1 gap-6 mt-4 md:grid-cols-2">
                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="namalayanan">Nama Category</label>
                        <input value="{{ $edit->nama }}" required name="nama"
                            type="text"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                    </div>

                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="jenislayanan">Satuan</label>
                        <select name="satuan"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                            @foreach ($satuan as $s )
                                <option value="{{ $s }}" @if ($edit->satuan == $s)
                                    selected
                                @endif>{{ $s }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="tarif">Waktu</label>
                        <select name="waktu"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                            @foreach ($waktu as $w )
                                <option value="{{ $w }}" @if ($edit->waktu == $w)
                                    selected
                                @endif>{{ ucfirst($w) }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="satuan">Deskripsi</label>
                        <input value="{{ $edit->deskripsi }}" required name="deskripsi" type="text"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                    </div>

                    {{-- <div>
                        <label class="text-gray-700 dark:text-gray-200" for="satuan">Cover</label>
                        <input required name="satuan" type="text"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                    </div> --}}

                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="satuan">Status</label>
                        <select name="status" id="status"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                            <option value="aktif" @if ($edit->status == "aktif")
                                    selected
                                @endif>Aktif</option>
                            <option value="nonaktif" @if ($edit->status == "nonaktif")
                                    selected
                                @endif>Non Aktif</option>
                        </select>
                    </div>
                    <div class="flex justify-center">
                        <button type="update"
                            class="px-20 py-3 my-5 text-white capitalize font-medium text-base transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Save</button>
                    </div>
                </div>
            </form>
        </section>

    </div>
</div>

@endsection
