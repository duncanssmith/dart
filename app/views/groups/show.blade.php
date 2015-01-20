<!-- app/views/groups/show.blade.php -->

@extends('...layout.main')

@section('nav')

    @include('partials.nav')

    @include('partials.subnav')

@stop

@section('content')


    <div class="text-left">
        <h1>Page name: {{ $group->name }}</h1>
        <p> <strong>Order:</strong> {{ $group->order }} of {{ $group->count() }} </p>
        <p> <strong>Columns:</strong> {{ $group->columns }}</p>
        <p> <strong>Image size:</strong> {{ $group->image_size }} </p>
        <p> <strong>Layout:</strong> {{ $group->layout }} </p>
    </div>

    <a href="/pages" class="btn btn-sm btn-default"><i class="fa fa-arrow-left" style="color:#999;"></i> Back</a>
</div>



@stop
