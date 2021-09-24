@inject('setting','App\Http\Controllers\SettingController')
<nav class="top-0 absolute z-50 w-full flex flex-wrap items-center justify-between px-2 py-3 ">
    <div class="container px-4 mx-auto flex flex-wrap items-center justify-between">
        <div class="w-full relative flex justify-between lg:w-auto lg:static lg:block lg:justify-start">
            <a class="text-sm font-bold leading-relaxed inline-block mr-4 py-2 whitespace-nowrap uppercase text-white"
                href="{{ route('home') }}">{{ config('app.name') }}</a><button
                class="cursor-pointer text-xl leading-none px-3 py-1 border border-solid border-transparent rounded bg-transparent block lg:hidden outline-none focus:outline-none"
                type="button" onclick="toggleNavbar('example-collapse-navbar')">
                <i class="text-white fas fa-bars"></i>
            </button>
        </div>
        <div class="lg:flex flex-grow items-center bg-white lg:bg-transparent lg:shadow-none hidden"
            id="example-collapse-navbar">
            <ul class="flex flex-col lg:flex-row list-none mr-auto">
                <li class="flex items-center">
                    <a class="lg:text-white lg:hover:text-gray-300 text-gray-800 px-3 py-4 lg:py-2 flex items-center text-xs capitalize font-bold"
                        href="{{ route('order') }}">
                        {{-- <i class="lg:text-gray-300 text-gray-500 far fa-file-alt text-lg leading-lg mr-2"></i> --}}
                        Permohonan Data</a>
                </li>
                <li class="flex items-center">
                    <a class="lg:text-white lg:hover:text-gray-300 text-gray-800 px-3 py-4 lg:py-2 flex items-center text-xs capitalize font-bold"
                        href="{{ route('monitoring') }}">
                        Monitoring</a>
                </li>
                <li class="flex items-center">
                    <a class="lg:text-white lg:hover:text-gray-300 text-gray-800 px-3 py-4 lg:py-2 flex items-center text-xs capitalize font-bold"
                        href="{{ route('konfirmasi') }}">
                        Konfirmasi</a>
                </li>
                <li class="flex items-center">
                    <a class="lg:text-white lg:hover:text-gray-300 text-gray-800 px-3 py-4 lg:py-2 flex items-center text-xs capitalize font-bold"
                        href="{{ route('tarif.show') }}">
                        Tarif Data</a>
                </li>
                <li class="flex items-center">
                    <a class="lg:text-white lg:hover:text-gray-300 text-gray-800 px-3 py-4 lg:py-2 flex items-center text-xs capitalize font-bold"
                        href="{{ route('workflow') }}">
                        Alur Permohonan</a>
                </li>

                <li class="flex items-center">
                    <a class="lg:text-white lg:hover:text-gray-300 text-gray-800 px-3 py-4 lg:py-2 flex items-center text-xs capitalize font-bold"
                        href="{{ $setting->meta()->survey }}">
                        Form Survey</a>
                </li>
                <li class="flex items-center">
                    <a class="lg:text-white lg:hover:text-gray-300 text-gray-800 px-3 py-4 lg:py-2 flex items-center text-xs capitalize font-bold"
                        href="{{ route('faq.show') }}">
                        FAQ</a>
                </li>
            </ul>
            <ul class="flex flex-col lg:flex-row list-none lg:ml-auto">
                <li class="flex items-center">
                    <a class="lg:text-white lg:hover:text-gray-300 text-gray-800 px-3 py-4 lg:py-2 flex items-center text-xs capitalize font-bold"
                        href="{{ route('kontak') }}">Kontak</a>
                </li>
                <li class="flex items-center">
                    <a class="lg:text-white lg:hover:text-gray-300 text-gray-800 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
                        href="{{ $setting->meta()->facebook }}"><i class="lg:text-gray-300 text-gray-500 fab fa-facebook text-lg leading-lg "></i><span
                            class="lg:hidden inline-block ml-2">Share</span></a>
                </li>
                <li class="flex items-center">
                    <a class="lg:text-white lg:hover:text-gray-300 text-gray-800 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
                        href="{{ $setting->meta()->twitter }}"><i
                            class="lg:text-gray-300 text-gray-500 fab fa-twitter text-lg leading-lg "></i><span
                            class="lg:hidden inline-block ml-2">Tweet</span></a>
                </li>
                <li class="flex items-center">
                    <a class="lg:text-white lg:hover:text-gray-300 text-gray-800 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
                        href="{{ $setting->meta()->youtube }}"><i
                            class="lg:text-gray-300 text-gray-500 fab fa-youtube text-lg leading-lg "></i><span
                            class="lg:hidden inline-block ml-2">Subscribe</span></a>
                </li>
                <li class="flex items-center">
                    <a class="lg:text-white lg:hover:text-gray-300 text-gray-800 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
                        href="{{ $setting->meta()->instagram }}"><i
                            class="lg:text-gray-300 text-gray-500 fab fa-instagram text-lg leading-lg "></i><span
                            class="lg:hidden inline-block ml-2">Follow</span></a>
                </li>
                <li class="flex items-center">
                    <a href="{{ $setting->meta()->dokumen }}"
                        class="bg-white text-gray-800 active:bg-gray-100 text-xs font-bold uppercase px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none lg:mr-1 lg:mb-0 ml-3 mb-3"
                        style="transition: all 0.15s ease 0s;">
                        <i class="fas fa-arrow-alt-circle-down"></i> Dokumen Pendukung
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
