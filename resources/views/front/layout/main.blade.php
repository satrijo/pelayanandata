@include('front.layout.asset.head')
    <body class="text-gray-800 antialiased">
            @include('front.layout.asset.nav')
            <main>
            @yield('hero')
            @yield('marquee')
            @yield('content')
            </main>
            @include('front.layout.asset.footer')

    {{-- @include('front.layout.asset.wa') --}}
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
<script>
    function toggleNavbar(collapseID) {
      document.getElementById(collapseID).classList.toggle("hidden");
      document.getElementById(collapseID).classList.toggle("block");
    }
</script>

</html>
