<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="author" content="Satriyo Unggul Wicaksono">
        <meta name="description" content="Pelayanan data Penerimaan Negara Bukan Pajak mengenai data BMKG maupun pelayanan Jasa">
        <meta name="theme-color" content="#000000" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet"
            href="https://cdn.jsdelivr.net/gh/creativetimofficial/tailwind-starter-kit/compiled-tailwind.min.css" />
        <title>@yield('title', 'Halaman PNBP')</title>

        @stack('assets')
    </head>
