<?php
/*
Plugin Name: Post Expander
Description: Expands a post to show the full contents when the reader clicks the "Read more..." link.
Author: Jonathan Brinley
Author URI: http://xplus3.net/
*/
ob_start();
?>
<?php function static_page_popup () {
    if (have_posts()) {
        
        while (have_posts()) { 
            the_post(); ?>
            <h1 class="privacy-policy-title"><?php the_field('title'); ?></h1>
            <p class="privacy-policy-description"><?php the_content(); ?></p>
            <button class="mfp-close movie_detail_close" type="button" title="Close (Esc)">×</button>
            <!-- <a href="JavaScript:void(0);" id="popout_cross" class="movie_detail_close"></a> -->

<?php   }
    }

    die();
}?>

<?php function navigation_popup () {
    if (have_posts()) {
        
        while (have_posts()) {
        the_post(); ?>
            <h1><?php the_field('title'); ?></h1>
            <p><?php the_field('description'); ?></p>
            <p>
                <a href='<?php echo the_field("trailer_path")?>' class="wplightbox" data-width="860" data-height="480" >
                    <?php if(get_field('trailer_path')){?>
                    <span class='trailer'  ></span>
                    <label class='trailer-label'>Watch trailer</label>
                    <?php } ;?>
                </a>
            </p>
            <button class="mfp-close movie_detail_close nav-popup-close" type="button" title="Close (Esc)">×</button>
            <!-- <a href="JavaScript:void(0);" id="popout_cross" class="movie_detail_close"></a> -->

            <script type="text/javascript">
              jQuery(document).ready(function($){                
                jQuery.cachedScript = function( url, options ) {
                  // Allow user to set any option except for dataType, cache, and url
                  options = $.extend( options || {}, {
                    dataType: "script",
                    cache: true,
                    url: url
                  });
                  // Use $.ajax() since it is more flexible than $.getScript
                  // Return the jqXHR object so we can chain callbacks
                  return jQuery.ajax( options );
                };
                // Usage
                $.cachedScript( "<?php echo plugins_url(),'/wonderplugin-lightbox/engine/wonderpluginlightbox.js';?>" ).done(function( script, textStatus ) {
                  console.log( textStatus );
                });
              });
            </script>
<?php   
        }
    }
    die();
}?>

<?php function post_expander_show_post () {
  if ( have_posts() ) {
    
    while ( have_posts() ) {
      the_post();
      $id=(string)get_the_ID(); 

      $source = get_field('popup_image_source');
      if( $source == 'file') {
          $image = get_field('popup_image_file');                            
      } else {
          $image = get_field('popup_image_url');
      }  
      ?>
      <div>
          <?php if(get_the_title()) { ?>
          <div class='row'>
              <div class='col-lg-12 movie-popup-title'>
                  <h1><?php the_title();?></h1>
                  <h4><?php if(get_field('movie_original_title')) { _e('(');the_field('movie_original_title'); _e(')');};?></h4>
              </div>
          </div>
          <?php } 
          if($image) { ?>
          <div class='row'>
              <div class='col-lg-12'>
                  <img src="<?php echo $image; ?>" class="movie-image img-responsive" /></img>
              </div>
          </div>
          <?php }
          if(get_field('movie_country')) { ?>
          <div class="row">
              <div class='col-lg-2'>Country : </div>
              <div class='col-lg-10'><?php the_field('movie_country');?></div>
          </div>
          <?php } 
          if(get_field('movie_genre')) { ?>
          <div class="row">
              <div class='col-lg-2'>Genre : </div>
              <div class='col-lg-10'><?php the_field('movie_genre');?></div>
          </div>
          <?php } 
          if(get_field('movie_casts')) { ?>
          <div class="row">
              <div class='col-lg-2'>Cast / Director : </div>
              <div class='col-lg-10'><?php the_field('movie_casts');?></div>
          </div>
          <?php }
          if(get_field('movie_duration')) { ?>
          <div class="row">
              <div class='col-lg-2'>Duration : </div>
              <div class='col-lg-10'><?php the_field('movie_duration');?></div>
          </div>
          <?php }
          if(get_field('movie_synopsis')) { ?>
          <div class="row" style='margin-bottom: 2%'>
              <div class='col-lg-2'>Synopsis : </div>
              <div class='col-lg-10'><?php the_field('movie_synopsis');?></div>
          </div>
          <?php }
          if(get_field('video_url')) { ?>
          <div class="row" style='margin-bottom: 3%'>
            <div class='col-lg-10 col-lg-offset-2'>
                <a href='<?php echo the_field("video_url")?>' class="wplightbox" data-width="860" data-height="480" >
                  <span class='caption-action trailer'></span>
                  <label>Watch trailer</label>
                </a>
            </div>
          </div>
          <?php }?>
          <button class="mfp-close movie_detail_close" type="button" title="Close (Esc)">×</button>
          <!-- <a href="JavaScript:void(0);" id="popout_cross" class="movie_detail_close"></a> -->
      </div>
  <?php 
      }?>
      <script type="text/javascript">
        jQuery.cachedScript = function( url, options ) {
              // Allow user to set any option except for dataType, cache, and url
              options = $.extend( options || {}, {
                dataType: "script",
                cache: true,
                url: url
              });
              // Use $.ajax() since it is more flexible than $.getScript
              // Return the jqXHR object so we can chain callbacks
              return jQuery.ajax( options );
            };
            // Usage
            $.cachedScript( "<?php echo plugins_url(),'/wonderplugin-lightbox/engine/wonderpluginlightbox.js';?>" ).done(function( script, textStatus ) {
              console.log( textStatus );
            });
      </script>
<?php }
  die();
} ?>

