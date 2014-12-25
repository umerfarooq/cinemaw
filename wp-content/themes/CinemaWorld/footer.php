    

     <script type="text/javascript"> onload="initLightbox()"
            $(document).ready(function() {

              // Initialize the plugin
              $('#subscribe_page').popup();
              
              $('#about_page').popup();

              $('#privacy_policy').popup();
              $('#terms_of_use').popup();
              $('#contact_us').popup();
            });
        </script>
        <footer>
           
               <div class="row-fluid">
                   <!--  <div id="my_popup1" class="container-fluid">
                        
                        <?php $recent = new WP_Query("page_id=2"); while($recent->have_posts()) : $recent->the_post();?>
                        <?php the_title(); ?>
                        <?php the_content(); ?>
                        <?php endwhile; ?>
                        <p><a class="tb-close-icon my_popup1_close"></a></p>
                    </div> -->
                    <nav class="navbar navbar-nav footer-nav span9">
                          <ul class="nav navbar-nav">
                            <li><a href="#">Home</a></li>
                            <li><a href="#" class="about_page_open" >About</a></li>
                            <li><a href="#" class="subscribe_page_open">Subscribe</a></li>
                            <li><a href="#">Search</a></li>
                            <li id="search_form">
                                 <?php
                                  get_search_form(); 
                                    //if (function_exists('dynamic_sidebar')) {
                                        // dynamic_sidebar("footer-content");
                                    //}; end; ?>
                            </li>
                          </ul>
                    </nav>
                    <div class="social-icons span3">
                      <ul>
                        <li><a href="https://www.facebook.com/cinemaworldasia" alt="CinemaWorld" target="blank"><img src="<?php bloginfo('template_directory'); ?>/bootstrap/img/fb-icon.png"></a></li>
                        <li><a href="https://twitter.com/CinemaWorldAsia" alt="CinemaWorld" target="blank"><img src="<?php bloginfo('template_directory'); ?>/bootstrap/img/twitter-icon.png"></a></li>
                        <li><a href="http://www.youtube.com/user/CinemaWorldAsia/" alt="CinemaWorld" target="blank"><img src="<?php bloginfo('template_directory'); ?>/bootstrap/img/youtube-icon.png"></a></li>
                      </ul>
                      
                    </div>
                   
                    <!-- <nav class="navbar navbar-nav footer nav footer-nav2 copy-right offset7">
                          <ul class="nav navbar-nav">
                            <li><a>&copy;CinemaWorld</a></li>
                            <li><a href="#" class="privacy_policy_open">Privacy Policy</a></li>
                            <li><a href="#" class="terms_of_use_open" >Terms of Use</a></li>
                            <li><a href="#" class="contact_us_open">Contact Us</a></li>
                          </ul>
                    </nav> -->
                    <div class="nav navbar footer-nav2 offset7 span5">
                      <ul id="footer_nav2" class="nav navbar">
                        <li><a>&copy;CinemaWorld</a></li>
                        <li><a href="#" class="privacy_policy_open">Privacy Policy</a></li>
                        <li><a href="#" class="terms_of_use_open" >Terms of Use</a></li>
                        <li><a href="#" class="contact_us_open">Contact Us</a></li>
                      </ul>
                    </div>
                </div>
        </footer>
    </div> <!-- /container -->

    <?php wp_footer(); ?>
  </body>
</html>