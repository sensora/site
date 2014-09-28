var anchoPagina;
var altoPagina;

function adjustStyle(width,height) {
    width = parseInt(width);
    height = parseInt(height);
    if (width < 700 || height < 450 ) {

    }

    else {

    }
}

function cambioTamano(){
	anchoPagina= $(window).width();
	altoPagina= $(window).height();
}

function elementoFull(){
	$('.total').width(anchoPagina);
	$('.total').height(altoPagina);
	$('.videoBG').height(altoPagina);
    $('.videoBG').width(anchoPagina);
    $('#intro').height(altoPagina);
}

$(function() {
    $(window).resize(function() {
        cambioTamano();
        elementoFull();


    });
});

$(document).foundation();

$(document).ready(function() {
	cambioTamano();
	elementoFull();

	$('.confirm').click(function(e) {
        if ( ! confirm('¿Estás seguro de realizar esta acción?') ) {
            e.preventDefault();
        }
    });


	$(window).scroll(function(e) {
		var scroll_position 	= $(window).scrollTop();
		var centroPantalla 		= scroll_position + altoPagina;

		if(scroll_position >= altoPagina){ $(".top-bar").addClass('navegacionActiva'); }
		else { $(".top-bar").removeClass('navegacionActiva'); }
	});
});