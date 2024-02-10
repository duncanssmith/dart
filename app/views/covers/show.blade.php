<!-- app/views/covers/show.blade.php -->

@extends('...layout.main')

@section('nav')

    @include('partials.nav')

    @include('partials.subnav')

@stop

@section('content')

    <div class="text-left">
        <h2>{{ $cover->title }}</h2>

        <img src="/media/images/covers/{{$cover->reference}}.jpg" width="800px">
        <br>
        <br>
        <table class="work-data work-data-1">
            <tr>
                <th> Title </th>
                <td> {{ $cover->title }} </td>
            </tr>
            <tr>
                <th> Reference </th>
                <td> {{ $cover->reference }} </td>
            </tr>
            <tr>
                <th> Media </th>
                <td> {{ $cover->media }} </td>
            </tr>
            <tr>
                <th> Dimensions </th>
                <td> {{ $cover->dimensions }} </td>
            </tr>
            <tr>
                <th> Date </th>
                <td> {{ $cover->cover_date }} </td>
            </tr>
            <tr>
                <th> Description </th>
                <td> {{ $cover->description }} </td>
            </tr>
            <tr>
                <th> Notes </th>
                <td> {{ $cover->notes }} </td>
            </tr>
            <tr>
                <th> Current? </th>
                <td> {{ $cover->is_current }} </td>
            </tr>
        </table>
        </p>
    <a href="/covers" class="btn btn-default"><i class="fa fa-arrow-left" style="color:#999;"></i> Back</a>
    </div>

@stop
