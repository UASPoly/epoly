<!DOCTYPE HTML>
<html>
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <!-- style -->
    <link rel="shortcut icon" href="img/favicon.png">
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('css/select2.css')}}">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('tuner/css/colorpicker.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('tuner/css/styles.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/jquery.fancybox.css')}}" />
    <link rel="stylesheet" href="{{asset('css/owl.carousel.css')}}">
    <!--styles -->
</head>
<body style="background-color: #DCF9FA">
    <main>
    	@yield('page-content')
    </main>
    <!-- footer -->
    <!-- scripts -->
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script type='text/javascript' src="{{asset('js/jquery.validate.min.js')}}"></script>
    <script src="{{asset('js/jquery.form.min.js')}}"></script>
    <script src="{{asset('js/TweenMax.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
    <script src="{{asset('js/select2.js')}}"></script>
    <script src="{{asset('js/jquery.isotope.min.js')}}"></script>
    
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('js/jflickrfeed.min.js')}}"></script>
    <script src="{{asset('js/jquery.tweet.js')}}"></script>
    <script type='text/javascript' src="{{asset('tuner/js/colorpicker.js')}}"></script>
    <script type='text/javascript' src="{{asset('tuner/js/scripts.js')}}"></script>
    <script src="{{asset('js/jquery.fancybox.pack.js')}}"></script>
    <script src="{{asset('js/jquery.fancybox-media.js')}}"></script>
    <script src="{{asset('js/retina.min.js')}}"></script>
    <!-- scripts -->
</body>
</html>