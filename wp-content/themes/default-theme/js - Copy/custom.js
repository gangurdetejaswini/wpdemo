// custom js
jQuery(function($){
$(window).scroll(function() {    
    var scroll = $(window).scrollTop();

    if (scroll >= 50) {
        $("#main-header").addClass("main-header-ontop");
    } else {
        $("#main-header").removeClass("main-header-ontop");
    }
});


$(document).ready(function(){

// Initializing slider
$( "#slider-range" ).slider({
			range: true,
			min: 0,
			max: 500,
			values: [ 10, 490 ],
			slide: function( event, ui ) {
				$( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
			}
		});
		$( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
			" - $" + $( "#slider-range" ).slider( "values", 1 ) );
	} );


});