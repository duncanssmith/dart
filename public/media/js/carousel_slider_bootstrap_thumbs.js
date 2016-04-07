$('#myCarousel').carousel({
    interval: 9000
});

// handles the carousel thumbnails
$('[id^=carousel-selector-]').click( function(){

    var thumb_id = "carousel-selector-";
    var id_selector = $(this).attr("id");
    var id = parseInt(id_selector.substr(thumb_id.length));

    $('#myCarousel').carousel(id);
    $('[id^=carousel-selector-]').removeClass('selected');
    $(this).addClass('selected');
});

// when the carousel slides, update the thumbnail
$('#myCarousel').on('slide.bs.carousel', function (e) {
    var id = $('.item.active').data('slide-number');
    id = parseInt(id) + 1;

    $('[id^=carousel-selector-]').removeClass('selected');
    $('[id=carousel-selector-'+id+']').addClass('selected');
});


$(function() {
$('.carousel').carousel();
    var caption = $('div.item:nth-child(1) .carousel-caption');
    $('#right h1').html(caption.html());
    caption.css('display','none');

    $(".carousel").on('slide.bs.carousel', function(evt) {
       var caption = $('div.item:nth-child(' + ($(evt.relatedTarget).index()+1) + ') .carousel-caption');
       $('#right h1').html(caption.html());
       caption.css('display','none');
    });
});

