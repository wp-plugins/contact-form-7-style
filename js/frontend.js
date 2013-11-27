/*
jQuery functions for the Front end area
*/
jQuery(document).ready( function( $ ) {
	
	// Xmas Classic
	$('.xmas-classic .wpcf7').prepend('<div class="header"></div><div class="left"></div>').append('<div class="footer"></div>');
	
	// Xmas Red
	$('.xmas-red .wpcf7').prepend('<div class="header"></div><div class="left"></div>').append('<div class="footer"></div>');
	$('.xmas-red .wpcf7-radio .wpcf7-list-item').first().addClass('active');
	$('.xmas-red .wpcf7-radio .wpcf7-list-item input').on( 'click', function() {
		$('.xmas-red .wpcf7-radio .wpcf7-list-item').removeClass('active');
		$(this).parent().addClass('active');
	});
	
	$('.xmas-red .wpcf7-checkbox .wpcf7-list-item input').on( 'click', function() {
		$(this).parent().toggleClass('active');
	});
		
	// Xmas Simple
	$('.xmas-simple .wpcf7').prepend( '<div class="header"></div><div class="middle"></div><div class="ribbon"></div>' ).append('<div class="footer"></div>');

});