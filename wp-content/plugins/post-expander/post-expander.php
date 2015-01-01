<?php
/*
Plugin Name: Post Expander
Description: Expands a post to show the full contents when the reader clicks the "Read more..." link.
Author: Jonathan Brinley
Author URI: http://xplus3.net/
*/
?>
<?php function static_page_popup () {
    if (have_posts()) {
        
        while (have_posts()) { 
            the_post(); ?>
            <h3 class="privacy-policy-title"><?php the_title(); ?></h3>
            <p class="privacy-policy-description"><?php the_content(); ?></p>
            <a href="JavaScript:void(0);" id="popout_cross" class="movie_detail_close"></a>

<?php   }
    }

    die();
}?>
<?php function navigation_popup () {
    if (have_posts()) {
        
        while (have_posts()) {
        the_post(); ?>
            <h3><?php the_field('title'); ?></h3>
            <p><?php the_field('description'); ?></p>
            <p>
                <a href='<?php echo the_field("trailer_path")?>' class="wplightbox" data-width="640" data-height="360" >
                    <?php if(get_field('trailer_path')){?>
                    <span class='trailer'  ></span>
                    <label>Watch trailer</label>
                    <?php } ;?>
                </a>
            </p>
            <a href="JavaScript:void(0);" id="popout_cross" class="movie_detail_close"></a>
<?php   }
    }

    die();
}?>
<?php function post_expander_show_post (  ) {
  if ( have_posts() ) {
    
          while ( have_posts() ) {
            the_post();
            $id=(string)get_the_ID(); ?>
            <div>
                <div class='row'>
                    <div class='col-lg-12'>
                        <h1><?php the_title();?></h1>
                    </div>
                </div>

                <div class='row'>
                    <div class='col-lg-12'>
                        <img src="<?php the_field('movie_image');?>" class="movie-image img-responsive" /></img>
                    </div>
                </div>

                <div class="row">
                    <div class='col-lg-2'>Country : </div>
                    <div class='col-lg-10'><?php the_field('movie_country');?></div>
                </div>

                <div class="row">
                    <div class='col-lg-2'>Genre : </div>
                    <div class='col-lg-10'><?php the_field('movie_genre');?></div>
                </div>

                <div class="row">
                    <div class='col-lg-2'>Cast / Director : </div>
                    <div class='col-lg-10'><?php the_field('movie_casts');?></div>
                </div>

                <div class="row">
                    <div class='col-lg-2'>Duration : </div>
                    <div class='col-lg-10'><?php the_field('movie_duration');?></div>
                </div>

                <div class="row" style='margin-bottom: 3%'>
                    <div class='col-lg-2'>Synopsis : </div>
                    <div class='col-lg-10'><?php the_field('movie_synopsis');?></div>
                </div>
                <a href="JavaScript:void(0);" id="popout_cross" class="movie_detail_close"></a>
            </div>
  <?php }}
  die();
}

function movie_schedule_entries ( ) { ?>
    <table class="table-striped" width="100%" cellpadding="0" border="0">
        <?php

          $args = array(
          'post_type'   => 'post',
          'category_name' => 'movies',
          'post_status' => 'publish',
          'posts_per_page'  => -1,
          'meta_key'    => 'movie_time',
          'orderby'   => 'meta_value_num',
          'order'     => 'ASC',
          'meta_query' => array(
            array(
              'key' => 'movie_date',
              'value' => $_POST["date"]
            )
          )
        );
      // query
        $wp_query = new WP_Query( $args );
      ?>
      <tbody>
        <?php
        // loop
        while( $wp_query->have_posts() )
        {
          $wp_query->the_post();
          ?>
        <tr>
          <td class="columnOdd"> <?php the_field('movie_time'); ?></td>
          <td class="columnEven"><a class="title load_post" href="<?php the_permalink();?>"><?php the_title();?></a></td>
        </tr>
        <?php }?>
      </tbody>
    </table>
   <?php die();
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
  }
}

function post_expander_list_scripts ( ) {
  wp_enqueue_script( "post-expander", path_join(WP_PLUGIN_URL, basename( dirname( __FILE__ ) )."/post-expander.js"), array( 'jquery' ) );
}

add_action('init', 'post_expander_activate');
add_action('wp_print_scripts', 'post_expander_list_scripts');


?>