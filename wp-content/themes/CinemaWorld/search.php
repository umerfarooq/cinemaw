<?php
/**
 * Search Results Template
 *
 * @package WordPress
 * @subpackage BootstrapWP
 */
get_header(); ?>
<div class="container search-results">

        <div class="search-header-image img-responsive" style="margin-bottom:-2%;"><img src="<?php bloginfo('template_directory'); ?>/bootstrap/img/title-movies.png"></div>
            <?php  $allsearch = &new WP_Query("s=$s&showposts=-1&cat=2");?>

            <!-- LIST RESULTS -->
            <?php if ($allsearch->have_posts()) : ?>
            <?php
            $key = wp_specialchars($s, 1);
            $count = $allsearch->post_count; 
            _e('<h2 class="results-header">');
            _e('Showing results for ');
            _e('"');
            echo $key;
            _e('"'); 
            _e(' &mdash; found ');
            echo $count . ' '; 
            _e('movies</h2>');
            ?>
        <div class="row content" style="clear:both">
            <?php while ($allsearch->have_posts()) : $allsearch->the_post(); ?>
            
               
                <div class="col-md-2 movie-container">
                    <div class="row">
                    <div class="movie-image">
                        <img src="<?php the_field('movie_image');?>" class='img-responsive responsive_img' >
                    </div>
                    </div>
                    <div class="row">
                    <a href="<?php the_permalink(); ?>" title="<?php the_title();?>" class="load_post">
                        <span class="movie-title"><?php the_title();?> (<?php the_field('movie_original_title'); ?>)</span>
                    </a>
                </div>            
                </div>
            <!-- / LIST RESULTS -->
             
            <?php endwhile;wp_reset_query(); else: ?>

            <!-- 404 SEARCH -->
            <div class="search-fail">
                <?php _e("<p>Oops... We couldn't find what you were searching for. Please try again</p>"); ?>
            </div>
            <!-- / 404 SEARCH -->
            <?php endif; ?>
           

        </div>
</div>
 
<?php get_footer(); ?>