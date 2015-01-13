@extends('...layout.main')

@section('nav')

    @include('partials.nav')

@stop

@section('content')

    <h1>Set your new password</h1>

    {{ Form::open() }}

        <input type="hidden" name="token" value="{{ $token }}">

        <div>
            {{ Form::label('email', 'Email address:') }}
            {{ Form::email('email') }}
        </div>

        <div class="form-group">
            {{ Form::label('password', 'Password:') }}
            {{ Form::password('password',  ['class' => 'form-control', 'placeholder' => 'Password', 'required' => 'required']) }}
            {{ errors_for('password', $errors) }}
        </div>

        <div class="form-group">
            {{ Form::label('password_confirmation', 'Password:') }}
            {{ Form::password('password_confirmation',  ['class' => 'form-control', 'placeholder' => 'Password confirmation']) }}
            {{ errors_for('password_confirmation', $errors) }}
        </div>


        <div>
            {{ Form::submit('Reset') }}
        </div>

    {{ Form::close() }}

    @if (Session::has('error'))

        <p style="color:red;">{{ Session::get('error') }}</p>

    @endif

@stop
