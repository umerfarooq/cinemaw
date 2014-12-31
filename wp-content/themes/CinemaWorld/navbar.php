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
        <li><a href="JavaScript:void(0);" class="sunday_popup_open">Sunday See The World</a></li>
        <li><a href="JavaScript:void(0);" class="saturday_popup_open">Saturday Festival Picks</a></li>
        <li><a href="JavaScript:void(0);" class="friday_popup_open">Thriller Friday</a></li>
        <li><a href="<?php echo get_page_link( get_page_by_title('schedule')->ID ); ?>" class="scheduler">Schedules</a></li>
    </ul>
</nav>
