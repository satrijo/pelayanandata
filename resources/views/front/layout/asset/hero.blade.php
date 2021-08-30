<div class="relative pt-16 pb-32 flex content-center items-center justify-center" style="min-height: 75vh;">
    <div class="absolute top-0 w-full h-full bg-top bg-cover"
        style='background-image: url(./images/bg.gif);'>
        <span id="blackOverlay" class="w-full h-full absolute opacity-75 bg-black"></span>
    </div>
    <div class="container relative mx-auto">
        <div class="items-center flex flex-wrap">
            <div class="w-full lg:w-6/12 px-4 ml-auto mr-auto text-center">
                <div class="pr-12">
                    <h1 class="text-white font-semibold text-5xl">
                        Permohonan Data Cuaca
                    </h1>
                    <p class="mt-4 text-lg text-gray-300 mb-5">
                        Untuk mendukung manajemen pengguna layanan Data Online BMKG Baubau dalam rangka meningkatkan
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
