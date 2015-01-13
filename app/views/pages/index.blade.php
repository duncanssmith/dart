<!-- app/views/pages/index.blade.php -->

@extends('layout.main')

@section('nav')

    @include('partials.nav')

    {{ Auth::check() ?  Auth::user()->username : "" }}

@stop

@section('content')

<div class="starter-content">

<h1>
</h1>

<p class="lead"></p>
</div>

@stop
