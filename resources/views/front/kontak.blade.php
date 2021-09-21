@extends('front.layout.main')


@section('title')
Kontak
@endsection


@section('hero')
@include('front.layout.asset.hero-page')
@endsection

@push('assets')

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin="" />

    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>

    <script src="https://unpkg.com/esri-leaflet@3.0.2/dist/esri-leaflet.js"
        integrity="sha512-myckXhaJsP7Q7MZva03Tfme/MSF5a6HC2xryjAM4FxPLHGqlh5VALCbywHnzs2uPoF/4G/QVXyYDDSkp5nPfig=="
        crossorigin=""></script>


    <style>
        #map { height: 580px; }
    </style>

@endpush

@section('content')
<section class="relative py-16 bg-gray-300">
    <div class="container mx-auto md:px-4">
        <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg -mt-64">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-1">
                <div class="justify-center items-center">


                    {{-- Isi --}}

                    <div id="map" class="rounded-lg"></div>

                    {{-- end isi  --}}

                </div>
            </div>
        </div>
    </div>
</section>
<script>
    var map = L.map('map').setView([-5.487882,122.61088], 14);
    L.esri.basemapLayer('Imagery').addTo(map);

    L.marker([-5.487882,122.57088]).addTo(map)
    .bindPopup('<b>Stasiun Meteorologi Betoambari Baubau</b><br><br>Kompleks Bandar Udara Betoambari, BMKG, Katobengke, Betoambari, Kota Bau-Bau, Sulawesi Tenggara 93724 <br>Telp: +624022823606')
    .openPopup();
</script>
@endsection
