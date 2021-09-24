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
        #atas{
            background-color: black;
            opacity: 50%;
        }
    </style>


@endpush
<div class="relative pt-16 pb-32 flex content-center items-center justify-center" style="min-height: 75vh;">

    <div id="map" class="absolute top-0 w-full h-full bg-top bg-cover z-0">
    </div>
    <div id="atas" class="absolute top-0 w-full h-full bg-top bg-cover z-0">
    </div>
    <div class="container relative mx-auto">
        <div class="items-center flex flex-wrap">
            <div class="w-full lg:w-6/12 px-4 ml-auto mr-auto text-center">
                <div class="pr-12">
                    <h1 class="text-white font-semibold text-5xl">
                        Permohonan Data Cuaca
                    </h1>
                    <p class="mt-4 text-lg text-gray-300 mb-5">
                        Untuk mendukung manajemen pengguna layanan Data Online BMKG dalam rangka meningkatkan
                        layanan, pemohon dapat
                        melakukan Permohonan data cuaca melalui form aplikasi online.
                    </p>
                    <a href="{{ route('order') }}"
                        class=" bg-blue-200 text-gray-800 text-xs font-bold uppercase px-4 py-3 rounded shadow hover:shadow-md outline-none focus:outline-none lg:mr-1 lg:mb-0 ml-3 mb-3"
                        style="transition: all 0.15s ease 0s;">
                        Ajukan Permohonan <i class="fas fa-arrow-alt-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="top-auto bottom-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden"
        style="height: 70px;">
        <svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none"
            version="1.1" viewBox="0 0 2560 100" x="0" y="0">
            <polygon class="text-gray-300 fill-current" points="2560 0 2560 100 0 100"></polygon>
        </svg>
    </div>
</div>

<script>

    var koordinate = {!! json_encode($data->toArray()) !!};

    let latlon = koordinate['latlon'];
    const pisah = latlon.split(',')

    var map = L.map('map', {zoomControl: false}).setView([pisah["0"],pisah["1"]], 9);
    L.esri.basemapLayer('Imagery').addTo(map);


</script>
