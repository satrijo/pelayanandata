@extends('backend.layout.main')

@section("title", "Tambah FAQ")
@section("judul", "Tambah FAQ")

@section('content')

<div class="w-full overflow-hidden rounded-lg shadow-xs mb-10">
    <div class="w-full overflow-x-auto">

        <section class="max-w-full p-6 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800">
            <form action="{{ route('faq.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="block gap-6 mt-4 sm:grid-cols-2">
                    <div class="block justify-center">
                        <input placeholder="Judul Pertanyaan" name="question" type="text" class="block w-full px-4 py-2 my-3 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                    </div>
                    <div>
                        <textarea required name="answer" id="wysiwyg-editor"
                            class="ckeditor block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">{{ old('answer') }}</textarea>
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

<script src="https://cdn.ckeditor.com/4.16.2/full/ckeditor.js"></script>
<script type="text/javascript">
    CKEDITOR.replace('wysiwyg-editor', {
        filebrowserUploadUrl: "{{route('ckeditor.image-upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });

    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>




@endsection
