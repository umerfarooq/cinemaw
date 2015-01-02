
<?php
/**
 * Description: Default Index template to display loop of blog posts
 *
 * @package WordPress
 * @subpackage CinemaWorld
 */
?>
<?php get_header(); ?>

<div class='row content'>
    <div class='col-lg-3 col-lg-offset-1 '>
        <?php include (TEMPLATEPATH . '/navbar.php'); ?>  
    </div>

    <div class='col-lg-5 col-lg-offset-2' id='custom-caption'>

    </div>
</div>

<div class='row'>
    <div class='col-lg-10 col-lg-offset-1'>
        <div id="thumbnails" class="owl-carousel owl-theme">
            <?php
                $args = array(
                    'category_name' => 'movies',
                    'posts_per_page' => -1,
                    'meta_query' => array(
                        array(
                            'key' => 'movie_image',
                            'value' => '',
                            'compare' => '!='
                        )
                    )
                );
                // The Query
                $query = new WP_Query( $args );
                // Array of Background Images
                $images = array();
                $imageIndex = 0;

                if ( $query->have_posts() ) {
                // The Loop
                while ( $query->have_posts() ) { 
                    $query->the_post();
                    ?>
                    
                    <?php $images[] = "'".get_field('movie_image')."'"; ?>
                    
                    <div class='item'><a class="thumb" data-id="<?php echo $imageIndex; ?>" data-post-url="<?php the_permalink(); ?>" href="JavaScript:void(0);"><img src="<?php the_field('movie_image'); ?>" /></a></div>
                <?php 
                    $imageIndex++;
                    }
                }
                // Reset Query
                wp_reset_postdata();
                $images = implode(", ", $images);
            ?>
        </div>
        
        <script type="text/javascript">
            jQuery(document).ready(function($){
                $.backstretch([<?php echo $images; ?>], {duration: 40000000});

                $(window).on("backstretch.after", function (e, instance, index) {
                    var post_url = $('.item').find('[data-id="'+index+'"]').attr('data-post-url');

                    $.post(post_url, {post_caption: 1}, function(data) {
                        $('#custom-caption').html(data);
                    });
                });
            });
        </script>  
    </div>  
</div>

<?php get_footer(); ?>