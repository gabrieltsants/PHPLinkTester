<html>
  <head>
  	<title>PHPLinkTesterWeb</title>
    <link type="text/css" rel="stylesheet" href="{{ url('/assets/css/main.css') }}"/>
    <link type="text/css" rel="stylesheet" href="{{ url('/assets/css/materialize.min.css') }}"  media="screen,projection"/>
  </head>
  <body>
  	<nav>
      @include('layout.header')
    </nav>
  		<main>
        @yield('content')
      </main>
  	<footer class="page-footer light-blue darken-2">
      @include('layout.footer')
    </footer>
  </body>
</html>