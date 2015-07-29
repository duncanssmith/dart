<!-- app/views/works/index.blade.php -->

@extends('...layout.main')

@section('nav')

    @include('partials.nav')
    <br>

@stop

@section('content')

    <h1>Sort {{ $group->name }} works </h1>
    <p>Click and drag items below to arrange in the desired order</p>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered group" data-groupid="{{ $group->id}}">
    <thead>
        <tr>
            <td>Image</td>
            <td>Title</td>
            <td>Media</td>
            <td>Dimensions</td>
            <td>Date</td>
            <td>Description</td>
        </tr>
    </thead>
    <tbody id="sortable" class="sortable">
    @foreach($works as $work)
        <tr class="ui-state-default" data-id="{{ $work->id }}">

            <td><a href="{{ URL::to('works/' . $work->id) }}"><img src="/media/images/64/{{ $work->reference }}.jpg"></a></td>
            <td>{{ $work->title }}</td>
            <td>{{ $work->media }}</td>
            <td>{{ $work->dimensions }}</td>
            <td>{{ $work->work_date }}</td>
            <td>{{ $work->description }}</td>

        </tr>
    @endforeach
    </tbody>
</table>

    <a href="/pages" class="btn btn-xs btn-default"><i class="fa fa-arrow-left" style="color:#999;"></i> Back</a>
</div>

@stop
