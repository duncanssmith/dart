<!-- app/views/users/edit.blade.php -->

@extends('...layout.main')

@section('nav')
    @include('partials.nav')
@include('users.partials.nav')

@stop

@section('content')

<h1>Edit {{ $user->name }}</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::model($user, array('route' => array('users.update', $user->id), 'method' => 'PUT')) }}

	<div class="form-user">
		{{ Form::label('username', 'Username') }}
		{{ Form::text('username', null, array('class' => 'form-control')) }}
	</div>

	<div class="form-user">
		{{ Form::label('email', 'Email') }}
		{{ Form::email('email', null, array('class' => 'form-control')) }}
	</div>

	{{ Form::submit('Save', array('class' => 'btn btn-primary')) }}
	<a href="/users" class="btn btn-xs btn-default">Cancel</a>

{{ Form::close() }}
</div>

@stop
