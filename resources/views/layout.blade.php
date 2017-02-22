<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="token" id="token" content="{{ csrf_token() }}">
    <title>CRUD LaraVue</title>
    <link rel="stylesheet" href="{{asset('bootstrap/dist/css/bootstrap.min.css')}}">
  </head>
  <body>
    <div class="container">
      @yield('content')
    </div>

    <script src="js/vendor.js" charset="utf-8"></script>
    @stack('scripts')
  </body>
</html>
