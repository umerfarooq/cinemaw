<?php
/**
 * Template Name: Static Page 
 * Description: Displays blog posts with pagination and featured image.
 *
 * @package WordPress
 * @subpackage CinemaWorld
 */
 get_header(); ?>

<?php

// check if the repeater field has rows of data
if( have_rows('country') ):

 	// loop through the rows of data
    while ( have_rows('country') ) : the_row();

        // display a sub field value
        echo the_sub_field('country-name');

    endwhile;

else :

    // no rows found

endif;

?>