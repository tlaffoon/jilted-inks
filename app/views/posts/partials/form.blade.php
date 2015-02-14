<div class="form-group {{{ $errors->has('title') ? 'has-error' : '' }}}">
    {{ Form::label('title', 'Post Title') }}
    {{ Form::text('title', Input::old('title'), array('class' => 'form-control')) }}
    {{ $errors->first('title', '<p class="help-block">:message</p>') }}
</div>

<div class="form-group {{{ $errors->has('slug') ? 'has-error' : '' }}}">
    {{ Form::label('slug', 'Slug') }}
    {{ Form::text('slug', Input::old('slug'), array('class' => 'form-control')) }}
    {{ $errors->first('slug', '<p class="help-block">:message</p>') }}
</div>

<div class="form-group {{{ $errors->has('body') ? 'has-error' : '' }}}">
    {{ Form::label('body', 'Post Body') }}
    {{ Form::textarea('body', Input::old('body'), array('class' => 'form-control', 'rows' => '4')) }}
    {{ $errors->first('body', '<p class="help-block">:message</p>') }}
</div>

<div class="form-group">
    {{ Form::label('tags', 'Tags') }}
    {{ Form::text('tags', Input::old('tags'), array('class' => 'form-control'))}}
</div>

<!--    <div class="form-group {{ $errors->has('tag_list') ? 'has-error' : '' }}">
          {{-- {{ Form::label('tag_list', 'Tags') }}
          {{ Form::text('tag_list', null, array('class' => 'form-control', 'id' => 'txtTags')) }}
          {{ $errors->first('tag_list', '<span class="help-block">:message</span>') }} --}}
        </div> -->

<div class="form-group {{{ $errors->has('image') ? 'has-error' : '' }}}">
    {{ Form::label('image', 'Image') }}
    {{ Form::file('image', array('class' => 'form-group')) }}
    {{ $errors->first('image', '<span class="help-block"><p class="text-warning">:message</p></span><br>') }}
</div>
