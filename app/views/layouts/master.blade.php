<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>My Laravel Blog</title>
    
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
    
    @yield('top-script')
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @yield('content')
            </div>
        </div>
    </div>
    
    <script type="text/javascript" src="/js/jquery-2.1.3.min.js"></script>
    <script type="text/javascript" src="/bootstrap/js/bootstrap.min.js"></script>
    
    @yield('bottom-script')
</body>
</html>
