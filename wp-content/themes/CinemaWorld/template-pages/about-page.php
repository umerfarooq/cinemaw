<?php
/**
 * Template Name: About Page 
 * Description: Displays blog posts with pagination and featured image.
 *
 * @package WordPress
 * @subpackage CinemaWorld
 */
 get_header(); ?>
<div id="" class="container-fluid popup about-page">
	<?php $recent = new WP_Query("pagename=about-page"); while($recent->have_posts()) : $recent->the_post();?>
	
    <h2 class="about-title"><?php the_title(); ?></h2>
	<span class="about-content"><?php the_content(); ?></span>
	<?php endwhile;?>
</div>
<?php get_footer();?> 