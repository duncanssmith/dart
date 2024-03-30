<!-- app/views/groups/show.blade.php -->

@extends ('...layout.main')

@section ('nav')

    @include ('partials.nav')

    @include ('partials.subnav')

@stop

@section ('content')


    <div class="text-left">
        <h1>Page name: {{ $group->name }}</h1>
        <br>
        <table class="table table-striped table-bordered">
            <tr>
                <th>Order </th>
                <th>Columns </th>
                <th>Image size </th>
                <th>Layout </th>
                <th>Works </th>
                <th>Texts </th>
                <th>Display ? </th>
	    </tr>
	    <tr>
                <td>{{ $group->order }} of {{ $group->count() }} </td>
                <td>{{ $group->columns }} </td>
                <td>{{ $group->image_size }} </td>
                <td>{{ $group->layout }} </td>
                <td>{{ $group->works()->count() }} </td>
                <td>{{ $group->texts()->count() }} </td>
                <td>
                    @if($group->display)
                        <span class="fa fa-check" style="color:green"></span>
                    @endif
                </td>
	    </tr>
        </table>
    </div>

    <a href="/pages" class="btn btn-xs btn-default"><i class="fa fa-arrow-left" style="color:#999;"></i> Back</a>
</div>



@stop
