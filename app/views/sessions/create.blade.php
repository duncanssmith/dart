@extends('layout.main')

@section('nav')

    @include('partials.nav')

@stop

@section('content')

    <h1>Log in</h1>

    {{ Form::open(['route' => 'sessions.store', 'class' => 'well']) }}

	<div class="form-group">
		{{ Form::label('username', 'Username:') }}
		{{ Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'Username']) }}
		{{ errors_for('username', $errors) }}
	</div>

	<div class="form-group">
		{{ Form::label('password', 'Password:') }}
		{{ Form::password('password',  ['class' => 'form-control', 'placeholder' => 'Password']) }}
		{{ errors_for('password', $errors) }}
	</div>

	    {{ Form::submit('Log in', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

    {{--<a href="/password/remind">Forgot password?</a>--}}


    @if (Session::has('flash_message'))
    <div class="form-group">
        <p>{{ Session::get('flash_message') }}</p>

    </div>
    @endif
@stop
