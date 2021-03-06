<?php
/**
 * Search Results Template
 *
 * @package WordPress
 * @subpackage BootstrapWP
 */
get_header(); ?>
<div class="row">
    <div class="col-lg-2 col-lg-offset-1">
        <img src="<?php bloginfo('template_directory'); ?>/bootstrap/img/title-movies.png" class='img-responsive'>
    </div>
</div>
    
<div class="row content">
    <?php  $allsearch = &new WP_Query("s=$s&showposts=-1&category_name=movies&post_status=publish");?>
    <!-- LIST RESULTS -->
    <?php if ($allsearch->have_posts()) : ?>
    
        <?php
        $array = array();
        $key = wp_specialchars($s, 1);
        // $count = $allsearch->post_count; 
        _e('<div class="col-lg-11 col-lg-offset-1 result-notice"><h2>');
        _e('Showing results for ');
        _e('"');
        echo $key;
        _e('"'); 
        _e(' &mdash; found <p>ad</p>'); 
        _e('movies</h2></div>');
        ?>

        <div class="col-lg-11 col-lg-offset-1 ">
            <div class='row'>
                <?php while ($allsearch->have_posts()) : $allsearch->the_post(); 
                  $wp_query->the_post();
                  $title = get_the_title();
          
                  if(!in_array($title, $array)) {  
                    $source = get_field('movie_image_source');
                    if( $source == 'file') {
                        $image = get_field('movie_image_file');                            
                    } else {
                        $image = get_field('movie_image_url');
                    }  

                    if(empty($image)){
                        $source = get_field('thumbnail_image_source');
                        if( $source == 'file') {
                            $image = get_field('thumbnail_file');                            
                        } else {
                            $image = get_field('thumbnail_url');
                        }   
                    } 

                    if(empty($image)){
                        $source = get_field('popup_image_source');
                        if( $source == 'file') {
                            $image = get_field('popup_image_file');                            
                        } else {
                            $image = get_field('popup_image_url');
                        }   
                    } 
                ?>
              
                    <div class="col-sm-6 col-md-3 col-lg-2 result-item">
                        <div class="thumbnail">                    
                            <a href="<?php the_permalink(); ?>" title="<?php the_title();?>" class="load_post">
                                <img src="<?php echo $image; ?>" class='img-responsive responsive_img' >
                                <div class="caption">
                                    <?php $title = get_the_title(); ?>
                                    <?php $original_title = get_field('movie_original_title');?>

                                    <?php if(empty($original_title)): ?>
                                        <?php echo substr($title, 0, 50); ?>
                                    <?php else: ?>
                                        <?php echo substr($title.' ('.$original_title.')', 0,50) ?>
                                    <?php endif; ?>
                                </div>
                            </a>
                        </div>                
                    </div>
                  <?php $array[]= $title; $count++; } ?>
                <?php endwhile;wp_reset_query(); ?>
            </div>
        </div>
    <?php else: ?> 
        <!-- 404 SEARCH -->
        <div class="search-fail col-lg-11 col-lg-offset-1">
            <?php _e("<p>Oops... We couldn't find what you were searching for. Please try again</p>"); ?>
        </div>
        <!-- / 404 SEARCH -->
    <?php endif; ?>   

</div>
<script type="text/javascript">
  var p=$('.result-notice').find('p');
  p.html("<?php echo $count,' ';?>");
</script>
 
<?php get_footer(); ?>