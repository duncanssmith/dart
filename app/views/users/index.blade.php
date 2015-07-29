<!-- app/views/users/index.blade.php -->

@extends('...layout.main')

@section('nav')
    @include('partials.nav')
@include('users.partials.nav')

@stop

@section('content')
    <h1>  Users </h1>
    <p>{{ $users->getTotal() }}</p>

<!-- will be used to show any messages -->
@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
	<thead>
		<tr>
            <td>Id</td>
			<td>Username</td>
			<td>Email</td>
			<td>Actions</td>
		</tr>
	</thead>
	<tbody>
	@foreach($users as $user)
		<tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->username }}</td>
            <td>{{ $user->email }}</td>

		    <!-- we will also add show, edit, and delete buttons -->
			<td>

				<!-- show the user (uses the show method found at GET /users/{id} -->
				<a class="btn btn-xs btn-success" href="{{ URL::to('users/' . $user->id) }}">Show</a>

				<!-- edit this user (uses the edit method found at GET /users/{id}/edit -->
				<a class="btn btn-xs btn-info" href="{{ URL::to('users/' . $user->id . '/edit') }}">Edit</a>

				<!-- Button trigger modal -->
                <button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#item-delete-{{ $user->id }}">Delete</button>

                <!-- Are you sure you want to delete this? modal /////////////////////////////////// -->
                <div id="item-delete-{{$user->id}}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Delete</h4>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete the user '{{$user->username}}'?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-xs btn-default" data-dismiss="modal">Close</button>
                                <!-- delete the group (uses the destroy method DESTROY /groups/{id} -->
                                <!-- we will add this later since its a little more complicated than the other two buttons -->
                                {{ Form::open(['url' => 'users/'.$user->id, 'class' => 'pull-right']) }}
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

{{ $users->links() }}

</div>



@stop
