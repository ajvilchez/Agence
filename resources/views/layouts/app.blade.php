<!doctype html>

<html lang="{{ app()->getLocale() }}">

    <head>

        <meta charset="utf-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Reset -->

        <link href="{{asset('css/reset.css')}}" rel="stylesheet">

        <!-- Bootstrap core CSS -->
        
        <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">
        

        <!-- Material Design Bootstrap -->
        
        <link href="{{asset('css/mdb.css')}}" rel="stylesheet">
        

        <!-- Bootstrap core CSS -->
        
        <link href="{{asset('css/chartist.min.css')}}" rel="stylesheet">
        
        <!-- Custom style -->
        
        <link href="{{asset('css/app.css')}}" rel="stylesheet">

        <title>Agence Test</title>

    </head>

    <body>

    	@include('layouts.nav')

    	@yield('content')

    	@include('layouts.footer')

        @yield('scripts')

    </body>

</html>
