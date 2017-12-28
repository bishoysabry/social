<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title','Socail NW')</title>
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}" />
      			  <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css')}}" />
      			  <link rel="stylesheet" href="{{ asset('css/jquery-ui.css')}}" />
      			  <link rel="stylesheet" href="{{ asset('css/jquery.selectBoxIt.css')}}" />
      			  <link rel="stylesheet" href="{{ asset('css/backend.css')}}" />

    </head>
    <body>
      @include('inc.header')

        
        <div class="container">
          @yield('content')

        </div>
        <div calss="footer">

        </div>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.selectBoxIt.min.js"></script>
<script src="js/backend.js"></script>

    </body>
</html>
