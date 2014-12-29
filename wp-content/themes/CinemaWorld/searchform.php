<?php
/*
* Search Form
*
@package WordPress
@subpackage CinemaWorld
*/
?>

<div class="search-box">
<form method="get" id="searchform" action="<?php echo home_url() ; ?>/">
	<input id="search_form_field" type="text" value="<?php echo esc_html($s, 1); ?>" name="s" id="s" maxlength="33" />
	<input type="image" src="<?php bloginfo('template_directory'); ?>/bootstrap/img/search-icon.png"  id="search_image" value=""/>
</form>
</div>