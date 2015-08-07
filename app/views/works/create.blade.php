<!-- app/views/works/create.blade.php -->

@extends('...layout.main')

@section('nav')

    @include('partials.nav')

    @include('partials.subnav')

@stop

@section('content')

<h1>Add work</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url' => 'works', 'files' => true)) }}



    <div class="form-group">
        {{ Form::label('image', 'Image') }}
        {{ Form::file('image', ['class' => 'btn btn-default']) }}
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
        {{ Form::label('work_date', 'Work date') }}
        {{ Form::text('work_date', Input::old('work_date'), array('class' => 'form-control')) }}
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
    <a href="/works" class="btn btn-xs btn-default">Cancel</a>
{{ Form::close() }}

</div>


@stop
