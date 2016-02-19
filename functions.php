<?php



add_action('add_meta_boxes', 'lpc_admin_page_colors');

function lpc_admin_page_colors()
{
	add_meta_box('lpc-page-colors', 'Adjust Page Colors', 'lpc_admin_page_colors_mb', 'page', 'normal', 'high');	
}

function lpc_admin_page_colors_mb()
{
	// TODO dont use the framework, just use html and plaintext
	//define('NHP_OPTIONS_URL', site_url('path the options folder'));
	if(!class_exists('NHP_Options')){
		require_once( CT_THEME_LIB_DIR.'/options/options.php' );
	}

	// render the MB
	$section = array();	
	$sections[] = array(
				'title' => 'Page Colors',
				'fields' => array(
					array(
						'id' => '1',
						'type' => 'color',
						'title' => 'Navbar Base Color', 
						'std' => '#FFFFFF'
						),
				)
				);


	$tabs = array();
			
	if (function_exists('wp_get_theme')){
		$theme_data = wp_get_theme();
		$theme_uri = $theme_data->get('ThemeURI');
		$description = $theme_data->get('Description');
		$author = $theme_data->get('Author');
		$version = $theme_data->get('Version');
		$tags = $theme_data->get('Tags');
	}else{
		$theme_data = get_theme_data(trailingslashit(get_stylesheet_directory()).'style.css');
		$theme_uri = $theme_data['URI'];
		$description = $theme_data['Description'];
		$author = $theme_data['Author'];
		$version = $theme_data['Version'];
		$tags = $theme_data['Tags'];
	}	

	$theme_info = '<div class="nhp-opts-section-desc">';
	$theme_info .= '<p class="nhp-opts-theme-data description theme-uri">'.__('<strong>Theme URL:</strong> ', 'nhp-opts').'<a href="'.$theme_uri.'" target="_blank">'.$theme_uri.'</a></p>';
	$theme_info .= '<p class="nhp-opts-theme-data description theme-author">'.__('<strong>Author:</strong> ', 'nhp-opts').$author.'</p>';
	$theme_info .= '<p class="nhp-opts-theme-data description theme-version">'.__('<strong>Version:</strong> ', 'nhp-opts').$version.'</p>';
	$theme_info .= '<p class="nhp-opts-theme-data description theme-description">'.$description.'</p>';
	$theme_info .= '<p class="nhp-opts-theme-data description theme-tags">'.__('<strong>Tags:</strong> ', 'nhp-opts').implode(', ', $tags).'</p>';
	$theme_info .= '</div>';



	$tabs['theme_info'] = array(
					'icon' => NHP_OPTIONS_URL.'img/glyphicons/glyphicons_195_circle_info.png',
					'title' => __('Theme Information', 'nhp-opts'),
					'content' => $theme_info
					);
	
	if(file_exists(trailingslashit(get_stylesheet_directory()).'README.html')){
		$tabs['theme_docs'] = array(
						'icon' => NHP_OPTIONS_URL.'img/glyphicons/glyphicons_071_book.png',
						'title' => __('Documentation', 'nhp-opts'),
						'content' => nl2br(file_get_contents(trailingslashit(get_stylesheet_directory()).'README.html'))
						);
	}//if
	global $NHP_Options;
	$NHP_Options = new NHP_Options($sections, array(), array());
}

/* consts */
define('LPC_HEAD_TOP_NAVBAR_BASE', 'lpc-head-top-navbar-base');
define('LPC_HEAD_TOP_NAVBAR_HEADER_TEXT', 'lpc-head-top-navbar-header-text');
define('LPC_HEAD_TOP_NAVBAR_LINK_BASE', 'lpc-head-top-navbar-link-base');
define('LPC_HEAD_TOP_NAVBAR_LINK_TEXT', 'lpc-head-top-navbar-link-text');
