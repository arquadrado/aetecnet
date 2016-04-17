
<html>
    <head>

        <title>Aetecnet</title>

        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />

        <link rel="stylesheet" href="{!! asset('css/font-awesome.min.css') !!}">
        <link href="{!! asset('css/jquery.fullPage.css') !!}" media="all" rel="stylesheet" type="text/css" />
        <link href="{!! asset('css/bootstrap.min.css') !!}" media="all" rel="stylesheet" type="text/css" />
        <link href='https://fonts.googleapis.com/css?family=Roboto:300' rel='stylesheet' type='text/css'>
        <link href="{!! asset('css/app.css') !!}" media="all" rel="stylesheet" type="text/css" />
        

        <script type="text/javascript" src="{!! asset('js/reqs.js') !!}"></script>
        <script type="text/javascript" src="{!! asset('js/app.js') !!}"></script>
    </head>
    <body>
        <div class="container-fluid">
            @yield('content')
        </div>

        
        
    </body>
</html>