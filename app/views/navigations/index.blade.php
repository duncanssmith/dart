<!-- app/views/navigations/index.blade.php -->

@extends('...layout.main')

@section('nav')

    @include('partials.nav')

    @include('partials.subnav')

@stop

@section('content')
    <h1>Navigations</h1>
    <br>
    <p>{{ $navigations->getTotal() }} navigations</p>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>Id</td>
            <td>Name</td>
            <td>Alias</td>
            <td>Url</td>
            <td>Level</td>
            <td>Layout</td>
            <td>Order</td>
            <td>Display?</td>
            <td>Secure?</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
    @foreach($navigations as $navigation)
        <tr>

            <td>{{ $navigation->id }}</td>
            <td><a href="/navigations/{{$navigation->id}}" title="Click to view this navigation" target="">{{ $navigation->name }}</a></td>
            <td>{{ $navigation->alias }}</td>
            <td><a href="{{ $navigation->url }}">{{$navigation->url}}</a></td>
            <td>{{ $navigation->level }}</td>
            <td>{{ $navigation->layout }}</td>
            <td>{{ $navigation->order }}</td>
            <td>
                @if($navigation->display)
                    <span class="fa fa-check"></span>
                @endif
            </td>
            <td>
                @if($navigation->secure)
                    <span class="fa fa-check"></span>
                @endif
            </td>

            <td>
                <a class="btn btn-xs btn-info" href="{{ URL::to('navigations/' . $navigation->id . '/edit') }}">Edit</a>

                <button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#item-delete-{{$navigation->id}}">Delete</button>

                <!-- Are you sure you want to delete this? modal /////////////////////////////////// -->
                <div id="item-delete-{{$navigation->id}}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Delete</h4>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete the page '{{$navigation->name}}'?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-xs btn-default" data-dismiss="modal">Close</button>
                                {{ Form::open(array('url' => 'navigations/' . $navigation->id, 'class' => 'pull-right')) }}
                                    {{ Form::hidden('_method', 'DELETE') }}
                                {{ Form::submit('Delete', array('class' => 'btn btn-xs btn-danger ')) }}
                                {{ Form::close() }}
                            </div>
                        </div>
                    </div>
                </div>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>

{{ $navigations->links() }}

</div>

<script type="text/javascript">
$(document).ready(function(){
    $('#deleteButton').click( function() {
        $('#item-delete').modal('show');
        return false;
    });
});  
</script>

@stop
