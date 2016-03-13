
<html>
    <head>

        <title>Aetecnet Admin</title>

        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />

        <link rel="stylesheet" href="{!! asset('css/font-awesome.min.css') !!}">
        <link href="{!! asset('css/bootstrap.min.css') !!}" media="all" rel="stylesheet" type="text/css" />
        <link href='https://fonts.googleapis.com/css?family=Maven+Pro:400,500,700,900' rel='stylesheet' type='text/css'>
        <link href="{!! asset('css/admin.css') !!}" media="all" rel="stylesheet" type="text/css" />
        
        
    </head>
    <body>
        @include('admin.partials.header')
        <div class="container-fluid">
            @yield('content')
        </div>

        <script type="text/javascript" src="{!! asset('js/jquery-2.js') !!}"></script>
        <script   src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"   integrity="sha256-xNjb53/rY+WmG+4L6tTl9m6PpqknWZvRt0rO1SRnJzw="   crossorigin="anonymous"></script>
        <script type="text/javascript" src="{!! asset('js/bootstrap.min.js') !!}"></script>
        <script type="text/javascript" src="{!! asset('js/admin.js') !!}"></script>
    </body>
</html>