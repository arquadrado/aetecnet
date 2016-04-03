<html>
    <head>

        <title>Aetecnet Admin</title>

        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />

        <link rel="stylesheet" href="{!! asset('css/font-awesome.min.css') !!}">
        <link href="{!! asset('css/bootstrap.min.css') !!}" media="all" rel="stylesheet" type="text/css" />
        <link href='https://fonts.googleapis.com/css?family=Maven+Pro:400,500,700,900' rel='stylesheet' type='text/css'>
        <link href="{!! asset('css/admin/admin.css') !!}" media="all" rel="stylesheet" type="text/css" />
        
        
    </head>
    <body>
        <div class="container-fluid">
            <div class="logo-wrapper">
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
         width="841.89px" height="595.28px" viewBox="0 0 841.89 595.28" enable-background="new 0 0 841.89 595.28" xml:space="preserve">

                <g id="Layer_2">
                    <polygon fill="#902C33" points="151,509.28 390,108.28 493,283.28 367,509.28     "/>
                    <polygon fill="#902C33" points="431,509.28 630.5,509.28 527,342.78  "/>
                    <polygon fill="#902C33" points="527,342.78 662.745,108.28 601,108.28 493,283.28     "/>
                </g>
                </svg>
            </div>
            <div class="login">
                <form class="form-signin" method="post">
                    {{ csrf_field() }}
                    <span id="reauth-email" class="reauth-email"></span>
                    <label for="email">E-mail</label>
                    <input name="email" type="email" class="form-control" placeholder="Email address" value="{{ old('email') }}" required autofocus>
                    <label for="email">Palavra-passe</label>
                    <input name="password" type="password" class="form-control" placeholder="Password" required>
                    <!-- <div id="remember" class="checkbox">
                        <label>
                            <input type="checkbox" value="remember-me"> Remember me
                        </label>
                    </div> -->
                    <button class="form-button" type="submit">Entrar</button>
                </form><!-- /form -->
                <!-- <a href="#" class="forgot-password">
                    Forgot the password?
                </a> -->
            </div><!-- /card-container -->
        </div>

        <script type="text/javascript" src="{!! asset('js/jquery-2.js') !!}"></script>
        <script   src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"   integrity="sha256-xNjb53/rY+WmG+4L6tTl9m6PpqknWZvRt0rO1SRnJzw="   crossorigin="anonymous"></script>
        <script type="text/javascript" src="{!! asset('js/bootstrap.min.js') !!}"></script>
        <script type="text/javascript" src="{!! asset('js/admin.js') !!}"></script>
    </body>
</html>