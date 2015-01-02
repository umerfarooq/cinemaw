jQuery(document).ready(function($){
  //
  // Initialize Popup on template container to load dynamic content in Light Box
  //
  $("#movie_detail").popup();

  //
  // Load dynamic posts, pages and content through AJAX calls in a LightBox
  //
  $(".load_post").click( function() {
    var link = $(this);
    if (link.hasClass('static-page')) {
     $.post(link.attr("href"), {
          static_page: 1
        }, function(data) {
           $(".detail").html($(data));
             $("#movie_detail").popup('show');
        }
      ); 
    }else if (link.hasClass('nav-link')) {
     $.post(link.attr("href"), {
          navigation_popup: 1
        }, function(data) {
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
  
  //
  // Schedule calendar actions
  //
  $('#week_day').click(function(){
      $('#shedule_right').show();      
    });
  
  $('.btn_week').click(function(){

    // alert($(this).find('div').attr('class'));
    $(this).siblings('.selected').removeClass('selected');
    $(this).addClass('selected');
    sb = $(this).siblings('.btn_week').find('div').not('.hide');
    sb.addClass('hide');
    $(this).find('div.schedule_left').removeClass('hide');
  });

  //
  // Initialize and inject Movies Thumbnail slider
  //
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

  //
  // Loading up respective Background slider based on clicked Thumbnail
  //
  $(".thumb").on('click', function(e){
    e.preventDefault();
    $.backstretch('show',$(this).data("id"));
  }); 

});
