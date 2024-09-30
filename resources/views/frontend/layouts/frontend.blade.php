<!doctype html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#00aa46">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="csrf_token" content="{{ csrf_token() }}">
    {{-- icon --}}
    <link rel="shortcut icon" href="{!! asset('./assets/frontend/images/logo-alia-wisata.png') !!}" />
    <title>
        @yield('meta_title') | Alia Wisata❤️
    </title>
    <meta name="description" content="@yield('meta_description')">
    <meta name="email" content="info@aliawisata.com">
    <meta name="website" content="{!! url('/') !!}" />
    <meta name="robots" content="max-image-preview:large" />
    <meta name="keywords"
        content="" />
    <meta name="copyright" content="© Copyright 2024 Aliawisata. All Rights Reserved." />
    {{-- opengrap --}}
    <meta property="og:title" content="@yield('meta_title')" />
    <meta property="og:description" content="@yield('meta_description')" />
    <meta property="og:url" content="{!! url('/') !!}" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="{!! asset('./assets/frontend/images/logo-alia-wisata.png') !!}" />
    <meta property="og:site_name" content="Aliawisata">
    {{-- Canonicalization --}}
    <link rel="canonical" href="{!! url('/') !!}" />
    {{-- base_url --}}
    <base href="{!! url('/') !!}">


 @include('frontend.layouts.part.css')

  <!-- cssCustom -->
  @yield('cssCustom')

</head>

<body class="scroll-smooth">
  <!-- Heade -->
@include('frontend.layouts.part.header')

  <!-- Content -->
@yield('content')

  <!-- Footer -->
@include('frontend.layouts.part.footer')

  <!-- JavaScript -->
@include('frontend.layouts.part.js')

  <!-- Modal -->
{{-- @include('frontend.layouts.part.modal') --}}

  <!-- jsCustom -->
  @yield('jsCustom')

</body>

</html>
