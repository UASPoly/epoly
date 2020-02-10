<!DOCTYPE HTML> 
<html>
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <!-- style -->
    <script language="javascript">
        function printdiv(printpage) {
            var headstr = "<html><head><title></title></head><body>";
            var footstr = "</body>";
            var newstr = document.all.item(printpage).innerHTML;
            var oldstr = document.body.innerHTML;
            document.body.innerHTML = headstr + newstr + footstr;
            window.print();
            document.body.innerHTML = oldstr;
            return false;
        }
    </script>
    <link rel="stylesheet" href="{{ asset('css/pageLoader.css')}}">
    <link rel="shortcut icon" href="{{asset('img/favicon.png')}}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.css')}}">
    <link rel="stylesheet" href="{{ asset('fi/flaticon.css')}}">
    
    <link rel="stylesheet" type="text/css" href="{{ asset('tuner/css/colorpicker.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('tuner/css/styles.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.fancybox.css')}}" />
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('rs-plugin/css/settings.css')}}" media="screen">
    <link rel="stylesheet" href="{{ asset('css/animate.css')}}">
    <!--styles -->
    @auth
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
    @endauth
    <link rel="stylesheet" href="{{ asset('css/main.css')}}">
    <!-- Scripts -->
    <script type="text/javascript" src="{{ asset('js/vue.js') }}"></script>

    @yield('header')
</head>
<body style="background-color: #DCF9FA">