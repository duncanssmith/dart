<!-- app/views/groups/show.blade.php -->

@extends('...layout.main')

@section('nav')

    @include('partials.nav')

    @include('partials.subnav')

@stop

@section('content')


    <div class="text-left">
        <h1>Page name: {{ $group->name }}</h1>
        <br>

        <table class="work-data work-data-1">
            <tr>
                <th>Order </th>
                <td>{{ $group->order }} of {{ $group->count() }} </td>

                <th>Columns </th>
                <td>{{ $group->columns }} </td>

                <th>Image size </th>
                <td>{{ $group->image_size }} </td>

                <th>Layout </th>
                <td>{{ $group->layout }} </td>

                <th>Works </th>
                <td>{{ $group->works()->count() }} </td>

                <th>Texts </th>
                <td>{{ $group->texts()->count() }} </td>

                <th>Display ? </th>
                <td>
                    @if($group->display)
                        <span class="fa fa-check"></span>
                    @endif
                </td>

            </tr>

        </table>
    </div>

    <a href="/pages" class="btn btn-default"><i class="fa fa-arrow-left" style="color:#999;"></i> Back</a>
</div>



@stop
