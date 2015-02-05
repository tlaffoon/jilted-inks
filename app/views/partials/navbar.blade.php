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
            <a class="navbar-brand" href="{{{ action('PostsController@index') }}}">Everglades Blog</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="{{{ action('HomeController@showResume') }}}">Resume</a></li>
                <li><a href="{{{ action('HomeController@showPortfolio') }}}">Portfolio</a></li>
                @if (Auth::guest())
                    <li><a href="{{{ action('HomeController@showLogin') }}}">Log In</a></li>
                @else
                    <li><a href="{{{ action('PostsController@create') }}}">Create Post</a></li>
                    <li><a href="{{{ action('HomeController@doLogout') }}}">Log Out</a></li>
                @endif
            </ul>
            <form class="navbar-form navbar-right" role="search" action="{{{ action('PostsController@index') }}}">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search Blog..." name="search">
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-default">Search</button>
                    </span>
                </div>
            </form>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
