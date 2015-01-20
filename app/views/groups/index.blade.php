<!-- app/views/groups/index.blade.php -->

@extends('...layout.main')

@section('nav')

    @include('partials.nav')

    @include('partials.subnav')

@stop

@section('content')
    <h1> Pages</h1>
    <p> {{ $groups->getTotal() }}</p>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>Id</td>
            <td>Name</td>
            <td>Order</td>
            <td>Columns</td>
            <td>Image size</td>
            <td>Layout</td>
            <td>Works</td>
            <td>Texts</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
    @foreach($groups as $group)
        <tr>

            <td>{{ $group->id }}</td>
            <td><a href="/page/{{$group->id}}">{{ $group->name }}</a></td>
            <td>{{ $group->order }}</td>
            <td>{{ $group->columns }}</td>
            <td>{{ $group->image_size }}</td>
            <td>{{ $group->layout }}</td>
            <td>{{ $group->works()->count() }}</a></td>
            <td>{{ $group->texts()->count() }}</a></td>

            <!-- we will also add show, edit, and delete buttons -->
            <td>

                {{--{{ Html::link(URL::route('Groups.destroy',$event->id), 'Delete', array('class' => 'btn btn-small btn-danger delete-event', 'data-title'=>'Delete group', 'data-content' => 'Are you sure you want to delete this groups?', 'onClick'=>'return false;')) }}--}}

                <!-- show the group (uses the show method found at GET /groups/{id} -->
                <a class="btn btn-sm btn-success" href="{{ URL::to('pages/' . $group->id) }}">Show</a>

                <!-- edit this group (uses the edit method found at GET /groups/{id}/edit -->
                <a class="btn btn-sm btn-info" href="{{ URL::to('pages/' . $group->id . '/edit') }}">Edit</a>

                <!-- edit this group (uses the edit method found at GET /groups/{id}/edit -->
                <a class="btn btn-sm btn-primary" href="{{ URL::to('sort_page_works/' . $group->id ) }}">Sort works</a>

                <!-- edit this group (uses the edit method found at GET /groups/{id}/edit -->
                <a class="btn btn-sm btn-primary" href="{{ URL::to('sort_page_texts/' . $group->id ) }}">Sort texts</a>

                <!-- Button trigger modal -->
                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#item-delete-{{$group->id}}">Delete</button>

                <!-- Are you sure you want to delete this? modal /////////////////////////////////// -->
                <div id="item-delete-{{$group->id}}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Delete</h4>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete the page '{{$group->name}}'?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                                <!-- delete the group (uses the destroy method DESTROY /groups/{id} -->
                                <!-- we will add this later since its a little more complicated than the other two buttons -->
                                {{ Form::open(array('url' => 'pages/' . $group->id, 'class' => 'pull-right')) }}
                                    {{ Form::hidden('_method', 'DELETE') }}
                                {{ Form::submit('Delete', array('class' => 'btn btn-sm btn-danger ')) }}
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

{{ $groups->links() }}

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
