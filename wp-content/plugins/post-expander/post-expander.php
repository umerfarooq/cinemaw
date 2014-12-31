<?php
/*
Plugin Name: Post Expander
Description: Expands a post to show the full contents when the reader clicks the "Read more..." link.
Author: Jonathan Brinley
Author URI: http://xplus3.net/
*/

function post_expander_show_post (  ) {
  if ( have_posts() ) {
    // while ( have_posts() ) {
    //   the_post();
    //   the_content('Read more...');
    // }    
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

function post_expander_activate ( ) {
  if ( isset( $_POST["post_expander"] ) ) {
    add_action( 'wp', 'post_expander_show_post' );
  }
}

function post_expander_list_scripts ( ) {
  wp_enqueue_script( "post-expander", path_join(WP_PLUGIN_URL, basename( dirname( __FILE__ ) )."/post-expander.js"), array( 'jquery' ) );
}

add_action('init', 'post_expander_activate');
add_action('wp_print_scripts', 'post_expander_list_scripts');


?>