<!-- app/views/navigations/show.blade.php -->

@extends('...layout.main')

@section('nav')

    @include('partials.nav')

    @include('partials.subnav')

@stop

@section('content')


    <div class="text-left">
        <h1>Navigation name: {{ $navigation->name }}</h1>
        <br>

        <table class="work-data work-data-1">
            <tr>
                <th>Alias </th>
                <td>{{ $navigation->alias }} </td>

                <th>Url </th>
                <td>{{ $navigation->url }} </td>

                <th>Level </th>
                <td>{{ $navigation->level }} </td>

                <th>Layout </th>
                <td>{{ $navigation->layout }} </td>

                <th>Order </th>
                <td>{{ $navigation->order }} of {{ $navigation->count() }} </td>

                <th>Display ? </th>
                <td>
                    @if($navigation->display)
                        <span class="fa fa-check"></span>
                    @endif
                </td>

                <th>Secure ? </th>
                <td>
                    @if($navigation->secure)
                        <span class="fa fa-check"></span>
                    @endif
                </td>

            </tr>

        </table>
    </div>

    <a href="/navigations" class="btn btn-default"><i class="fa fa-arrow-left" style="color:#999;"></i> Back</a>
</div>



@stop
