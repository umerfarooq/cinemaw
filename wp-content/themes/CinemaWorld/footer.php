        <footer class="row-fluid">

                      <div class="col-lg-6 col-lg-offset-1">  
                        <nav class="nav navbar footer-nav">
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

                        <div class="col-lg-4 col-lg-offset-7">
                          <nav class="nav navbar pull-right">  
                            <ul id="footer_nav2" class="nav navbar-nav">
                              <li><a>&copy;CinemaWorld</a></li>
                              <li><a href="#" class="privacy_policy_open">Privacy Policy</a></li>
                              <li><a href="#" class="terms_of_use_open" >Terms of Use</a></li>
                              <li><a href="#" class="contact_us_open">Contact Us</a></li>
                            </ul>
                          </nav>  
                        </div>
            </footer>

          <?php include (TEMPLATEPATH . '/template-pages/static-page.php'); ?>  
          <?php wp_footer(); ?>
          </div> <!-- /container -->
        </body>
        </html>