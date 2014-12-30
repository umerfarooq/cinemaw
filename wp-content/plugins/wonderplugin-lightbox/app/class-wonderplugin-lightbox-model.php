<?php 

require_once 'wonderplugin-lightbox-functions.php';

class WonderPlugin_Lightbox_Model {

	private $controller;
	
	function __construct($controller) {
		
		$this->controller = $controller;
	}
	
	function get_upload_path() {
		
		$uploads = wp_upload_dir();
		return $uploads['basedir'] . '/wonderplugin-lightbox/';
	}
	
	function get_upload_url() {
	
		$uploads = wp_upload_dir();
		return $uploads['baseurl'] . '/wonderplugin-lightbox/';
	}
		
	function save_options($options) {
	
		$options['responsive'] = isset($options['responsive']) ? true : false;
		$options['autoplay'] = isset($options['autoplay']) ? true : false;
		$options['html5player'] = isset($options['html5player']) ? true : false;
		$options['showtitle'] = isset($options['showtitle']) ? true : false;
		
		$options['overlaybgcolor'] = trim($options['overlaybgcolor']);
		$options['overlayopacity'] = floatval(trim($options['overlayopacity']));
		$options['bgcolor'] = trim($options['bgcolor']);
		$options['borderradius'] = intval(trim($options['borderradius']));
		
		$options['thumbwidth'] = intval(trim($options['thumbwidth']));
		$options['thumbheight'] = intval(trim($options['thumbheight']));
		$options['thumbtopmargin'] = intval(trim($options['thumbtopmargin']));
		$options['thumbbottommargin'] = intval(trim($options['thumbbottommargin']));
		
		$options['barheight'] = intval(trim($options['barheight']));
		$options['titlebottomcss'] = trim($options['titlebottomcss']);
		
		$options['showdescription'] = isset($options['showdescription']) ? true : false;
		$options['descriptionbottomcss'] = trim($options['descriptionbottomcss']);
		
		update_option( "wonderplugin-lightbox-options", json_encode($options) );
	}
	
	function read_options() {

		$default = array(
				'responsive' => true,
				'autoplay' => true,
				'html5player' => true,
				'overlaybgcolor' => '#000',
				'overlayopacity' => 0.8,
				'bgcolor' => '#FFF',
				'borderradius' => 0,
				'thumbwidth' => 96,
				'thumbheight' => 72,
				'thumbtopmargin' => 12,
				'thumbbottommargin' => 12,
				'barheight' => 48,
				'showtitle' => true,
				'titlebottomcss' => '{color:#333; font-size:14px; font-family:Armata,sans-serif,Arial; overflow:hidden; text-align:left;}',
				'showdescription' => true,
				'descriptionbottomcss' => '{color:#333; font-size:12px; font-family:Arial,Helvetica,sans-serif; overflow:hidden; text-align:left; margin:4px 0px 0px; padding: 0px;}'
			);
		
		$options = json_decode(get_option("wonderplugin-lightbox-options"), true);
		
		if( is_array($options) )
			return array_merge($default, $options);
		else
			return $default;
		
	}
	
	function print_lightbox_options() {
		
		$options = $this->read_options();
		
		$optionsdiv = '<div id="wonderpluginlightbox_options" data-skinsfoldername="skins/default/"  data-jsfolder="' . WONDERPLUGIN_LIGHTBOX_URL . 'engine/"';
		foreach ($options as $key => $value)
		{
			if (is_bool($value))
				$value = $value ? 'true' : 'false';
			$optionsdiv .= ' data-' . $key . '="' . $value . '"';
		}
		$optionsdiv .= ' style="display:none;"></div>';
		if ('F' == 'F')
			$optionsdiv .= '<div class="wonderplugin-engine"><a href="http://www.wonderplugin.com/wordpress-lightbox/" title="'. get_option('wonderplugin-lightbox-engine')  .'">' . get_option('wonderplugin-lightbox-engine') . '</a></div>';
		
		echo $optionsdiv;
	}

}
