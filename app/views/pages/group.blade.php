<!-- app/views/pages/group.blade.php -->

@extends('...layout.main')

@section('nav')

    @include('partials.nav')

@stop

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-6">

            	<div class="text-left">
            		<h4>{{ $group->name }}</h4>
            	</div>

                    <table>
	                @foreach($works as $work)

                        @if ($i % $columns == 0)
                            @if ($i==0)
                        <tr>
                            @else
                        </tr>
                        <tr>
                            @endif
                        @endif
                            <td class="work-container">
    	    	                <a id="modal-{{ $work->reference }}" data-toggle="modal" data-target="#item-show-{{ $work->reference }}" ><img src="/media/images/320/sh_{{ $work->reference }}.jpg"></a><br>

                                <!--<p>{{ $work->title }} </p>-->
                                <!-- {{ $work->media }} <br>
                                     {{ $work->dimensions }} <br>
                                     {{ $work->work_date }} -->
                                <!-- Button trigger modal -->
                                <a id="modal-{{ $work->reference }}" href="/pagework/{{$work->id}}?group={{ $group->id}}" class="btn btn-sm btn-default"><i class="fa fa-arrow-right" style="color:#999;"></i> {{ $work->title }}</a>
                                <!-- Image display modal ////////////////////////////////////////////////////////// -->
                                <div id="item-show-{{ $work->reference }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                                                <h4 class="modal-title">{{ $work->title }}</h4>
                                            </div>
                                            <div class="modal-body ">
                                                <img src="/media/images/320/sh_{{ $work->reference }}.jpg">
                                            </div>
                                            <div class="modal-footer">
                                                <p class="modal-title pull-left">
                                                {{ $work->media }}&nbsp;
                                                {{ $work->dimensions }}&nbsp;
                                                {{ $work->work_date }}
                                                {{ $work->description }}&nbsp;
                                                {{ $work->notes }}&nbsp;
                                                </p>
                                                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            </td>
                        <?php $i++ ?>
                        @endforeach
                        </tr>
                    </table>
            </div>

            <div class="col-md-6">
                <div class="text-container">
                    @foreach($texts as $text)
                    <div class="text-left">
                        <h5>{{ $text->title }}</h5>
                    </div>
                    {{ $text->content }}<br>
                    {{ $text->author }} <br>
                    {{ $text->year }} <br>
                    <hr>
                    @endforeach
                </div>
            </div>

        </div>
    </div> <?php // end container?>

@stop
