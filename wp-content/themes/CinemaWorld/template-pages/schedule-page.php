<?php
/**
 * Template Name: Schedule Page 
 * Description: Displays schedules.
 *
 * @package WordPress
 * @subpackage CinemaWorld
 */
 get_header(); ?>

 <div class='row'>
    <div class='col-lg-11 col-lg-offset-1 content'>
        <?php include (TEMPLATEPATH . '/navbar.php'); ?>  
    </div>
</div>

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
      // $querystr = "
      //     SELECT wp_posts.ID, week(str_to_date(wp_postmeta.meta_value, '%d/%m/%Y')) AS week
      //     FROM wp_posts, wp_postmeta 
      //     WHERE wp_posts.ID = wp_postmeta.post_id 
      //     AND wp_postmeta.meta_key = 'movie_date'
      //     AND wp_posts.post_status = 'publish'
      //     AND wp_posts.post_type = 'post'
      //     AND year(str_to_date(wp_postmeta.meta_value, '%d/%m/%Y')) = year(curdate())
      //     AND week(str_to_date(wp_postmeta.meta_value, '%d/%m/%Y')) = 0
      //     ORDER BY str_to_date(wp_postmeta.meta_value, '%d/%m/%Y') ASC
      // ";

      // $movies = $wpdb->get_results($querystr, OBJECT);

      // if($movies) {
      //   $querystr = "
      //     SELECT wp_postmeta.movie_time, wp_postmeta.movie_title, wp_postmeta.movie_date
      //     FROM wp_posts, wp_postmeta 
      //     WHERE wp_posts.ID = wp_postmeta.post_id 
      //     AND wp_postmeta.meta_key = 'movie_date'
      //     AND wp_posts.post_status = 'publish'
      //     AND wp_posts.post_type = 'post'
      //     AND year(str_to_date(wp_postmeta.meta_value, '%d/%m/%Y')) = year(curdate())
      //     AND week(str_to_date(wp_postmeta.meta_value, '%d/%m/%Y')) = 0
      //     ORDER BY str_to_date(wp_postmeta.meta_value, '%d/%m/%Y') ASC
      // ";
      // }

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
            'value' => '02/01/2015'
          )
        )
      );
      

// query
$wp_query = new WP_Query( $args );

      // print_r($wp_query);

      // loop
while( $wp_query->have_posts() )
{
  $wp_query->the_post();

  the_field('movie_time');
}

      ?>


  	<div class="schedule_week">
      <a href="#" class="btn_week selected"><span>This Week</span>
        <div class="schedule_left">
          <ul class="schedule_date">
            <li class="selected"><a id="week_day" href="#">12 Jan 2015 Mon</a>
              <div class="schedule_right" >
                <div class="schedule_timetable">
                  <table width="100%" cellpadding="0" border="0">
                    <tbody>
                      <tr>
                        <td class="columnOdd"> 6.35am</td>
                        <td class="columnEven"><a class="title ajaxContent cboxElement" href="/videos/5906">Kite Adrift</a></td>
                      </tr>
                      <tr class="even">
                        <td class="columnOdd"> 7.55am</td>
                        <td class="columnEven"><a class="title ajaxContent cboxElement" href="/videos/5592">Summer</a></td>
                      </tr>
                      <tr>
                        <td class="columnOdd"> 7.55am</td>
                        <td class="columnEven"><a class="title ajaxContent cboxElement" href="/videos/5592">Summer</a></td>
                      </tr>
                      <tr class="even">
                        <td class="columnOdd"> 7.55am</td>
                        <td class="columnEven"><a class="title ajaxContent cboxElement" href="/videos/5592">Summer</a></td>
                      </tr>
                      <tr>
                        <!--<td colspan="2" class="singlecolumn">Schedule is not available for this date.</td>--> <!-- this line will be displayed on condition if there is no event on this date -->
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </li>
            <li><a id="week_day" href="#">13 Jan 2015 Tue</a>
              <div id="schedule_right" class="schedule_right hide" >
                <div class="schedule_timetable">
                  <table width="100%" cellpadding="0" border="0">
                    <tbody>
                      <tr>
                        <td class="columnOdd"> 6.35am</td>
                        <td class="columnEven"><a class="title ajaxContent cboxElement" href="/videos/5906">Kite Adrift</a></td>
                      </tr>
                      <tr class="even">
                        <td class="columnOdd"> 7.55am</td>
                        <td class="columnEven"><a class="title ajaxContent cboxElement" href="/videos/5592">Summer</a></td>
                      </tr>
                      <tr>
                        <td class="columnOdd"> 7.55am</td>
                        <td class="columnEven"><a class="title ajaxContent cboxElement" href="/videos/5592">Summer</a></td>
                      </tr>
                      <tr class="even">
                        <td class="columnOdd"> 7.55am</td>
                        <td class="columnEven"><a class="title ajaxContent cboxElement" href="/videos/5592">Summer</a></td>
                      </tr>
                      <tr>
                        <td colspan="2" class="singlecolumn">Schedule is not available for this date.</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </li>
            <li><a href="JavaScript:void(0);">14 Jan 2015 Wed</a> </li>
            <li><a href="JavaScript:void(0);">15 Jan 2015 Thu</a> </li>
            <li><a href="JavaScript:void(0);">16 Jan 2015 Fri</a> </li>
            <li><a href="JavaScript:void(0);">17 Jan 2015 Sat</a> </li>
            <li><a href="JavaScript:void(0);">18 Jan 2015 Sun</a> </li>
          </ul>
        </div>
      </a> &nbsp;
      <a href="JavaScript:void(0);" class="btn_week"><span>+1</span></a> &nbsp;
      <a href="JavaScript:void(0);" class="btn_week"><span>+2</span></a> &nbsp;
      <a href="JavaScript:void(0);" class="btn_week"><span>+3</span></a> &nbsp;
    </div>
    
  </div>
</div>

<?php get_footer();?> 