<!-- app/views/covers/edit.blade.php -->

@extends('...layout.main')

@section('nav')

    @include('partials.nav')

    @include('partials.subnav')

@stop

@section('content')

<h1>Edit "{{ $cover->title }}"</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::model($cover, array('route' => array('covers.update', $cover->id), 'files' => true, 'method' => 'PUT')) }}

    <img src="/media/images/covers/{{$cover->reference}}.jpg" width="800px">

	<div class="form-group">
		{{ Form::label('image', 'Image') }}
		{{ Form::file('image', ['class' => 'btn btn-warning']) }}
	</div>

	<div class="form-group">
		{{ Form::label('title', 'Title') }}
		{{ Form::text('title', null, array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('media', 'Media') }}
		{{ Form::text('media', null, array('class' => 'form-control')) }}
	</div>
	<div class="form-group">
		{{ Form::label('dimensions', 'Dimensions') }}
		{{ Form::text('dimensions', null, array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('cover_date', 'Cover date') }}
		{{ Form::text('cover_date', null, array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('description', 'Description') }}
		{{ Form::text('description', null, array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('notes', 'Notes') }}
		{{ Form::text('notes', null, array('class' => 'form-control')) }}
	</div>

	{{ Form::submit('Save', array('class' => 'btn btn-primary')) }}

	<a href="/covers" class="btn btn-default">Cancel</a>

{{ Form::close() }}
</div>

@stop
