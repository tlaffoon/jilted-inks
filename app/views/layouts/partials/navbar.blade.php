<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{{ action('PostsController@index') }}}">
                Blog
            </a>
        </div>
        
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            
            <ul class="nav navbar-nav navbar-left">
                <li><a href="/resume">Resume</a></li>
                <li><a href="/portfolio">Portfolio</a></li>
                <li><a href="/contact">Contact</a></li>
            </ul>

            <!-- Navbar Search Form -->
            <form class="navbar-form navbar-right" role="search" action="{{{ action('PostsController@index') }}}">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search..." name="search">
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </span>
                </div>
            </form>

            <!-- Login/Logout -->
            <ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())
                    <li>
                        <button type="button" class="btn btn-default navbar-btn" data-toggle="modal" data-target="#loginModal">Log In</button>
                    </li>
                @else
                    <li><a href="{{{ action('PostsController@create') }}}">Create Post</a></li>
                    <li><a href="{{{ action('PostsController@showDashboard') }}}">Manage Posts</a></li>
                    <li><a href="{{{ action('HomeController@doLogout') }}}">Log Out</a></li>
                @endif
            </ul>

        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>