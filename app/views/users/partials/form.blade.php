
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

<!-- Email -->
<div class="form-group {{{ $errors->has('email') ? 'has-error' : '' }}}">
    {{ Form::label('email', 'email') }}
    {{ Form::text('email', Input::old('email'), array('class' => 'form-control')) }}
    {{ $errors->first('email', '<p class="help-block">:message</p>') }}
</div>

<!-- Password -->
<div class="form-group {{{ $errors->has('password') ? 'has-error' : '' }}}">
    {{ Form::label('password', 'Password') }}
    {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password')) }}
    {{ $errors->first('password', '<span class="help-block"><p class="text-warning">:message</p></span><br>') }}
</div>

<!-- Password Confirm -->
<div class="form-group {{{ $errors->has('password') ? 'has-error' : '' }}}">
    {{ Form::label('password_confirmation', 'Confirm Password') }}
    {{ Form::password('password_confirmation', array('class' => 'form-control', 'placeholder' => 'Confirm Password')) }}
    {{ $errors->first('password_confirmation', '<span class="help-block"><p class="text-warning">:message</p></span><br>') }}
</div>


