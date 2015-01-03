<?php
/**
 * Template Name: About Page 
 * Description: Displays blog posts with pagination and featured image.
 *
 * @package WordPress
 * @subpackage CinemaWorld
 */
 get_header(); ?>
 <div class='row content'>
    <div class='col-lg-3 col-lg-offset-1 '>
        <?php include (TEMPLATEPATH . '/navbar.php'); ?>  
    </div>

    <div class='col-lg-7 popup '>
				<?php $recent = new WP_Query("pagename=about-page"); while($recent->have_posts()) : $recent->the_post();?>
				
		    <h3 class="about-title"><?php the_field('title'); ?></h3>
				<span class="about-content"><?php the_content(); ?></span>
				<?php endwhile;?>
    </div>
</div>



<?php get_footer();?> 