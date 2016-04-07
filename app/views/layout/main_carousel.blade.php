<!DOCTYPE html>
<html>
    <head>
    	<meta charset="UTF-8">
        <title>{{$title}}</title>

        <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <link rel="stylesheet" href="/media/css/font-awesome.css">
        <link rel="stylesheet" href="/media/css/main.css">
        <link rel="stylesheet" href="/media/css/carousel.css">

        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <script src="{{ asset('/media/js/vendor/jquery/jquery-2.1.1.min.js') }}"></script>
        <script src="{{ asset('/media/js/vendor/twitter/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="//cdn.ckeditor.com/4.4.5/basic/ckeditor.js"></script>
        <script src="{{ asset('/media/js/image_sort.js')}}"></script>
        <script src="{{ asset('/media/js/carousel_slider_bootstrap_thumbs.js') }}"></script>

    </head>

    <body id="carousel" <?php echo isset($body_class) ? 'class="'.$body_class.'"' : ''?>>

        @section('nav')
        @show

        <div class="container">

            @yield('content')

        </div>

    </body>
</html>
