<?php
/**
 * Name: Navbar 
 * Description: main navbar
 *
 * @package WordPress
 * @subpackage CinemaWorld
 */
?>

<nav class="nav navbar-vertical main-nav">
    <ul>
    	<li><a href="<?php echo get_permalink( get_page_by_path( 'sunday-see-the-world' ) );?>" class="load_post nav-link">Sunday See The World</a></li>
      <li><a href="<?php echo get_permalink( get_page_by_path( 'saturday-festival-picks' ) );?>" class="load_post nav-link">Saturday Festival Picks</a></li>
      <li><a href="<?php echo get_permalink( get_page_by_path( 'thriller-friday' ) );?>" class="load_post nav-link">Thriller Friday</a></li>
      <li><a href="<?php echo get_page_link( get_page_by_path( 'schedule' )->ID ); ?>" class="scheduler">Schedules</a></li>
    </ul>
</nav>
