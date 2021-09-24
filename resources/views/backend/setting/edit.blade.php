@extends('backend.layout.main')

@section("title", "Edit Setting")
@section("judul", "Edit Setting")

@section('content')

<div class="w-full overflow-hidden rounded-lg shadow-xs mb-10">
    <div class="w-full overflow-x-auto">

        <section class="max-w-full p-6 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800">
            <form action="{{ route('setting.update', ['id'=>$data->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="block gap-6 mt-4 sm:grid-cols-2">
                    <div class="mb-5">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Nama UPT
                        </label>
                        <input required name="upt" value="{{ $data->upt }}" placeholder="Nama UPT"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                    </div>

                    <div class="mb-5">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Link Survey
                        </label>
                        <input required name="survey" value="{{ $data->survey }}" placeholder="Link survey, isi dengan link google form atau zoho form"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                    </div>

                    <div class="mb-5">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Link Facebook
                        </label>
                        <input required name="facebook" value="{{ $data->facebook }}" placeholder="Facebook UPT jika ada"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                    </div>

                    <div class="mb-5">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Link Instagram
                        </label>
                        <input required name="instagram" value="{{ $data->instagram }}" placeholder="Instagram UPT jika ada"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                    </div>

                    <div class="mb-5">
                        <label class="block capitalize text-sm font-medium text-gray-700 dark:text-gray-300">
                            Link twitter
                        </label>
                        <input required name="twitter" value="{{ $data->twitter }}" placeholder="Twitter UPT jika ada"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                    </div>

                    <div class="mb-5">
                        <label class="block capitalize text-sm font-medium text-gray-700 dark:text-gray-300">
                            Link youtube
                        </label>
                        <input required name="youtube" value="{{ $data->youtube }}" placeholder="Youtube UPT jika ada"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                    </div>

                    <div class="mb-5">
                        <label class="block capitalize text-sm font-medium text-gray-700 dark:text-gray-300">
                            Footer link 1
                        </label>
                        <input required name="link1" value="{{ $data->link1 }}" placeholder="Judul link > Alamat link. Pisahkan dengan simbol > (lebih dari)"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                    </div>

                    <div class="mb-5">
                        <label class="block capitalize text-sm font-medium text-gray-700 dark:text-gray-300">
                            Footer link 2
                        </label>
                        <input required name="link2" value="{{ $data->link2 }}" placeholder="Judul link > Alamat link. Pisahkan dengan simbol > (lebih dari)"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                    </div>

                    <div class="mb-5">
                        <label class="block capitalize text-sm font-medium text-gray-700 dark:text-gray-300">
                            Footer link 3
                        </label>
                        <input required name="link3" value="{{ $data->link3 }}" placeholder="Judul link > Alamat link. Pisahkan dengan simbol > (lebih dari)"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                    </div>

                    <div class="mb-5">
                        <label class="block capitalize text-sm font-medium text-gray-700 dark:text-gray-300">
                            Footer link 4
                        </label>
                        <input required name="link4" value="{{ $data->link4 }}" placeholder="Judul link > Alamat link. Pisahkan dengan simbol > (lebih dari)"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                    </div>

                    <div class="mb-5">
                        <label class="block capitalize text-sm font-medium text-gray-700 dark:text-gray-300">
                            Link dokumen
                        </label>
                        <input required name="dokumen" value="{{ $data->dokumen }}" placeholder="Link dokumen pendukung"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                    </div>

                    <div class="mb-5">
                        <label class="block capitalize text-sm font-medium text-gray-700 dark:text-gray-300">
                            No. Whatsapp
                        </label>
                        <input required name="nowa" value="{{ $data->nowa }}" placeholder="Whatsapp UPT"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                    </div>

                    <div class="mb-5">
                        <label class="block capitalize text-sm font-medium text-gray-700 dark:text-gray-300">
                            No. Whatsapp Group
                        </label>
                        <input required name="wag" value="{{ $data->wag }}" placeholder="Whatsapp Dokumentasi (Lihat dokumentasi untuk informasi selanjutnya)"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                    </div>

                    <div class="mb-5">
                        <label class="block capitalize text-sm font-medium text-gray-700 dark:text-gray-300">
                            Token
                        </label>
                        <input name="token" value="{{ $data->token }}"
                            placeholder="Token WA Notification"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                    </div>

                    <div class="mb-5">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Info Rekening
                        </label>
                        <textarea required name="rekening" placeholder="Isi kan dengan Informasi rekening untuk pembayaran"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">{{ $data->rekening }}</textarea>
                    </div>
                    <div class="block justify-center">
                        <button type="submit"
                            class="px-20 py-3 my-5 text-white capitalize font-medium text-base transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Save</button>
                    </div>
                </div>
            </form>
        </section>

    </div>
</div>

@endsection
