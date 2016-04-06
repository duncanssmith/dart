<!-- app/views/covers/create.blade.php -->

@extends('...layout.main')

@section('nav')

    @include('partials.nav')

    @include('partials.subnav')

@stop

@section('content')

<h1>Add a new cover</h1>
<br>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url' => 'covers', 'files' => true)) }}

    <div class="form-group">
        {{ Form::label('image', 'Select JPG image to upload') }}
        {{ Form::file('image', ['class' => 'btn btn-warning']) }}
        Note: max file size 4MB
    </div>

    <div class="form-group">
        {{ Form::label('title', 'Title') }}
        {{ Form::text('title', Input::old('title'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('media', 'Media') }}
        {{ Form::text('media', Input::old('media'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('dimensions', 'Dimensions') }}
        {{ Form::text('dimensions', Input::old('dimensions'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('cover_date', 'Cover date') }}
        {{ Form::text('cover_date', Input::old('cover_date'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('description', 'Description') }}
        {{ Form::text('description', Input::old('description'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('notes', 'Notes') }}
        {{ Form::text('notes', Input::old('notes'), array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Save', array('class' => 'btn btn-primary')) }}
    <a href="/covers" class="btn btn-default">Cancel</a>
{{ Form::close() }}

</div>


@stop
