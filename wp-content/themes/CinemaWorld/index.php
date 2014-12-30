
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
                            <a href='JavaScript:void(0);' class="movie_<?php echo get_the_ID(); ?>_open">
                                <span class='caption-action read' ></span>
                                <label>Read more</label>
                            </a>
                        </div>
                        <div class='col-lg-5 col-lg-offset-1'>
                            <a href='JavaScript:void(0);' onclick="$('#movie_<?php echo get_the_ID(); ?>').popup();">
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

            <?php  $id=(string)get_the_ID(); ?>
            <div class="popup light" id="movie_<?php echo $id;?>">
                <div class='row'>
                    <div class='col-lg-12'>
                        <h1><?php the_title();?></h1>
                    </div>
                </div>

                <div class='row'>
                    <div class='col-lg-12'>
                        <img src="<?php the_field('movie_image');?>" class="movie-image img-responsive" /></img>
                    </div>
                </div>

                <div class="row">
                    <div class='col-lg-2'>Country : </div>
                    <div class='col-lg-10'><?php the_field('movie_country');?></div>
                </div>

                <div class="row">
                    <div class='col-lg-2'>Genre : </div>
                    <div class='col-lg-10'><?php the_field('movie_genre');?></div>
                </div>

                <div class="row">
                    <div class='col-lg-2'>Cast / Director : </div>
                    <div class='col-lg-10'><?php the_field('movie_casts');?></div>
                </div>

                <div class="row">
                    <div class='col-lg-2'>Duration : </div>
                    <div class='col-lg-10'><?php the_field('movie_duration');?></div>
                </div>

                <div class="row" style='margin-bottom: 3%'>
                    <div class='col-lg-2'>Synopsis : </div>
                    <div class='col-lg-10'><?php the_field('movie_synopsis');?></div>
                </div>
                <a href="JavaScript:void(0);" id="popout_cross" class="movie_<?php echo $id;?>_close"></a>
            </div>
        <?php 
        endwhile;

        // Reset Query
        wp_reset_query();
        ?>
    </ul>
</div>

<nav class="nav navbar-vertical main-nav">
    <ul>
        <li><a href="JavaScript:void(0);" class="sunday_popup_open">Sunday See The World</a></li>
        <li><a href="JavaScript:void(0);" class="saturday_popup_open">Saturday Festival Picks</a></li>
        <li><a href="JavaScript:void(0);" class="friday_popup_open">Thriller Friday</a></li>
        <li><a href="JavaScript:void(0);" class="scheduler_open">Schedules</a></li>
    </ul>
</nav>



<?php get_footer(); ?>