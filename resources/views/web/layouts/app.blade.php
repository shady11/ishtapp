<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" >
    <head>
        <meta charset="utf-8">
        <script src='https://www.google.com/recaptcha/api.js?render=6Le_GfgUAAAAAA06dIw9LTSzxPpoqBSiaM-MfmIS'></script>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{asset('favicon.ico')}}" rel="shortcut icon">
        <title>@yield('title')</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="https://fonts.googleapis.com/css?family=Fira+Sans:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap&subset=greek-ext" rel="stylesheet">
        <link href="{{ asset('/css/main.css') }}" rel="stylesheet">
        <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
        @yield('styles')
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-167277165-1"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-167277165-1');
        </script>
    </head>
    <body>
        @include('web.layouts.header')
        @yield('breadcrumbs')
        @yield('content')
        @include('web.layouts.footer')
        <script src="{{ asset('js/app.js') }}"></script>
        @yield('scripts')
    </body>
    <script>
        grecaptcha.ready(function () {
            grecaptcha.execute('6LcgPdAUAAAAAIv4FhwBJ5cDrVjjeHTE23OXpAGW', {action: 'action_name'})
                .then(function (token) {
                    // Verify the token on the server.
                });
        });
    </script>
</html>
