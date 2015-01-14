<!-- app/views/works/edit.blade.php -->

@extends('...layout.main')

@section('nav')

    @include('partials.nav')

    @include('partials.subnav')
    
@stop

@section('content')

<h1>{{ $work->title }}, {{ $work->work_date }}</h1>
<p>Select the pages you want this work to appear on.</p>
<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::model($work, array('route' => array('save_assigned_work'), 'method' => 'POST')) }}

    {{ Form::hidden('work_id', $work->id) }}

    <img src="/media/images/64/{{$work->reference}}.jpg">

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

    Work "{{ $work->title }}" will appear on pages:

@else

    This work is not on any page.

@endif

<br>

@foreach ($links as $link)

    {{ $link->name }}
    ({{ $link->id  }})

@endforeach

</div>

@stop
