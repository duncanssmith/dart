<!-- app/views/pages/groupcarousel.blade.php -->

@extends('...layout.main_carousel')

@section('nav')

    @include('partials.nav')

@stop

@section('content')

<div class="container">

    <div class="text-left">
        <h4>{{ $group->name }}</h4>
        @if(!$group->display)
            @include('partials.hidden')
        @endif
    </div>

    <!-- main slider carousel -->
    <div class="row">
        <div class="col-md-12 col-md-offset-0" id="slider">
            <div class="col-md-12" id="carousel-bounding-box">
                <div id="myCarousel" class="carousel slide">
                    <!-- main slider carousel items -->
                    <div class="carousel-inner">

                    @foreach ($works as $i => $work)
                        @if ($i == 0)
                            <div class="active item" data-slide-number="{{ $i }}">
                        @else
                            <div class="item" data-slide-number="{{ $i }}">
                        @endif
                                <img src="/media/images/640/{{ $work->reference }}.jpg" title="{{ $work->title,', ', $work->media,', ', $work->dimensions,', ', $work->work_date }}" class="img-responsive">
                                <div class="carousel-caption">
                                    <p>{{ $work->title, ', ', $work->media, ', ', $work->dimensions,', ', $work->work_date }}</p>
                                </div>
                            </div>
                    @endforeach
                     </div>

                        <!-- main slider carousel nav controls -->
                        <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>

                        <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
                </div>

            </div>
        </div>
    </div>
    <!--/main slider carousel-->

    <div class="row">

        <!-- thumb navigation carousel -->
        <div class="col-md-12 hidden-sm hidden-xs" id="slider-thumbs">

            <!-- thumb navigation carousel items -->
            <ul class="list-inline">
                @foreach ($works as $i => $work)
                <li>
                    @if ($i == 0)
                        <a id="carousel-selector-{{ $i }}" class="selected">
                    @else
                        <a id="carousel-selector-{{ $i }}" class="">
                    @endif
                            <img src="/media/images/120/{{ $work->reference }}.jpg" title="{{ $work->title,', ', $work->media,', ', $work->dimensions,', ', $work->work_date  }}" class="img-responsive">
                        </a>
                </li>
                @endforeach
            </ul>

        </div>

    </div>
</div>

