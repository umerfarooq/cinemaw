    
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
    <div class='col-lg-3 col-lg-offset-1 '>
        <?php include (TEMPLATEPATH . '/navbar.php'); ?>  
    </div>
</div>

<div class='row'>
    <div class='col-lg-4 col-lg-offset-7' id='custom-caption'></div>
</div>

<div class='row thumb-nav'>
    <div class='col-lg-10 col-lg-offset-1'>
        <div id="thumbnails" class="owl-carousel owl-theme">
            <?php
            $args = array(
                'category_name' => 'home',
                'posts_per_page' => -1,
                'post_status' => 'publish',
                'post_type' => 'post',
                'orderby'   => 'menu_order',
                'order'     => 'ASC',
                'meta_query' => array(
                        'relation' => 'OR', // Optional, defaults to "AND"
                        array(
                            'key' => 'thumbnail_file',
                            'value' => '',
                            'compare' => '!='
                            ),
                        array(
                            'key' => 'thumbnail_url',
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
                    
                    <?php 
                    $source = get_field('thumbnail_image_source');
                    if( $source == 'file') {
                        $quoted_image = "'".get_field('movie_image_file')."'";
                        $image = get_field('thumbnail_file');                            
                    } else {
                        $quoted_image = "'".get_field('movie_image_url')."'"; 
                        $image = get_field('thumbnail_url');
                    }   

                    $images[] = $quoted_image;                     
                    ?>
                    
                    <div class='item'><a class="thumb" data-id="<?php echo $imageIndex; ?>" data-post-url="<?php the_permalink(); ?>" href="JavaScript:void(0);"><img class="lazyOwl" data-src="<?php echo $image; ?>" /></a></div>
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

                // Array of images
                var MyImageArray = [<?php echo $images; ?>];

                // You can preload the first image
                var o = MyImageArray[0], u = new Image;
                u.onerror=function(){
                    console.log("error with loading image");
                };
                u.onload=function(){
                     // Start the slideshow passing only the first image
                     $.backstretch(
                       [MyImageArray[0]], 
                       { duration: 40000000}
                       );
                     // now we can push more images right before they should appear
                     var slider = $("body").data("backstretch");
                     var imgCount = 0;
                     var timer = setInterval(function(){
                        ++imgCount;
                        if(imgCount === (MyImageArray.length-1)) clearInterval(timer);
                        slider.images.push(MyImageArray[imgCount]);
                    },1000);
                 };
                 u.src=o;

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