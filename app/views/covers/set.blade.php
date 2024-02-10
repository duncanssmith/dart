<!-- app/views/covers/set.blade.php -->

@extends('...layout.main')

@section('nav')

    @include('partials.nav')

    @include('partials.subnav')

@stop

@section('content')

<h1>Set "{{ $cover->title }}" as the cover image?</h1>
<br>
<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::model($cover, array('route' => array('save_set_cover'), 'method' => 'POST')) }}

    {{ Form::hidden('cover_id', $cover->id) }}

    <img src="/media/images/covers/{{ $cover->reference }}.jpg" width="600px">
    <br>
    <br>
	{{ Form::submit('Confirm', array('class' => 'btn btn-primary')) }}

    <a href="/covers" class="btn btn-default">Cancel</a>

{{ Form::close() }}

@stop
