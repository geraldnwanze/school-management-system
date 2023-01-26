<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>{{ config('app.name') }}</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <link href="{{asset('dashboard/css/style.css')}}" rel="stylesheet">

</head>

<body class="h-100">
    <x-alert/>
    @yield('content')

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{asset('dashboard/vendor/global/global.min.js')}}"></script>
    <script src="{{asset('dashboard/js/quixnav-init.js')}}"></script>
    <!--endRemoveIf(production)-->
</body>

</html>