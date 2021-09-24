@inject('setting','App\Http\Controllers\SettingController')
<footer class="relative bg-gray-300 pt-8 pb-6">
    <div class="bottom-auto top-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden -mt-20"
        style="height: 80px;">
        <svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none"
            version="1.1" viewBox="0 0 2560 100" x="0" y="0">
            <polygon class="text-gray-300 fill-current" points="2560 0 2560 100 0 100"></polygon>
        </svg>
    </div>
    <div class="container mx-auto px-4">
        <div class="flex flex-wrap">
            <div class="w-full lg:w-6/12 px-4">
                <h4 class="text-3xl font-semibold">Let's keep in touch!</h4>
                <h5 class="text-lg mt-0 mb-2 text-gray-700">
                    Hubungi kami melalui social media, Kami akan merespon 1-2 hari kerja.
                </h5>
                <div class="mt-6 flex">
                    <a
                        class="bg-white text-blue-600 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2 p-3"
                        href="{{ $setting->meta()->facebook }}">
                        <i class="flex fab fa-facebook"></i>
                    </a>
                    <a
                        class="bg-white text-blue-400 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2 p-3"
                        href="{{ $setting->meta()->twitter }}">
                        <i class="flex fab fa-twitter"></i>
                    </a>
                    <a
                        class="bg-white text-red-600 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2 p-3"
                        href="{{ $setting->meta()->youtube }}">
                        <i class="flex fab fa-youtube"></i>
                    </a>
                    <a
                        class="bg-white text-pink-400 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2 p-3"
                        href="{{ $setting->meta()->instagram }}">
                        <i class="flex fab fa-instagram"></i>
                    </a>
                </div>
            </div>

            @php
                $exp1 = explode(' ', $setting->meta()->link1);
            @endphp
            @if (in_array('>', $exp1))
            @php
                $link1 = explode('>', $setting->meta()->link1);
            @endphp

            @else
            @php
                $link1[1] = "Link";
                $link1[0] = "#";
            @endphp
            @endif

            @php
            $exp1 = explode(' ', $setting->meta()->link2);
            @endphp
            @if (in_array('>', $exp1))
            @php
            $link2 = explode('>', $setting->meta()->link2);
            @endphp

            @else
            @php
            $link2[1] = "Link";
            $link2[0] = "#";
            @endphp
            @endif

            @php
            $exp1 = explode(' ', $setting->meta()->link3);
            @endphp
            @if (in_array('>', $exp1))
            @php
            $link3 = explode('>', $setting->meta()->link3);
            @endphp

            @else
            @php
            $link3[1] = "Link";
            $link3[0] = "#";
            @endphp
            @endif

            @php
            $exp1 = explode(' ', $setting->meta()->link4);
            @endphp
            @if (in_array('>', $exp1))
            @php
            $link4 = explode('>', $setting->meta()->link4);
            @endphp

            @else
            @php
            $link4[1] = "Link";
            $link4[0] = "#";
            @endphp
            @endif

            <div class="w-full lg:w-6/12 md:px-4">
                <div class="flex flex-wrap items-top my-5">
                    <div class="w-full lg:w-4/12 px-4 ml-auto mb-5">
                        <span class="block uppercase text-gray-600 text-sm font-semibold mb-2">Useful Links</span>
                        <ul class="list-unstyled">
                            <li>
                                <a class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm"
                                    href="{{ $link1[1] }}">{{ $link1[0] }}</a>
                            </li>
                            <li>
                                <a class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm"
                                    href="{{ $link2[1] }}">{{ $link2[0] }}</a>
                            </li>
                            <li>
                                <a class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm"
                                    href="{{ $link3[1] }}">{{ $link3[0] }}</a>
                            </li>
                            <li>
                                <a class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm"
                                    href="{{ $link4[1] }}">{{ $link4[0] }}</a>
                            </li>
                        </ul>
                    </div>
                    {{-- <div class="w-full lg:w-4/12 px-4 sm:mt-5 md:mt-0">
                        <span class="block uppercase text-gray-600 text-sm font-semibold mb-2">Other Resources</span>
                        <ul class="list-unstyled">
                            <li>
                                <a class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm"
                                    href="https://github.com/creativetimofficial/argon-design-system/blob/master/LICENSE.md">MIT
                                    License</a>
                            </li>
                            <li>
                                <a class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm"
                                    href="https://creative-tim.com/terms">Terms &amp; Conditions</a>
                            </li>
                            <li>
                                <a class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm"
                                    href="https://creative-tim.com/privacy">Privacy Policy</a>
                            </li>
                            <li>
                                <a class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm"
                                    href="https://creative-tim.com/contact-us">Contact Us</a>
                            </li>
                        </ul>
                    </div> --}}
                </div>
            </div>
        </div>
        <hr class="my-6 border-gray-400" />
        <div class="flex flex-wrap items-center md:justify-between justify-center">
            <div class="w-full md:w-4/12 px-4 mx-auto text-center">
                <div class="text-sm text-gray-600 font-semibold py-1">
                    Copyright © 2021 Aplikasi PTSP by
                    <a href="https://joglohub.com" class="text-gray-600 hover:text-gray-900">Satriyo & Joglohub</a>.
                </div>
            </div>
        </div>
    </div>
</footer>