<?php function movie_schedule_entries ( ) { ?>
    <table class="table-striped" width="100%" cellpadding="0" border="0">
        <?php

          $args = array(
          'post_type'   => 'post',
          'category_name' => 'movies',
          'post_status' => 'publish',
          'posts_per_page'  => -1,
          'orderby'   => 'ID',
          'order'     => 'ASC',
          'meta_query' => array(
            array(
              'key' => 'movie_date',
              'value' => $_POST["date"]
            )
          )
        );
        $array = array();
      // query
        $wp_query = new WP_Query( $args );
      ?>
      <tbody>
        <?php
        if($wp_query->have_posts()){
        // loop
        while( $wp_query->have_posts() )
        {
          $wp_query->the_post();
          $time = get_field('movie_time');
          
          if(!in_array($time, $array)) {
          ?>
        <tr>
          <td class="columnOdd"> <?php the_field('movie_time'); ?></td>
          <td class="columnEven"><a class="title load_post" href="<?php the_permalink();?>"><?php the_title();?></a></td>
        </tr>
        <?php $array[]= $time;}
        }
      } else { ?>
        <tr>
          <td class="notice"> <?php the_field('notice'); ?></td>
        </tr>
      <?php } ?>
      </tbody>
    </table>
    <script type="text/javascript">
      jQuery(document).ready(function($){
        $(".load_post").click( function() {
          var link = $(this);

          if(link.hasClass('static-page') || link.hasClass('nav-link') || link.hasClass('date-link')) {
            return false;
          } else {
            $.post(link.attr("href"), {post_expander: 1}, function(data) {
              $(".detail").html($(data));
              $('#movie_detail').removeClass('navtype');
              $('#movie_detail').addClass('light');
              $("#movie_detail").popup('show');
            });
            return false;
          }
        });
      });
    </script>
   <?php 
    die();
  }
?>

<?php function post_caption( ) { 
  if ( have_posts() ) {
    
    while ( have_posts() ) {
      the_post(); 

      ?>             
        <div class='row'>
            <div class='col-lg-12'>
                <h1><?php the_title();?></h1>
            </div>
        </div>

        <div class='row'>
            <div class='col-lg-12'>
                <?php the_field('movie_genre');?></p>
            </div>
        </div>

        <div class='row caption-desc'>
            <div class='col-lg-12'>
                <?php echo mb_strimwidth(get_field('movie_synopsis'), 0, 220, "...");?>
            </div>
        </div>

        <div class='row'>
            <div class='col-lg-6'>
                <a href='<?php the_permalink(); ?>' class="load_post">
                    <span class='caption-action read' ></span>
                    <label>Read more</label>
                </a>
            </div>

            <div class='col-lg-5 col-lg-offset-1'>
                <?php if(get_field('video_url')) { ?>
                  <a href='<?php echo the_field("video_url")?>' class="wplightbox" data-width="860" data-height="480" >
                      <span class='caption-action trailer'  ></span>
                      <label>Watch trailer</label>
                  </a>
                <?php }?>
            </div>
        </div>

        <script type="text/javascript">
          jQuery(document).ready(function($){
            $(".load_post").click( function() {
              var link = $(this);
              
              if(link.hasClass('static-page') || link.hasClass('nav-link') || link.hasClass('date-link')) {
                return false;
              } else {  
                $.post(link.attr("href"), {post_expander: 1}, function(data) {
                  $(".detail").html($(data));
                  $('#movie_detail').removeClass('navtype');
                  $('#movie_detail').addClass('light');
                  $("#movie_detail").popup('show');
                });
                return false;
              }
            });

            
            jQuery.cachedScript = function( url, options ) {
              // Allow user to set any option except for dataType, cache, and url
              options = $.extend( options || {}, {
                dataType: "script",
                cache: true,
                url: url
              });
              // Use $.ajax() since it is more flexible than $.getScript
              // Return the jqXHR object so we can chain callbacks
              return jQuery.ajax( options );
            };
            // Usage
            $.cachedScript( "<?php echo plugins_url(),'/wonderplugin-lightbox/engine/wonderpluginlightbox.js';?>" ).done(function( script, textStatus ) {
              console.log( textStatus );
            });
          });
        </script>
    <?php 
    }
  }
  die();
}

function post_expander_activate ( ) {
  if ( isset( $_POST["post_expander"] ) ) {
    add_action( 'wp', 'post_expander_show_post' );
  }
  elseif ( isset( $_POST["static_page"] ) ) {
     add_action( 'wp', 'static_page_popup' );
   }
  elseif ( isset( $_POST["navigation_popup"] ) ) {
     add_action( 'wp', 'navigation_popup' );
   }
   elseif ( isset( $_POST["date"] ) ) {
    add_action( 'wp', 'movie_schedule_entries' );
  }elseif ( isset( $_POST["post_caption"] ) ) {
    add_action( 'wp', 'post_caption' );
  }
}

function post_expander_list_scripts ( ) {
  wp_enqueue_script( "post-expander", path_join(WP_PLUGIN_URL, basename( dirname( __FILE__ ) )."/post-expander.js"), array( 'jquery' ) );
}
add_action('init', 'post_expander_activate');
add_action('wp_print_scripts', 'post_expander_list_scripts');
?>