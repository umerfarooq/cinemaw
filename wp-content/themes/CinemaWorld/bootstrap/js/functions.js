jQuery(document).ready(function($){
	$("#slider").tiksluscarousel({nav:'thumbnails', navIcons: false, prev: '', next: '', height: 0, width: 0});
	
	// Initialize the plugin
    $('#scheduler').popup();
    // $('#video-lightbox').popup();
	$('#subscribe_page').popup();
	$('#about_page').popup();
	$('#privacy_policy').popup();
	$('#terms_of_use').popup();
	$('#contact_us').popup();

});