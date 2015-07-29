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
        <br/>
		<p>
			{{ $work->media }}<br>
			{{ $work->dimensions }}<br>
			{{ $work->work_date }}<br>
			{{ $work->description }}<br>
			{{ $work->notes }}
                </p>
		<a href="/page/{{ $_GET['group'] }}" class="btn btn-sm btn-default"><i class="fa fa-arrow-left" style="color:#999;"></i> {{ $group->name }}</a>
	</div>

@stop
