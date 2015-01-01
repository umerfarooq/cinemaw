jQuery(document).ready(function($){
	// $("#slider").tiksluscarousel({nav:'thumbnails', navIcons: false, prev: '', next: '',height:0, width:0, autoplayInterval: 70000});

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
    if (link.hasClass('static-page')) {
     $.post(link.attr("href"), {
          static_page: 1
        }, function(data) {
          // link.parents(".entry").html($(data));
           $(".detail").html($(data));
             $("#movie_detail").popup('show');
        }
      ); 
    }else if (link.hasClass('nav-link')) {
     $.post(link.attr("href"), {
          navigation_popup: 1
        }, function(data) {
          // link.parents(".entry").html($(data));
          $(".detail").html($(data));
          $('#movie_detail').removeClass('light');
          $('#movie_detail').addClass('navtype');
          $("#movie_detail").popup('show');
        }
      ); 
    }else if (link.hasClass('date-link')) {
     $.post(link.attr("href"), {
          date: link.attr('data-date')
        }, function(data) {
          alert('Yayy');
          sb=$(this).parent().siblings('.selected');
          sb.removeClass('selected');
          $(this).parent().addClass('selected');

          $('schedule_timetable').html($(data));
        }
      ); 
    } else {
    $.post(link.attr("href"), {
        post_expander: 1
      }, function(data) {
        // link.parents(".entry").html($(data));
         $(".detail").html($(data));
           $("#movie_detail").popup('show');
      }
    );};
    return false;
  });

  $('.load-schedule').click(function(){
    // sb=$(this).parent().siblings('.selected');
    // sb.removeClass('selected');
    // $(this).parent().addClass('selected');
    var link = $(this);

    $.post('', {
      post_expander: 1
    }, function(data) {
          // link.parents(".entry").html($(data));
          
        }
      ); 
    
  });

  $("#thumbnails").owlCarousel();

});
