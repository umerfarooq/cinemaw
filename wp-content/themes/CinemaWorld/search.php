<?php
/**
 * Search Results Template
 *
 * @package WordPress
 * @subpackage BootstrapWP
 */
get_header(); ?>
<div class="container search-results">
    <div class="row">

        <div class="search-header-image img-responsive"><img src="<?php bloginfo('template_directory'); ?>/bootstrap/img/title-movies.png"></div>

        <div class="row content">
            <?php  $allsearch = &new WP_Query("s=$s&showposts=-1");?>

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
            wp_reset_query(); 
            ?>
            
            <?php while ($allsearch->have_posts()) : $allsearch->the_post(); ?>
            
                <section>   
                    <div class="col-md-2">
                        <div class="movie-image">
                            <img src="<?php the_field('movie_image');?>" class='img-responsive responsive_img' >
                        </div>
                        <a href="JavaScript:void(0);" title="<?php the_title();?>" onclick="$('#movies_<?php echo (string)get_the_ID();?>').popup();" class="movies_<?php echo (string)get_the_ID();?>_open">
                            <span class="movie-title"><?php the_title();?></span>
                        </a>
                        <span class="search-time"><?php the_time('F, j, Y') ?></span>
                    </div>            
                </section>
                <!-- / LIST RESULTS -->
            <?php endwhile; else: ?>

            <!-- 404 SEARCH -->
            <div class="search-fail">
                <?php _e("<p>Oops... We couldn't find what you were searching for. Please try again</p>"); ?>
                <div class="search-page-form">Search : <?php get_search_form(); ?></div>
            </div>
            <!-- / 404 SEARCH -->
        <?php endif; ?>
        

        <?#php bootstrapwp_content_nav('nav-below'); ?>
    </div>
    </div>
    </div>
    <?php get_footer(); ?>