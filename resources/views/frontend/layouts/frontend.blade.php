<!doctype html>
<html lang="en" class="scroll-smooth">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">


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
