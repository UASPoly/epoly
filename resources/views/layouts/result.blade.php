<!DOCTYPE HTML>
<html>
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <!-- style -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!--styles -->
    <style>
    	body {
    		background-color : white;
    	}
    </style>
</head>
<body class="" >
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                @yield('page-content')
            </div>
        </div>
    </div>
	
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>