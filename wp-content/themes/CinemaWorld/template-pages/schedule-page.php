<?php
/**
 * Template Name: Schedule Page 
 * Description: Displays schedules.
 *
 * @package WordPress
 * @subpackage CinemaWorld
 */
 get_header(); ?>
<script type="text/javascript">
  $(document).ready(function(){
    $('#week_day').click(function(){
      // alert('hi');
      $('#shedule_right').show();      
    });
  });
</script>
<div class="container-fluid schedule-page">
  <div class="schedule_container" style="float:none">
      
    <?php 
      // Build a custom query to get posts from future dates.
      $querystr = "
          SELECT wp_posts.ID, week(str_to_date(wp_postmeta.meta_value, '%d/%m/%Y')) AS week
          FROM wp_posts, wp_postmeta 
          WHERE wp_posts.ID = wp_postmeta.post_id 
          AND wp_postmeta.meta_key = 'movie_date'
          AND wp_posts.post_status = 'publish'
          AND wp_posts.post_type = 'post'
          AND year(str_to_date(wp_postmeta.meta_value, '%d/%m/%Y')) = year(curdate())
          AND week(str_to_date(wp_postmeta.meta_value, '%d/%m/%Y')) = 0
          ORDER BY str_to_date(wp_postmeta.meta_value, '%d/%m/%Y') ASC
      ";

      $movies = $wpdb->get_results($querystr, OBJECT);

      if($movies) {
        $querystr = "
          SELECT wp_postmeta.movie_time, wp_postmeta.movie_title, wp_postmeta.movie_date
          FROM wp_posts, wp_postmeta 
          WHERE wp_posts.ID = wp_postmeta.post_id 
          AND wp_postmeta.meta_key = 'movie_date'
          AND wp_posts.post_status = 'publish'
          AND wp_posts.post_type = 'post'
          AND year(str_to_date(wp_postmeta.meta_value, '%d/%m/%Y')) = year(curdate())
          AND week(str_to_date(wp_postmeta.meta_value, '%d/%m/%Y')) = 0
          ORDER BY str_to_date(wp_postmeta.meta_value, '%d/%m/%Y') ASC
      ";
      }
      // print_r($movies);
      ?>


  	<div class="schedule_week">
      <div class="btn_week selected"><span>This Week</span>
        <div class="schedule_left">
          <ul class="schedule_date">
            <?php $weekModifier = 0;
              $date = new DateTime();
              if($date->format('N') !== 1) {
                  $date->sub(new DateInterval('P'. $date->format('N') . 'D'));
              }
              $interval = new DateInterval('P'.abs($weekModifier).'W');
              if($weekModifier > 0) {
                  $date->add($interval);  
              } else {
                  $date->sub($interval);  
              }
              for($i = 1; $i <= 7; $i++) { ?>
                <?php $day = $date->add(new DateInterval('P1D'))->format('Y-m-d D') ; ?>
                
                <li class="<?php echo ($day == date('Y-m-d D')) ? 'selected' : '' ?>"><a class="load_post date-link" data-date="<?php echo $date->format('d/m/Y'); ?>" href="<?php echo get_permalink(get_page_by_title('schedule')); ?>"><?php echo $day; ?></a></li>
                

              <?php }
              ?>
          </ul>
        </div>
      </div> &nbsp;
      <div class="btn_week"><span>+1</span>
        <div class="schedule_left hide">
          <ul class="schedule_date">
            <?php $weekModifier = 1;
              $date = new DateTime();
              if($date->format('N') !== 1) {
                  $date->sub(new DateInterval('P'. $date->format('N') . 'D'));
              }
              $interval = new DateInterval('P'.abs($weekModifier).'W');
              if($weekModifier > 0) {
                  $date->add($interval);  
              } else {
                  $date->sub($interval);  
              }
              for($i = 1; $i <= 7; $i++) { ?>
                <?php $day = $date->add(new DateInterval('P1D'))->format('Y-m-d D') ; ?>
                <li class="<?php echo ($day == date('Y-m-d D')) ? 'selected' : '' ?>"><a class="load_post" data-date="<?php echo substr($day,0,10) ;?>" href="<?php echo get_permalink( get_page_by_path( 'schedule' ) );?>"><?php echo $day; ?></a></li>
              <?php }
              ?>
          </ul>
        </div>
      </div> &nbsp;
      <div class="btn_week"><span>+2</span>
        <div class="schedule_left hide">
          <ul class="schedule_date">
            <?php $weekModifier = 2;
              $date = new DateTime();
              if($date->format('N') !== 1) {
                  $date->sub(new DateInterval('P'. $date->format('N') . 'D'));
              }
              $interval = new DateInterval('P'.abs($weekModifier).'W');
              if($weekModifier > 0) {
                  $date->add($interval);  
              } else {
                  $date->sub($interval);  
              }
              for($i = 1; $i <= 7; $i++) { ?>
                <?php $day = $date->add(new DateInterval('P1D'))->format('Y-m-d D') ; ?>
                <li class="<?php echo ($day == date('Y-m-d D')) ? 'selected' : '' ?>"><a class="load_post" data-date="<?php echo substr($day,0,10) ;?>" href="<?php echo get_permalink( get_page_by_path( 'schedule' ) );?>"><?php echo $day; ?></a></li>
              <?php }
              ?>
          </ul>
        </div>
      </div> &nbsp;
      <div class="btn_week"><span>+3</span>
        <div class="schedule_left hide">
          <ul class="schedule_date">
            <?php $weekModifier = 3;
              $date = new DateTime();
              if($date->format('N') !== 1) {
                  $date->sub(new DateInterval('P'. $date->format('N') . 'D'));
              }
              $interval = new DateInterval('P'.abs($weekModifier).'W');
              if($weekModifier > 0) {
                  $date->add($interval);  
              } else {
                  $date->sub($interval);  
              }
              for($i = 1; $i <= 7; $i++) { ?>
                <?php $day = $date->add(new DateInterval('P1D'))->format('Y-m-d D') ; ?>
                <li class="<?php echo ($day == date('Y-m-d D')) ? 'selected' : '' ?>"><a class="load_post" data-date="<?php echo substr($day,0,10) ;?>" href="<?php echo get_permalink( get_page_by_title( 'schedule' ) );?>"><?php echo $day; ?></a></li>
              <?php }
              ?>
          </ul>
        </div>
      </div> &nbsp;
    </div>

    

    <div class="schedule_right" >
      <div class="schedule_timetable">
        <table class="table-striped" width="100%" cellpadding="0" border="0">
        <?php

          $args = array(
          'post_type'   => 'post',
          'category_name' => 'movies',
          'post_status' => 'publish',
          'posts_per_page'  => -1,
          'meta_key'    => 'movie_time',
          'orderby'   => 'meta_value_num',
          'order'     => 'ASC',
          'meta_query' => array(
            array(
              'key' => 'movie_date',
              'value' => date('d/m/Y')
            )
          )
        );

      // query
        $wp_query = new WP_Query( $args );?>
        <tbody>
          <?php
          while( $wp_query->have_posts() )
          {
            $wp_query->the_post();
          ?>
          <tr>

            <td class="columnOdd"> <?php the_field('movie_time'); ?></td>
            <td class="columnEven"><a class="title ajaxContent cboxElement load_post" href="<?php echo the_permalink();?>"><?php the_title();?></a></td>
          </tr>
          <?php }?>
          </tbody>
        </table>
      </div>
    </div>  
  </div>
</div>


<?php include (TEMPLATEPATH . '/navbar.php'); ?>  

<?php get_footer();?> 