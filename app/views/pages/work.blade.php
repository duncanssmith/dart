<!-- app/views/works/show.blade.php -->

@extends('...layout.main')

@section('nav')

    @include('partials.nav')

@stop

@section('content')

<h1>{{ $work->name }}</h1>

	<div class="text-left">
		<h2>{{ $work->title }}</h2>
		<a href=""><img src="/media/images/640/{{$work->reference}}.jpg"></a>
		<p>
			{{ $work->media }}<br>
			{{ $work->dimensions }}<br>
			{{ $work->work_date }}<br>
			{{ $work->description }}<br>
			{{ $work->notes }}
		</p>
		@if (!empty($_GET['group']))
		    <a href="/page/{{ $_GET['group'] }}" class="work-caption-link">Back to {{ $group->name }}</a>
		@endif
	</div>

@stop
