<!-- app/views/texts/create.blade.php -->

@extends('...layout.main')

@section('nav')

    @include('partials.nav')

    @include('partials.subnav')

@stop

@section('content')

<h1>Add text</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url' => 'texts')) }}

    <div class="form-text">
        {{ Form::label('title', 'Title') }}
        {{ Form::text('title', Input::old('title'), array('class' => 'form-control')) }}
    </div>

    <div class="form-text">
        {{ Form::label('author', 'Author') }}
        {{ Form::text('author', Input::old('author'), array('class' => 'form-control')) }}
    </div>    

    <div class="form-text">
        {{ Form::label('description', 'Description') }}
        {{ Form::text('description', Input::old('description'), array('class' => 'form-control')) }}
    </div>    

    <div class="form-text">
        {{ Form::label('year', 'Year') }}
        {{ Form::text('year', Input::old('year'), array('class' => 'form-control')) }}
    </div>    

    <div class="form-text">
        {{ Form::label('publication', 'Publication') }}
        {{ Form::text('publication', Input::old('publication'), array('class' => 'form-control')) }}
    </div>    

    <div class="form-text">
        {{ Form::label('publication_date', 'Publication date') }}
        {{ Form::text('publication_date', Input::old('publication_date'), array('class' => 'form-control')) }}
    </div>    

    <div class="form-text">
        {{ Form::label('content', 'Content') }}
        {{ Form::text('content', Input::old('content'), array('class' => 'form-control')) }}
    </div>   

    {{ Form::submit('Save', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>

@stop
