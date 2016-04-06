<!-- app/views/navigations/index.blade.php -->

@extends('...layout.main')

@section('nav')

    @include('partials.nav')

    @include('partials.subnav')

@stop

@section('content')

<h1>Add navigation</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url' => 'navigations')) }}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('alias', 'Alias') }}
        {{ Form::text('alias', Input::old('alias'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('url', 'URL') }}
        {{ Form::text('url', Input::old('url'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('level', 'Level') }}
        {{ Form::text('level', Input::old('level'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('layout', 'Layout') }}
        {{ Form::text('layout', Input::old('layout'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('order', 'Order') }}
        {{ Form::text('order', Input::old('order'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('display', 'Display?') }}
        {{ Form::checkbox('display', Input::old('display'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('secure', 'Secure?') }}
        {{ Form::checkbox('secure', Input::old('secure'), array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Save', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>

@stop
