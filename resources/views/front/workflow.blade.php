@extends('front.layout.main')


@section('title')
Alur Permohonan Data
@endsection


@section('hero')
@include('front.layout.asset.hero-page')
@endsection

@section('content')
<section class="relative py-16 bg-gray-300">
    <div class="container mx-auto md:px-4">
        <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg -mt-64">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-10 md:px-10 py-10">

                <div class="block items-center justify-center space-y-5 gap-5">
                    {!! $data->value !!}
                </div>


            </div>
        </div>
    </div>
</section>
@endsection
