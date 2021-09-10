@extends('front.layout.main')


@section('title')
FAQ
@endsection


@section('hero')
@include('front.layout.asset.hero-page')
@endsection

@push('assets')
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v1.9.8/dist/alpine.js" defer></script>

<style>
    .trix-content ol li {
        list-style: decimal;
        margin-left: 1em;
        margin-top: 0.5em;
    }
    .trix-content ul li {
        list-style: disc;
        margin-left: 1em;
        margin-top: 0.5em;
    }
</style>
@endpush

@section('content')

<section class="relative py-16 bg-gray-300">
    <div class="container mx-auto md:px-4">
        <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg -mt-64">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-10 md:px-10 py-10">

                <div class="block items-center justify-center">
                    <div class="w-full md:w-3/5 mx-auto p-8">

                            <div class="w-full my-4">
                                @foreach ($data as $d )
                                <div x-data={show:false} class="rounded-sm">
                                    <div class="border border-b-0 bg-gray-100 px-10 py-6" id="headingOne">
                                        <button @click="show=!show" class=" text-gray-700 hover:text-gray-500 focus:outline-none"
                                            type="button">
                                            {{ $d->question }}
                                        </button>
                                    </div>
                                    <div x-show="show" class="border border-b-0 px-10 py-6 space-y-5 trix-content">
                                        {!! $d->answer !!}
                                    </div>
                                </div>
                                @endforeach
                            </div>
                           <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-center">
                            <nav aria-label="Table navigation">
                                {{ $data->links() }}
                            </nav>
                        </span>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

@endsection
