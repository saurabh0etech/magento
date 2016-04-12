$(function() {
    $('#slides').slides({
        preload: true,
        play: 5000,
        pause: 2500,
        hoverPause: true
    });

});

$(document).ready(function(){
    var thetimeout;
    $('#nav-wish').mouseover(function() {
        clearTimeout(thetimeout);
        $('.showCat').slideDown();
    });
    $('#nav-wish').mouseleave(function() {
        thetimeout = setTimeout(function() {
            $('.showCat').slideUp(800);
        });
    });
});

$(function() {
$( "#slider-range" ).slider({
range: true,
min: 0,
max: 1000,
values: [ 75, 500 ],
slide: function( event, ui ) {
$( "#amount" ).val( "Rs   " + ui.values[ 0 ] + " - Rs" + ui.values[ 1 ] );
}
});
$( "#amount" ).val( "Rs" + $( "#slider-range" ).slider( "values", 0 ) +
" -     Rs" + $( "#slider-range" ).slider( "values", 1 ) );
});