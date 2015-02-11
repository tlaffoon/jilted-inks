    <form class="form" role="search" action="{{{ action('PostsController@index') }}}">
        <div class="input-group">
            <input type="text" class="form-group form-control" placeholder="Search..." name="search">
            <span class="input-group-btn">
                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
            </span>
        </div>
    </form>