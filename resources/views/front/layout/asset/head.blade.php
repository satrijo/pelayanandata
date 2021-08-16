<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Satriyo Unggul Wicaksono">
        <meta name="description" content="Pelayanan data Penerimaan Negara Bukan Pajak mengenai data - data meteorologi maupun klimatologi yang ada di wilayah Sulawesi Tenggara">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <!--Jquery-->
        <script src="{{ asset('js/jquery.min.js')}}"></script>
        <!--Floating WhatsApp css-->
        <link rel="stylesheet" href="{{ asset('css/floating-wpp.css')}}">
        <!--Floating WhatsApp javascript-->
        <script type="text/javascript" src="{{ asset('js/floating-wpp.js')}}"></script>

        <title>@yield('title', 'Halaman PNBP')</title>

    </head>
