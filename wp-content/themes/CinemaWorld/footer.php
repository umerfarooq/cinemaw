<footer class="row">
  <div class='col-lg-12'>
    <div class='row'>
      <div class="col-lg-6 col-lg-offset-1">  
        <nav class="nav navbar footer-nav">
          <ul class="nav navbar-nav">
            <li><a href="/">Home</a></li>
            <li><a href="<?php echo get_page_link( get_page_by_title('about page')->ID ); ?>" >About</a></li>
            <li><a href="<?php echo get_page_link( get_page_by_title('subscribe')->ID ); ?>">Subscribe</a></li>
            <li><a href="JavaScript:void(0);">Search</a></li>
            <li id="search_form">
             <?php get_search_form(); ?>
            </li>
          </ul>
        </nav>
      </div>

      <div class="social-icons col-lg-4">
        <nav class="nav navbar pull-right">
          <ul class="nav navbar-nav">
            <li><a href="https://www.facebook.com/cinemaworldasia" alt="CinemaWorld" target="blank"><img src="<?php bloginfo('template_directory'); ?>/bootstrap/img/fb-icon.png"></a></li>
            <li><a href="https://twitter.com/CinemaWorldAsia" alt="CinemaWorld" target="blank"><img src="<?php bloginfo('template_directory'); ?>/bootstrap/img/twitter-icon.png"></a></li>
            <li><a href="http://www.youtube.com/user/CinemaWorldAsia/" alt="CinemaWorld" target="blank"><img src="<?php bloginfo('template_directory'); ?>/bootstrap/img/youtube-icon.png"></a></li>
          </ul>
        </nav>  
      </div>
    </div>

    <div class='row'>
      <div class="col-lg-4 col-lg-offset-7">
        <nav class="nav navbar pull-right">  
          <ul id="footer_nav2" class="nav navbar-nav">
            <li><a class="copy-right">Copyright &copy; 2014 CinemaWorld</a></li>
            <li><a href="<?php echo get_permalink( get_page_by_path( 'privacy-policy-page' ) );?>" class="load_post static-page">Privacy Policy</a></li>
            <li><a href="<?php echo get_permalink( get_page_by_path( 'terms-of-use-page' ) );?>" class="load_post static-page" >Terms of Use</a></li>
            <li><a href="<?php echo get_permalink( get_page_by_path( 'contact-us-page' ) );?>" class="load_post static-page">Contact Us</a></li>  
          </ul>
        </nav>  
      </div>
    </div>
  </div>
</footer>
<?php include (TEMPLATEPATH . '/template-pages/static-page.php'); ?>  
<?php wp_footer(); ?>
</div> <!-- /container -->
<div class="popup light" id="movie_detail">
  <div class="detail"></div> 
</div>
<script type="text/javascript">
  $.backstretch("<?php the_field('image_url', get_page_by_path('home')->ID);?>"); 
</script>
</body>
</html>
