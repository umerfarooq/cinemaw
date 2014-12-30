<?php
/**
 * Template Name: Static Page 
 * Description: Displays blog posts with pagination and featured image.
 *
 * @package WordPress
 * @subpackage CinemaWorld
 */
 get_header(); ?>

<div class="container-fluid hide">    
	<!-- scheduler page -->
	<div id="scheduler" class="container-fluid popup" >
	    <?php $recent = new WP_Query("pagename=schedule-page"); while($recent->have_posts()) : $recent->the_post();?>
	        <h3 class="scheduler-page-title"><?php the_title(); ?></h3>
	        <p class="scheduler-page-description"><?php the_content(); ?></p>
	    <?php endwhile; ?>
	    <a href="JavaScript:void(0);" id="popout_cross" class="scheduler_close"></a>
	</div>

	<!-- about page -->
	<div id="about_page" class="container-fluid popup">
	 	<?php $recent = new WP_Query("pagename=about-page"); while($recent->have_posts()) : $recent->the_post();?>
	    	<h3 class="about-title"><?php the_title(); ?></h3>
	    	<p class="about-description"><?php the_content(); ?></p>
		<?php endwhile; ?>
		<a href="JavaScript:void(0);" id="popout_cross" class="about_page_close"></a>
	</div>


	<!-- subscription page -->
	<!-- <div id="subscribe_page" class="container-fluid">
	    <?php $recent = new WP_Query("pagename=subscribe-page"); while($recent->have_posts()) : $recent->the_post();?>
	    	<h3 class="subscribe-title"><?php the_title(); ?></h3>
	    	<p class="subscribe-description"><?php the_content(); ?></p>
		<?php endwhile; ?>
		<a href="" id="popout_cross" class="subscribe_page_close"><img src="<?php bloginfo('template_directory'); ?>/bootstrap/img/popout-cross-icon.png" ></a>
	</div> -->


	<!-- privacy policy page -->
	<div id="privacy_policy" class="container-fluid popup light">
	    <?php $recent = new WP_Query("pagename=privacy-policy-page"); while($recent->have_posts()) : $recent->the_post();?>
	    	<h3 class="privacy-policy-title"><?php the_title(); ?></h3>
	    	<p class="privacy-policy-description"><?php the_content(); ?></p>
		<?php endwhile; ?>
		<a href="JavaScript:void(0);" id="popout_cross" class="privacy_policy_close"></a>
	</div>
	<!-- terms of use page -->
	<div id="terms_of_use" class="container-fluid popup light">
	    <?php $recent = new WP_Query("pagename=terms-of-use-page"); while($recent->have_posts()) : $recent->the_post();?>
	    	<h3 class="terms-of-use-title"><?php the_title(); ?></h3>
	    	<p class="terms-of-use-description"><?php the_content(); ?></p>
		<?php endwhile; ?>
		<a href="JavaScript:void(0);" id="popout_cross" class="terms_of_use_close"></a>
	</div>
	<!-- contact us page-->
	<div id="contact_us" class="container-fluid popup light">
	    <?php $recent = new WP_Query("pagename=contact-us-page"); while($recent->have_posts()) : $recent->the_post();?>
	    	<h3 class="contact-us-title"><?php the_title(); ?></h3>
	    	<p class="contact-us-description"><?php the_content(); ?></p>
		<?php endwhile; ?>
		<a href="JavaScript:void(0);" id="popout_cross" class="contact_us_close"></a>
	</div>  

	<!-- sunday see the world page-->
	<div id="sunday_popup" class="container-fluid popup navtype">
	    <?php $page = new WP_Query("pagename=sunday-see-the-world"); while($page->have_posts()) : $page->the_post();?>
	    	<h3><?php the_field('title'); ?></h3>
	    	<p><?php the_field('description'); ?></p>
	    	<p>
	    		<a href='JavaScript:void(0);' onclick="$('#movie_<?php echo get_the_ID(); ?>').popup();">
              <span class='trailer'  ></span>
              <label>Watch trailer</label>
          </a>
        </p>
		<?php endwhile; ?>
		<a href="JavaScript:void(0);" id="popout_cross" class="sunday_popup_close"></a>
	</div>      

	<!-- sunday see the world page-->
	<div id="saturday_popup" class="container-fluid popup navtype">
	    <?php $page = new WP_Query("pagename=saturday-festival-picks"); while($page->have_posts()) : $page->the_post();?>
	    	<h3><?php the_field('title'); ?></h3>
	    	<p><?php the_field('description'); ?></p>
	    	<p>
	    		<a href='JavaScript:void(0);' onclick="$('#movie_<?php echo get_the_ID(); ?>').popup();">
              <span class='trailer'  ></span>
              <label>Watch trailer</label>
          </a>
        </p>
		<?php endwhile; ?>
		<a href="JavaScript:void(0);" id="popout_cross" class="saturday_popup_close"></a>
	</div>      

	<!-- sunday see the world page-->
	<div id="friday_popup" class="container-fluid popup navtype">
	    <?php $page = new WP_Query("pagename=thriller-friday"); while($page->have_posts()) : $page->the_post();?>
	    	<h3><?php the_field('title'); ?></h3>
	    	<p><?php the_field('description'); ?></p>
	    	<p>
	    		<a href='JavaScript:void(0);' onclick="$('#movie_<?php echo get_the_ID(); ?>').popup();">
              <span class='trailer'  ></span>
              <label>Watch trailer</label>
          </a>
        </p>
		<?php endwhile; ?>
		<a href="JavaScript:void(0);" id="popout_cross" class="friday_popup_close"></a>
	</div>       
</div>