
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Deelgood</title>




    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="/css/app.css" rel="stylesheet">
    @yield('headercss')
    @yield('headerscripts')
  </head>

  <body>
    <div class="container">
    <!-- Fixed navbar -->
    @include('layouts.nav')

    <!-- Begin page content -->
    <main role="main">
        @yield('content')
    </main>

    @include('layouts.footer')
  </div>

    @include('layouts.footerscripts')
    @yield('specialscripts')
  </body>
</html>
