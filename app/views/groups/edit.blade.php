<!-- app/views/groups/edit.blade.php -->

@extends('...layout.main')

@section('nav')

    @include('partials.nav')

    @include('partials.subnav')

@stop

@section('content')

<h1>Edit {{ $group->name }}</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::model($group, array('route' => array('pages.update', $group->id), 'method' => 'PUT')) }}

	<div class="form-group">
		{{ Form::label('name', 'Name') }}
		{{ Form::text('name', null, array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('order', 'Order') }}
		{{ Form::text('order', null, array('class' => 'form-control')) }}
	</div>	

	{{ Form::submit('Save', array('class' => 'btn btn-primary')) }}
	<a href="/pages" class="btn btn-sm btn-default">Cancel</a>

{{ Form::close() }}

</div>



@stop
