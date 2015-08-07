<!-- app/views/works/index.blade.php -->

@extends('...layout.main')

@section('nav')

    @include('partials.nav')

    @include('partials.subnav')

@stop

@section('content')
    <h1>Works</h1>
    <p> {{ $works->getTotal() }} </p>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>Image</td>
            <td>Title</td>
            <td>Reference</td>
            <td>Media</td>
            <td>Dimensions</td>
            <td>Date</td>
            <td>Description</td>
            <td>Notes</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
    @foreach($works as $key => $work)
        <tr>

        <td><a href="{{ URL::to('works/' . $work->id) }}"><img src="/media/images/64/{{ $work->reference }}.jpg"></a></td>
        <td>{{ $work->title }}</td>
        <td>{{ $work->reference }}</td>
        <td>{{ $work->media }}</td>
        <td>{{ $work->dimensions }}</td>
        <td>{{ $work->work_date }}</td>
        <td>{{ $work->description }}</td>
        <td>{{ $work->notes }}</td>

            <!-- we will also add show, edit, and delete buttons -->
            <td>
                <!-- show the work (uses the show method found at GET /works/{id} -->
                <a class="btn btn-xs btn-success" href="{{ URL::to('works/' . $work->id) }}" title="Show"><i class="fa fa-eye"></i></a>

                <!-- edit this work (uses the edit method found at GET /works/{id}/edit -->
                <a class="btn btn-xs btn-info" href="{{ URL::to('works/' . $work->id . '/edit') }}" title="Edit"><i class="fa fa-edit"></i></a>

                <!-- edit this work (uses the edit method found at GET /works/{id}/edit -->
                <a class="btn btn-xs btn-primary" href="{{ URL::to('assign_work/' . $work->id) }}" title="Assign"><i class="fa fa-link"></i></a>

                <!-- Button trigger modal -->
                <button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#item-delete-{{$work->id}}" title="Delete"><i class="fa fa-trash"></i></button>

                <!-- Are you sure you want to delete this? modal /////////////////////////////////// -->
                <div id="item-delete-{{$work->id}}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Delete</h4>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete the work '{{$work->title}}'?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-xs btn-default" data-dismiss="modal">Close</button>
                                <!-- delete the group (uses the destroy method DESTROY /groups/{id} -->
                                <!-- we will add this later since its a little more complicated than the other two buttons -->
                                {{ Form::open(array('url' => 'works/' . $work->id, 'class' => 'pull-right')) }}
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

{{ $works->links() }}

</div>



@stop
