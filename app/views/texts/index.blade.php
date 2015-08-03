<!-- app/views/texts/index.blade.php -->

@extends('...layout.main')

@section('nav')

    @include('partials.nav')

    @include('partials.subnav')

@stop

@section('content')
    <h1> Texts</h1>
    <p>{{ $texts->getTotal() }} </p>

<!-- will be used to show any messages -->
@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<td>Title</td>
			<td>Author</td>
			<td>Description</td>
			<td>Year</td>
			<td>Content</td>
			<td>Publication</td>
			<td>Publication date</td>
			<td>Actions</td>
		</tr>
	</thead>
	<tbody>
	@foreach($texts as $text)
		<tr>
            <td><a href="{{ URL::to('texts/' . $text->id) }}">{{ $text->title }}</a></td>
            <td>{{ $text->author }}</td>
            <td>{{ $text->description }}</td>
            <td>{{ $text->year }}</td>
            <td title="{{$text->content}}"><i class="fa fa-list"></i></td>
            <td>{{ $text->publication }}</td>
            <td>{{ $text->publication_date }}</td>

			<!-- we will also add show, edit, and delete buttons -->
			<td>
				<!-- show the text (uses the show method found at GET /texts/{id} -->
				<a class="btn btn-xs btn-success" href="{{ URL::to('texts/' . $text->id) }}" title="Show"><i class="fa fa-eye"></i></a>

				<!-- edit this text (uses the edit method found at GET /texts/{id}/edit -->
				<a class="btn btn-xs btn-info" href="{{ URL::to('texts/' . $text->id . '/edit') }}" title="Edit"><i class="fa fa-edit"></i></a>

                <!-- edit this work (uses the edit method found at GET /works/{id}/edit -->
                <a class="btn btn-xs btn-primary" href="{{ URL::to('assign_text/' . $text->id) }}" title="Assign"><i class="fa fa-link"></i></a>

				<!-- Button triggers modal -->
                <a class="btn btn-xs btn-danger" data-toggle="modal" data-target="#item-delete-{{$text->id}}" title="Delete"><i class="fa fa-trash"></i></a>

                <!-- Are you sure you want to delete this? modal /////////////////////////////////// -->
                <div id="item-delete-{{$text->id}}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Delete</h4>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete the text '{{$text->title}}'?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-xs btn-default" data-dismiss="modal">Close</button>
                                <!-- delete the group (uses the destroy method DESTROY /groups/{id} -->
                                <!-- we will add this later since its a little more complicated than the other two buttons -->
                                {{ Form::open(array('url' => 'texts/' . $text->id, 'class' => 'pull-right')) }}
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

{{ $texts->links()}}

</div>


@stop
