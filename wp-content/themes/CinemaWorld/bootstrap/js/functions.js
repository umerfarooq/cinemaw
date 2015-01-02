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
          // alert('Yayy');
          sb = $(link).parent().siblings('.selected');
          sb.removeClass('selected');
          $(link).parent().addClass('selected');

          $(".schedule_timetable").html($(data));
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
  
  $('.btn_week').click(function(){

    // alert($(this).find('div').attr('class'));
    $(this).siblings('.selected').removeClass('selected');
    $(this).addClass('selected');
    sb = $(this).siblings('.btn_week').find('div').not('.hide');
    sb.addClass('hide');
    $(this).find('div.schedule_left').removeClass('hide');
  });

  $("#thumbnails").owlCarousel({
    items: 6,
    itemsCustom : false,
    itemsDesktop : [1199,4],
    itemsDesktopSmall : [980,3],
    itemsTablet: [768,2],
    itemsTabletSmall: false,
    itemsMobile : [479,1],
    singleItem : false,
    navigation: true,
    navigationText: false,
    scrollPerPage: true,
    rewindNav : true,
    pagination: false,
    slideSpeed: 800,
    responsive: true,
    lazyLoad: true 
  });

  $(".thumb").on('click', function(e){
    e.preventDefault();
    $.backstretch('show',$(this).data("id"));
  }); 

});
