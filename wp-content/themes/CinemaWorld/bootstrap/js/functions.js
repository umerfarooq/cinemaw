jQuery(document).ready(function($){
	$("#slider").tiksluscarousel({nav:'thumbnails', navIcons: false, prev: '', next: '',height:0, width:0, autoplayInterval: 70000});

// Initialize the plugin
	$('#scheduler').popup();
  // $('#video-lightbox').popup();
  $('#subscribe_page').popup();
  $('#about_page').popup();
  $('#privacy_policy').popup();
  $('#terms_of_use').popup();
  $('#contact_us').popup();
  $('#sunday_popup').popup();
  $('#saturday_popup').popup();
  $('#friday_popup').popup();

  $("#movie_detail").popup();

  $(".load_post").click( function() {
    var link = $(this);
    $.post(link.attr("href"), {
        post_expander: 1
      }, function(data) {
        // link.parents(".entry").html($(data));
         $(".detail").html($(data));
           $("#movie_detail").popup('show');
      }
    );
    return false;
  });

});
