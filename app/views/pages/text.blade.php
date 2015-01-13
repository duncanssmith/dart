<!-- app/views/texts/show.blade.php -->

@extends('...layout.main')

@section('nav')

@stop

@section('content')

<h1>{{ $text->title }}</h1>

	<div class="text-left">
		<h2>{{ $text->title }}</h2>
		<a href=""><img src="/media/images/320/sh_{{$text->reference}}.jpg"></a>
		<p>
			Author: {{ $text->author }}<br>
			Year: {{ $text->year }}<br>
			Content: {{ $text->content }}
		</p>
	</div>

@stop
