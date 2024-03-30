<!-- app/views/texts/index.blade.php -->

@extends('...layout.main')

@section('nav')

	@include('partials.nav')
	<br>

@stop

@section('content')

	<h1>Sort texts on page "{{ $group->name }}"</h1>
	<p>Click and drag rows up or down to arrange in the desired order</p>

<!-- will be used to show any messages -->
@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

	<table class="table table-striped table-bordered group" data-groupid="{{ $group->id}}">
		<thead>
			 <tr>
				<th>Reorder</th>
				<th>Title</th>
				<th>Content</th>
				<th>Author</th>
				<th>Description</th>
				<th>Year</th>
			</tr>
		</thead>
		<tbody id="text-sortable" class="text-sortable">
	@foreach ($texts as $key => $text)
			<tr class="ui-state-default" data-id="{{ $text->id }}">
				<td><i class="fa fa-sort fa-fw" style="color:#3d4"></i>
				<td>{{ $text->title }}</td>
				<td title="{{ $text->content }}" style="color:#d34"><i class="fa fa-list"></i></td>
				<td>{{ $text->author }}</td>
				<td>{{ $text->description }}</td>
				<td>{{ $text->year }}</td>
			</tr>
	@endforeach
		</tbody>
	</table>

	<a href="/pages" class="btn btn-xs btn-default"><i class="fa fa-arrow-left" style="color:#3d4;"></i> Back</a>

</div>

@stop
