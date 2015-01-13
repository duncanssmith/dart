<!-- app/views/texts/edit.blade.php -->

@extends('...layout.main')

@section('nav')

    @include('partials.nav')

    @include('partials.subnav')

@stop

@section('content')

<h1>{{ $text->title }}</h1>
<p>Select the groups you want this text to appear in.</p>
<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::model($text, array('route' => array('save_assigned_text'), 'method' => 'POST')) }}

    {{ Form::hidden('text_id', $text->id) }}

        <div class="form-group">
            @foreach ($groups as $group)
                {{ Form::checkbox('groups_data[]', $group->id, in_array($group->id, $arr)) }}
                {{ Form::label('name', $group->name) }}
                <br>
            @endforeach
        </div>

    {{ Form::submit('Save', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

<br>

@if (sizeof($links) > 0)

    Text "{{ $text->title }}" is in groups:

@else

    This text is not in any groups

@endif

<br>

@foreach ($links as $link)

    {{ $link->name }}
    ({{ $link->id  }})

@endforeach

</div>

@stop
