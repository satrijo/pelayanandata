@extends('backend.layout.main')

@section("title", "Edit User")
@section("judul", "Edit User")

@section('content')

<div class="w-full overflow-hidden rounded-lg shadow-xs mb-10">
    <div class="w-full overflow-x-auto">

        <section class="max-w-full p-6 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800">
            <form action="{{ route('user.update', ['id'=>$data->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="block gap-6 mt-4 sm:grid-cols-2">
                    @if ($message = Session::get('sukses'))
                    <div class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-green-500">
                        <span class="inline-block align-middle mr-8">
                            <b class="capitalize">Berhasil</b> {{ $message }}
                        </span>
                    </div>
                    @endif
                    <div class="mb-5">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Username
                        </label>
                        <input required name="name" value="{{ $data->name }}" placeholder="Username" type="text"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                            @error('name')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                    </div>

                    <div class="mb-5">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            E-mail
                        </label>
                        <input required name="email" value="{{ $data->email }}" placeholder="Email" type="email"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                        @error('email')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-5">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Password Baru
                        </label>
                        <input name="password" placeholder="Password" type="password"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                        @if ($message = Session::get('tidaksama'))
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @endif
                    </div>

                    <div class="mb-5">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Ulangi Password Baru
                        </label>
                        <input name="password2" placeholder="Retype Password" type="password"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                        @if ($message = Session::get('tidaksama'))
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @endif
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
