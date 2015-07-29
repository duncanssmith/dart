<!-- app/views/works/show.blade.php -->

@extends('...layout.main')

@section('nav')

    @include('partials.nav')

    @include('partials.subnav')

@stop

@section('content')

    <div class="text-left">
        <h2><strong>Title:</strong> {{ $work->title }}</h2>

        <img src="/media/images/320/{{$work->reference}}.jpg">
        <p>
            <strong>Reference:</strong> {{ $work->reference }}<br>
            <strong>Media:</strong> {{ $work->media }}<br>
            <strong>Dimensions:</strong> {{ $work->dimensions }}<br>
            <strong>Work date:</strong> {{ $work->work_date }}<br>
            <strong>Description:</strong> {{ $work->description }}<br>
            <strong>Notes:</strong> {{ $work->notes }}</p>
        </p>
    <a href="/works" class="btn btn-xs btn-default"><i class="fa fa-arrow-left" style="color:#999;"></i> Back</a>
    </div>

@stop
