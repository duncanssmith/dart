@extends('...layout.main')

@section('nav')

    @include('...partials.nav')

@stop

@section('content')

    <h1>Reset your password</h1>

    {{ Form::open(['class' => 'well']) }}

        <div class="form-group">
            {{ Form::label('email', 'Email address:') }}
            {{ Form::email('email', null, array('class' => 'form-control')) }}
        </div>

        <div>
            {{ Form::submit('Reset', array('class' => 'btn btn-success')) }}
        </div>

    {{ Form::close() }}

    @if (Session::has('error'))

        <p style="color:red;">{{ Session::get('error') }}</p>

    @elseif (Session::has('status'))

        <p>{{ Session::get('status') }}</p>

    @endif
@stop
