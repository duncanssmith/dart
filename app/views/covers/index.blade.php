<!-- app/views/covers/index.blade.php -->

@extends('...layout.main')

@section('nav')

    @include('partials.nav')

    @include('partials.subnav')

@stop

@section('content')
    <h1>Covers</h1>
    <br>
    <p>{{ $covers->getTotal() }} covers</p>


<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>Current? </td>
            <td>Image </td>
            <td>Title </td>
            <td>Reference </td>
            <td>Media </td>
            <td>Dimensions </td>
            <td>Date </td>
            <td>Description </td>
            <td>Notes </td>
            <td>Actions </td>
        </tr>
    </thead>
    <tbody>
    @foreach($covers as $key => $cover)
        <tr>
        <td>
            @if($cover->is_current)
                <span class="fa fa-check"></span>
            @endif
        </td>
        <td><a href="{{ URL::to('covers/' . $cover->id) }}" title="Click to view details for this cover" target="_blank"><img src="/media/images/covers/{{ $cover->reference }}.jpg" width="160px"></a></td>
        <td>{{ $cover->title }}</td>
        <td>{{ $cover->reference }}</td>
        <td>{{ $cover->media }}</td>
        <td>{{ $cover->dimensions }}</td>
        <td>{{ $cover->cover_date }}</td>
        <td>{{ $cover->description }}</td>
        <td>{{ $cover->notes }}</td>

            <!-- we will also add show, edit, and delete buttons -->
            <td>
                <!-- edit this cover (uses the edit method found at GET /covers/{id}/edit -->
                <a class="btn btn-xs btn-info" href="{{ URL::to('covers/' . $cover->id . '/edit') }}">Edit</a>

                <!-- edit this cover (uses the edit method found at GET /covers/{id}/edit -->
                <a class="btn btn-xs btn-primary" href="{{ URL::to('set_cover/' . $cover->id) }}">Set as cover</a>

                <!-- Button trigger modal -->
                <button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#item-delete-{{$cover->id}}">Delete</button>

                <!-- Are you sure you want to delete this? modal /////////////////////////////////// -->
                <div id="item-delete-{{$cover->id}}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Delete</h4>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete the cover '{{$cover->title}}'?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-xs btn-default" data-dismiss="modal">Close</button>
                                <!-- delete the group (uses the destroy method DESTROY /groups/{id} -->
                                <!-- we will add this later since its a little more complicated than the other two buttons -->
                                {{ Form::open(array('url' => 'covers/' . $cover->id, 'class' => 'pull-right')) }}
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

{{ $covers->links() }}

</div>



@stop
