<!-- app/views/users/show.blade.php -->

@extends('...layout.main')

@section('nav')
    @include('partials.nav')
@include('users.partials.nav')

@stop

@section('content')

<h1>{{ $user->name }}</h1>

    <div class="text-left">
        <h2>{{ $user->username }}</h2>

        <p>{{ $user->email }}</p>


    </div>
    <a href="/users" class="btn btn-xs btn-default"><i class="fa fa-arrow-left" style="color:#999;"></i> Back</a>
</div>

@stop
