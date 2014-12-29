
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
    <div id='slider'>
        <ul>
            <?php
            // The Query
            query_posts( array ( 'category_name' => 'movies', 'posts_per_page' => -1 ) );

            // The Loop
            while ( have_posts() ) : the_post(); ?>
                <li>
                    <img src="<?php the_field('movie_image'); ?>" class="img-responsive" >
                </li>
                <?php  $id=(string)get_the_ID(); ?>
                <div class="hide" id="movie_<?php echo $id;?>">
                    <div class="movie-title">Title : <?php the_title();?></div>
                    <div class="movie-image img-responsive"><img src="<?php the_field('movie_image');?>"/></div>
                    <div class="movie-country">Country : <?php the_field('movie_country');?></div>
                    <div class="movie-genre">Genre : <?php the_field('movie_genre');?></div>
                    <div class="movie-cast">Cast / Director : <?php the_field('movie_casts');?></div>
                    <div class="movie-duration">Duration : <?php the_field('movie_duration');?></div>
                    <div class="movie-synopsis">Synopsis : <?php the_field('movie_synopsis');?></div>
                </div>
            <?php 
            endwhile;

            // Reset Query
            wp_reset_query();
            ?>
        </ul>
    </div>
</div>


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



<?php get_footer(); ?>