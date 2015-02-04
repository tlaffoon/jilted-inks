<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Laravel Blog</title>

    <!-- Bootstrap Core CSS -->
    <link href="/includes/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/includes/css/blog-home.css" rel="stylesheet">

    @yield('topscript')

</head>

<body>

    <!-- Navigation -->
    @include('partials.navbar')

    <div class="container">
        <div class="row">

        </div>
    </div>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Flash Messages -->
            <div class="col-md-8 col-md-offset-2">
                
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

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12 text-right">
                    <p>Copyright &copy; Codeup 2015</p>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="/includes/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/includes/js/bootstrap.min.js"></script>

    @yield('bottomscript')

</body>

</html>
