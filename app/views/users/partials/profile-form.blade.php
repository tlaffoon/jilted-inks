<!-- UserName -->
<div class="form-group {{{ $errors->has('username') ? 'has-error' : '' }}}">
    {{ Form::label('username', 'username') }}
    {{ Form::text('username', Input::old('username'), array('class' => 'form-control')) }}
    {{ $errors->first('username', '<p class="help-block">:message</p>') }}
</div>

<!-- Name -->
<div class="form-group {{{ $errors->has('name') ? 'has-error' : '' }}}">
    {{ Form::label('name', 'name') }}
    {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
    {{ $errors->first('name', '<p class="help-block">:message</p>') }}
</div>

<!-- Bio -->
<div class="form-group {{{ $errors->has('bio') ? 'has-error' : '' }}}">
    {{ Form::label('bio', 'Bio') }}
    {{ Form::textarea('bio', Input::old('bio'), array('class' => 'form-control', 'rows' => '4')) }}
    {{ $errors->first('bio', '<p class="help-block">:message</p>') }}
</div>

<!-- Image Upload -->
<div class="form-group {{{ $errors->has('image') ? 'has-error' : '' }}}">
    {{ Form::label('image', 'Image') }}
    {{ Form::file('image', array('class' => 'form-group')) }}
    {{ $errors->first('image', '<span class="help-block"><p class="text-warning">:message</p></span><br>') }}
</div>