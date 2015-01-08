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

    <div class='col-lg-8 schedule-container'>
      <div class="row">
        <div class="schedule_week col-md-8 col-lg-offset-4">
          <div class="btn_week selected" data-week-number="1"><span>This Week</span></div>
          <div class="btn_week" data-week-number="2"><span>+1</span></div>
          <div class="btn_week" data-week-number="3"><span>+2</span></div>
          <div class="btn_week" data-week-number="4"><span>+3</span></div>
        </div>
      </div>

      <div class="row">
        <div class="schedule_left col-md-3">
          <ul class="schedule_date">
          <?php
            $aDates = array();
            // $first_date = date('Y-m-01',strtotime('this month'));
            $first_date = date('Y-m-d', strtotime('last monday', strtotime('tomorrow')));

            $oStart = new DateTime($first_date);
            $oEnd = clone $oStart;
            $oEnd->add(new DateInterval("P1M"));

            while($oStart->getTimestamp() < $oEnd->getTimestamp()) {
              $aDates[] = $oStart->format('d M Y D');
              $oStart->add(new DateInterval("P1D"));
            }

            $week_number = 1;
            for ($i=0; $i < date('t'); $i++) { 
              if( (($week_number*7)-1) < $i ) {
                $week_number++;
              } 
              
            ?>
              <li class="<?php echo ( ($week_number == 1) ? 'show' : 'hide'); ?> <?php echo ($aDates[$i] == date('Y-m-d D')) ? 'selected' : '' ?>" data-week-number="<?php echo $week_number; ?>">
                <a class="load_post date-link" data-date="<?php echo date('d/m/Y' ,strtotime(substr($aDates[$i],0,10))); ?>" href="<?php echo get_permalink(get_page_by_title('schedule')); ?>">
                  <?php print $aDates[$i].'<br>';?>
                </a>
              </li>
            <?php
            }
            ?>
          </ul>
        </div>
        <div class="schedule_right col-md-9" >
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
              if( $wp_query->have_posts() ) {
                while( $wp_query->have_posts() ) {
                  $wp_query->the_post();
                ?>
                <tr>

                  <td class="columnOdd"> <?php the_field('movie_time'); ?></td>
                  <td class="columnEven"><a class="title ajaxContent cboxElement load_post" href="<?php echo the_permalink();?>"><?php the_title();?></a></td>
                </tr>
              <?php 
                }
              } else { ?>
                <tr>
                  <td class="notice"> <?php the_field('notice'); ?></td>
                </tr>
              <?php }
              ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>      
  </div>
</div>
<?php get_footer();?> 
