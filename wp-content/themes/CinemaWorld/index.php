
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

    <!-- <div class='custom-caption'>
                        
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

    </div>  
     -->
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
                    
                    <div class='item'><a class="thumb" data-id="<?php echo $imageIndex; ?>" href="#"><img src="<?php the_field('movie_image'); ?>" /></a></div>
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
                    // $.post(link.attr("href"), {post_expander: 1}, function(data) {
                    //     // link.parents(".entry").html($(data));
                    //     $(".detail").html($(data));
                    //     $("#movie_detail").popup('show');
                    // }
                });
            });
        </script>  
    </div>  
</div>

<?php get_footer(); ?>