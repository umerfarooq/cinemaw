
<?php
/**
 * Description: Default Index template to display loop of blog posts
 *
 * @package WordPress
 * @subpackage CinemaWorld
 */
?>
<?php get_header(); ?>

<div class='row'>
    <div id='slider' class='col-xs-12 col-lg-12'>
        <ul>
            <?php
            // The Query
            query_posts( array ( 'category_name' => 'movies', 'posts_per_page' => -1 ) );

            // The Loop
            while ( have_posts() ) : the_post(); ?>
                <li>
                    <img src="<?php the_field('movie_image'); ?>" class="img-responsive" >
                </li>
                
            <?php 
            endwhile;

            // Reset Query
            wp_reset_query();
            ?>
        </ul>
    </div>
</div>

<script type="text/javascript"> onload="initLightbox()"
// $(document).ready(function() {
//           // Initialize the plugin
//           $('#scheduler').popup();
//           $('#video-lightbox').popup();

//       });
</script>
    <!-- <div class="row">
        <div class="span4">
            <nav class="nav navbar-vertical main-nav">
                <ul class="nav navbar-nav">
                    <li><a href="#">Sunday See The World</a></li>
                    <li><a href="#">Saturday Festival Picks</a></li>
                    <li><a href="#">Thriller Friday</a></li>
                    <li><a href="#" class="scheduler_open">Schedules</a></li>
                </ul>
            </nav>
        </div>
    </div> -->

    <!-- for vedio light box -->
   <!--  <div id="video-lightbox" class="container-fluid" >
        <?php echo do_shortcode('[video_lightbox_vimeo5 video_id="113946015?autoplay=1" width="640" height="480" auto_thumb="1"]')?>
        <a href="" id="popout_cross" class="video-lightbox_close"><img src="<?php bloginfo('template_directory'); ?>/bootstrap/img/popout-cross-icon.png" ></a>
    </div> -->

    <!-- scheduler page -->
    <!-- <div id="scheduler" class="container-fluid" >
        <?php $recent = new WP_Query("page_id=13"); while($recent->have_posts()) : $recent->the_post();?>
        <h3 class="scheduler-page-title"><?php the_title(); ?></h3>
        <p class="scheduler-page-description"><?php the_content(); ?></p>
    <?php endwhile; ?>
    <a href="" id="popout_cross" class="scheduler_close"><img src="<?php bloginfo('template_directory'); ?>/bootstrap/img/popout-cross-icon.png" ></a>
</div>
 -->
<!-- about page -->
<!-- <div id="about_page" class="container-fluid">
    <?php $recent = new WP_Query("page_id=4"); while($recent->have_posts()) : $recent->the_post();?>
    <h3 class="about-title"><?php the_title(); ?></h3>
    <p class="about-description"><?php the_content(); ?></p>
<?php endwhile; ?>
<a href="" id="popout_cross" class="about_page_close"><img src="<?php bloginfo('template_directory'); ?>/bootstrap/img/popout-cross-icon.png" ></a>
</div> -->


<!-- subscription page -->
<!-- <div id="subscribe_page" class="container-fluid">
    <?php $recent = new WP_Query("page_id=15"); while($recent->have_posts()) : $recent->the_post();?>
    <h3 class="subscribe-title"><?php the_title(); ?></h3>
    <p class="subscribe-description"><?php the_content(); ?></p>
<?php endwhile; ?>
<a href="" id="popout_cross" class="subscribe_page_close"><img src="<?php bloginfo('template_directory'); ?>/bootstrap/img/popout-cross-icon.png" ></a>
</div> -->


<!-- privacy policy page -->
<!-- <div id="privacy_policy" class="container-fluid">
    <?php $recent = new WP_Query("page_id=11"); while($recent->have_posts()) : $recent->the_post();?>
    <h3 class="privacy-policy-title"><?php the_title(); ?></h3>
    <p class="privacy-policy-description"><?php the_content(); ?></p>
<?php endwhile; ?>
<a href="" id="popout_cross" class="privacy_policy_close"><img src="<?php bloginfo('template_directory'); ?>/bootstrap/img/popout-cross-icon.png" ></a>
</div>
 -->
<!-- terms of use page -->
<!-- <div id="terms_of_use" class="container-fluid">
    <?php $recent = new WP_Query("page_id=17"); while($recent->have_posts()) : $recent->the_post();?>
    <h3 class="terms-of-use-title"><?php the_title(); ?></h3>
    <p class="terms-of-use-description"><?php the_content(); ?></p>
<?php endwhile; ?>
<a href="" id="popout_cross" class="terms_of_use_close"><img src="<?php bloginfo('template_directory'); ?>/bootstrap/img/popout-cross-icon.png" ></a>
</div>
 -->
<!-- contact us page-->
<!-- <div id="contact_us" class="container-fluid">
    <?php $recent = new WP_Query("page_id=9"); while($recent->have_posts()) : $recent->the_post();?>
    <h3 class="contact-us-title"><?php the_title(); ?></h3>
    <p class="contact-us-description"><?php the_content(); ?></p>
<?php endwhile; ?>
<a href="" id="popout_cross" class="contact_us_close"><img src="<?php bloginfo('template_directory'); ?>/bootstrap/img/popout-cross-icon.png" ></a>
</div>      -->

<?php get_footer(); ?>