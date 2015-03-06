<div class="form-group {{{ $errors->has('title') ? 'has-error' : '' }}}">
    {{ Form::label('title', 'Title') }}
    {{ Form::text('title', Input::old('title'), array('class' => 'form-control')) }}
    {{ $errors->first('title', '<p class="help-block">:message</p>') }}
</div>

<div class="form-group {{{ $errors->has('slug') ? 'has-error' : '' }}}">
    {{ Form::label('slug', 'Slug') }}
    {{ Form::text('slug', Input::old('slug'), array('class' => 'form-control')) }}
    {{ $errors->first('slug', '<p class="help-block">:message</p>') }}
</div>

<div class="form-group {{{ $errors->has('description') ? 'has-error' : '' }}}">
    <div id="characterLeft" class="pull-right"></div>
    {{ Form::label('description', 'Description') }}
    {{ Form::textarea('description', Input::old('description'), array('rows' => '5', 'class' => 'form-control', 'maxlength' => '400')) }}
    {{ $errors->first('description', '<span class="help-block"><p class="text-warning">:message</p></span><br>')}}
</div>

<div>
    {{-- Display post series information if applicable --}}
    @if(isset($post) && $post->series != '')
        <a href="{{{ action('SeriesController@edit', $post->series->id) }}}" class="btn btn-default btn-xs pull-right"> <i class="fa fa-edit"></i></a>
        <p> Number #{{{ $post->order }}} "<a href="{{{ action('SeriesController@show', $post->series->id) }}}">{{ $post->series->name }}</a>" series.</p>   
    @else
        {{ Form::label('series', 'Assign to post series?') }} <span class="pull-right"><a href="{{{ action('SeriesController@create') }}}">Create A New Series</a></span>
        {{ Form::select('series', array('default' => Input::old('series')) + $series, 'default', array('class' => 'form-group form-control')) }}
    @endif
</div>

<div class="form-group {{{ $errors->has('body') ? 'has-error' : '' }}}">
    {{ Form::label('body', 'Body') }}
    {{ Form::textarea('body', Input::old('body'), array('id' => 'wysiwyg', 'class' => '')) }}
    {{ $errors->first('body', '<span class="help-block"><p class="text-warning">:message</p></span><br>') }}
</div>

<div class="form-group {{ $errors->has('tag_list') ? 'has-error' : '' }}">
    {{ Form::label('tag_list', 'Tags') }}
    {{ Form::text('tag_list', null, array('class' => 'form-group form-control', 'id' => 'txtTags')) }}
    {{ $errors->first('tag_list', '<span class="help-block">:message</span>') }}
</div>

<div class="form-group">
    {{ Form::label('image', 'Image') }}
    {{ Form::file('image', array('class' => '')) }}
</div>