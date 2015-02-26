<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Considerate Coder</title>

    <!-- Bootstrap Core CSS -->
    <link href="/includes/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/includes/css/blog-home.css" rel="stylesheet">

    <!-- Include Font Awesome -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

    @yield('css')

    <!-- jQuery -->
    <script src="/includes/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/includes/js/bootstrap.min.js"></script>

    @yield('topscript')

</head>

<body>

    <!-- Navigation -->
    @include('layouts.partials.navbar')

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Flash Messages -->
            <div class="col-md-10 col-md-offset-1">
                
                @if (Session::has('successMessage'))
                    <div class="alert alert-success alert-dismissable">
                       <button type="button" class="close" data-dismiss="alert" 
                          aria-hidden="true">
                          &times;
                       </button>
                       {{{ Session::get('successMessage') }}}
                    </div>
                @endif

                @if (Session::has('errorMessage'))
                    <div class="alert alert-warning alert-dismissable">
                       <button type="button" class="close" data-dismiss="alert" 
                          aria-hidden="true">
                          &times;
                       </button>
                       {{{ Session::get('errorMessage') }}}
                    </div>
                @endif
            
                @yield('content')

            </div>

        </div>

        <!-- Include login modal -->
        @include('layouts.partials.login')

        <!-- Footer -->
        @include('layouts.partials.footer')

    </div>
    <!-- /.container -->

    @yield('bottomscript')

</body>

</html>
