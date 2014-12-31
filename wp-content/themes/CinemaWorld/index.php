
<?php
/**
 * Description: Default Index template to display loop of blog posts
 *
 * @package WordPress
 * @subpackage CinemaWorld
 */
?>
<?php get_header(); ?>

<div id='slider' class='row-fluid'>
    <ul>
        <?php
        // The Query
        query_posts( array ( 'category_name' => 'movies', 'posts_per_page' => -1 ) );

        // The Loop
        while ( have_posts() ) : the_post(); ?>
            <li>
                <img src="<?php the_field('movie_image'); ?>" class="img-responsive" > 
                <div class='custom-caption'>
                    
                    <div class='row'>
                        <div class='col-lg-12'>
                            <h1><?php the_title();?></h1>
                        </div>
                    </div>

                    <div class='row'>
                        <div class='col-lg-12'>
                            <?php the_field('movie_genre');?></p>
                        </div>
                    </div>

                    <div class='row' style='height: 50%;'>
                        <div class='col-lg-12'>
                            <?php echo mb_strimwidth(get_field('movie_synopsis'), 0, 250, "");?>
                        </div>
                    </div>

                    <div class='row'>
                        <div class='col-lg-6'>
                            <a href='<?php the_permalink(); ?>' class="load_post">
                                <span class='caption-action read' ></span>
                                <label>Read more</label>
                            </a>
                        </div>

                    <div class='col-lg-5 col-lg-offset-1'>
                            <a href='<?php echo the_field("video_url")?>' class="wplightbox" data-width="640" data-height="360" >
                                <span class='caption-action trailer'  ></span>
                                <label>Watch trailer</label>
                            </a>
                        </div>
                    </div>

                    <script type="text/javascript">
                    jQuery(document).ready(function($){
                        $("#movie_<?php echo get_the_ID(); ?>").popup();
                    });                    
                    </script>

                </div>                   
            </li>

            
        <?php 
        endwhile;

        // Reset Query
        wp_reset_query();
        ?>
    </ul>
</div>
<?php include (TEMPLATEPATH . '/navbar.php'); ?>  

<?php get_footer(); ?>