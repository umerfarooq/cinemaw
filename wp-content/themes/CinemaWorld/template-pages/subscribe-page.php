<?php
/**
 * Template Name: Subscribe Page 
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

    <div class="col-lg-7 popup">
    	<?php $recent = new WP_Query("pagename=subscribe"); while($recent->have_posts()) : $recent->the_post();?>
    	
        <h1 class="subscribe-title"><?php the_field('title'); ?></h1>
    	<p>Get CinemaWorld through your local pay TV operator in your countries:</p>
    	<nav class="navbar navbar-vertical subscribe-nav">
            <ul class="nav navbar"> 
            <?php if( have_rows('country') ):
            while ( have_rows('country') ) : the_row();?>
            
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php the_sub_field('country_name');?></a>
                        
                    <ul class="dropdown-menu" role="menu">
                                    
                        <?php while(have_rows('service')) : the_row();?>
                        
                        <li><a href="http://<?php echo (string)the_sub_field('provider_url');?>" target="blank"><?php the_sub_field('provider_name');?></a></li>
                        
                        <?php endwhile ;#endif ?>

                    </ul>       

            <?php endwhile; else : ?>

                <p>No Data found</p>

            <?php endif;?>
            </ul>
        </nav>
        <!-- <a href="" id="popout_cross" class="subscribe_page_close"><img src="<?php bloginfo('template_directory'); ?>/bootstrap/img/popout-cross-icon.png" ></a> -->
        <?php endwhile?>
    </div>
</div>
<?php get_footer();?>