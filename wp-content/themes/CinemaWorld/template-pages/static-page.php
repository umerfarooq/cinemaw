<?php
/**
 * Template Name: Static Page 
 * Description: Displays blog posts with pagination and featured image.
 *
 * @package WordPress
 * @subpackage CinemaWorld
 */
 get_header(); ?>
	    <?php while (have_posts()) : the_post(); ?>

		    <div class="container">
		       <div id="title">
		        <header class="page-title">
		            <h1><?php the_title();?></h1>
		        </header>   
		         </div>
		            <?php the_content(); ?>
					<?php endwhile; // end of the loop. ?>

		        <!-- .row content -->
		    </div><!--/.container -->
		
	   