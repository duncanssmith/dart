<!-- app/views/texts/edit.blade.php -->

@extends('...layout.main')

@section('nav')

    @include('partials.nav')

    @include('partials.subnav')

@stop

@section('content')

<h1>Edit {{ $text->name }}</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::model($text, array('route' => array('texts.update', $text->id), 'method' => 'PUT')) }}

    <div class="form-text">
        {{ Form::label('title', 'Title') }}
        {{ Form::text('title', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-text">
        {{ Form::label('author', 'Author') }}
        {{ Form::text('author', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-text">
        {{ Form::label('content', 'Content') }}
        {{ Form::textarea('content', null, array('class' => 'form-control ckeditor')) }}
    </div>

    <div class="form-text">
        {{ Form::label('description', 'Description') }}
        {{ Form::text('description', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-text">
        {{ Form::label('year', 'Year') }}
        {{ Form::text('year', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-text">
        {{ Form::label('publication', 'Publication') }}
        {{ Form::text('publication', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-text">
        {{ Form::label('publication_date', 'Publication date') }}
        {{ Form::text('publication_date', null, array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Save', array('class' => 'btn btn-primary')) }}

    <a href="/texts" class="btn btn-xs btn-default">Cancel</a>
{{ Form::close() }}

@stop
