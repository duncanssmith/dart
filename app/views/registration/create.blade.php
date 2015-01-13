@extends('layout.main')

@section('content')

<div class="starter-content">

<h1>Register</h1>

{{ Form::open(['route' => 'registration.store']) }}

	<div class="form-group">
		{{ Form::label('username', 'Username:') }}
		{{ Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'Username', 'required' => 'required']) }}
		{{ errors_for('username', $errors) }}
	</div>

	<div class="form-group">
		{{ Form::label('email', 'Email:') }}
		{{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email', 'required' => 'required']) }}
		{{ errors_for('email', $errors) }}
	</div>

	<div class="form-group">
    	{{ Form::label('password', 'Password:') }}
    	{{ Form::password('password',  ['class' => 'form-control', 'placeholder' => 'Password', 'required' => 'required']) }}
    	{{ errors_for('password', $errors) }}
    </div>

  	<div class="form-group">
        {{ Form::label('password_confirmation', 'Password:') }}
        {{ Form::password('password_confirmation',  ['class' => 'form-control', 'placeholder' => 'Password confirmation']) }}
        {{ errors_for('password_confirmation', $errors) }}
    </div>

    {{ Form::submit('Create account', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>

@stop
