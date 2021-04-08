<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="Webartinfo">
      <meta name="author" content="Webartinfo">
      @yield('meta')

      <title>@yield('title')</title>

      <link rel="icon" type="image/png" href="img/favicon.png">
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">
      <link href="{{ asset('css/icons/css/materialdesignicons.min.css') }}" media="all" rel="stylesheet" type="text/css" />

      <link href="{{ asset('css/style.css') }}" rel="stylesheet">
      @toastr_css
      @yield('css')
   </head>
   <body>
      @include('layout.presentacion.header')

      @yield('content')

      @yield('modals')

      @include('layout.presentacion.footer')

      <script src="{{ asset('js/app.js') }}"></script>
      <script src="{{ asset('js/jqBootstrapValidation.js') }}"></script>
      <script src="{{ asset('js/contact_me.js') }}"></script>
      <script src="{{ asset('js/custom.js') }}"></script>
      @jquery
      @toastr_js
      @toastr_render
      @yield('scripts')
   </body>
</html>
