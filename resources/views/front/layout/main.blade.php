@include('front.layout.asset.head')
    <body class="bg-gray-100">
    <div class="relative flex items-top justify-center dark:bg-gray-900 sm:items-center sm:pt-0"> {{-- min-h-screen --}}
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            @include('front.layout.asset.nav')
            @yield('hero')
            @yield('marquee')
            @yield('content')
            @include('front.layout.asset.footer')
        </div>
    </div>
    @include('front.layout.asset.wa')
    </body>
      <!--
        //////////////////////////////////////////////////////////////////////
            Dibuat oleh Satriyo Unggul Wicaksono, S.Tr.Met - 25 Juni 2021
            Website ini dibuat menggunakan teknologi:
            *PHP Version 8.x
            *MariaDB
            *Apache
            *Framework Laravel
            *Tailwind CSS
            *Javascript
        //////////////////////////////////////////////////////////////////////
        -->
</html>
