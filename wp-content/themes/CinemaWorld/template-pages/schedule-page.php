<?php
/**
 * Template Name: Schedule Page 
 * Description: Displays schedules.
 *
 * @package WordPress
 * @subpackage CinemaWorld
 */
 get_header(); ?>

 <div class='row content'>
    <div class='col-lg-3 col-lg-offset-1'>
        <?php include (TEMPLATEPATH . '/navbar.php'); ?>  
    </div>

    <div class='col-lg-8'>
      <div class="container-fluid schedule-page">
  <div class="schedule_container" style="float:none">

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
    </div>
</div>
<?php get_footer();?> 
