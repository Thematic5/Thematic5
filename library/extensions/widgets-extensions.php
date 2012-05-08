<?php

/**
 * Widgets Extensions
 *
 * @package ThematicCoreLibrary
 * @subpackage WidgetsExtensions
 */


/**
 * Displays a filterable Search Form
 *
 * This function is called from the searchform.php template. 
 * That template is called by the WP function get_search_form()
 *
 * Filter: search_field_value Controls the input element's size attribute <br>
 * Filter: thematic5_search_submit Controls the form's "submit" input element <br>
 * Filters: thematic5_search_form Controls the entire from output just before display <br>
 *
 * @see Thematic_Widget_Search
 * @link http://codex.wordpress.org/Function_Reference/get_search_form Codex: get_search_form()
 */
function thematic5_search_form() {
	$search_form_length = apply_filters('thematic5_search_form_length', '32');
	$search_form  = "\n\t\t\t\t\t\t";
	$search_form .= '<form id="searchform" method="get" action="' . home_url() .'/">';
	$search_form .= "\n\n\t\t\t\t\t\t\t";
	$search_form .= '<div>';
	$search_form .= "\n\t\t\t\t\t\t\t\t";
	if (is_search()) {
	    	$search_form .= '<input id="s" name="s" type="text" value="' . esc_html ( stripslashes( $_GET['s'] ) ) .'" size="' . $search_form_length . '" tabindex="1" />';
	} else {
	    	$value = __( 'To search, type and hit enter', 'thematic5' );
	    	$value = apply_filters( 'search_field_value',$value );
	    	$search_form .= '<input id="s" name="s" type="text" value="' . $value . '" onfocus="if (this.value == \'' . $value . '\') {this.value = \'\';}" onblur="if (this.value == \'\') {this.value = \'' . $value . '\';}" size="'. $search_form_length .'" tabindex="1" />';
	}
	$search_form .= "\n\n\t\t\t\t\t\t\t\t";
	
	$search_submit = '<input id="searchsubmit" name="searchsubmit" type="submit" value="' . __('Search', 'thematic5') . '" tabindex="2" />';
	
	$search_form .= apply_filters('thematic5_search_submit', $search_submit);
	
	$search_form .= "\n\t\t\t\t\t\t\t";
	$search_form .= '</div>';
	
	$search_form .= "\n\n\t\t\t\t\t\t";
	$search_form .= '</form>' . "\n\n\t\t\t\t\t";
	
	echo apply_filters('thematic5_search_form', $search_form);
}

/**
 * Defines the array for creating and displaying the widgetized areas
 * in the WP-Admin and front-end of the site.
 * 
 * Filter: thematic5_widgetized_areas
 *
 * @uses thematic5_before_widget()
 * @uses thematic5_after_widget()
 * @uses thematic5_before_title()
 * @uses thematic5_after_title()
 * @return array
 */
function thematic5_widgets_array() {
	$thematic5_widgetized_areas = array(
		'Primary Aside' => array(
			'admin_menu_order' => 100,
			'args' => array (
				'name' => 'Primary Aside',
				'id' => 'primary-aside',
                'description' => __('The primary widget area, most often used as a sidebar.', 'thematic5'),
				'before_widget' => thematic5_before_widget(),
				'after_widget' => thematic5_after_widget(),
				'before_title' => thematic5_before_title(),
				'after_title' => thematic5_after_title(),
				),
			'action_hook'	=> 'widget_area_primary_aside',
			'function'		=> 'thematic5_primary_aside',
			'priority'		=> 10,
			),
		'Secondary Aside' => array(
			'admin_menu_order' => 200,
			'args' => array (
				'name' => 'Secondary Aside',
				'id' => 'secondary-aside',
                'description' => __('The secondary widget area, most often used as a sidebar.', 'thematic5'),
				'before_widget' => thematic5_before_widget(),
				'after_widget' => thematic5_after_widget(),
				'before_title' => thematic5_before_title(),
				'after_title' => thematic5_after_title(),
				),
			'action_hook'	=> 'widget_area_secondary_aside',
			'function'		=> 'thematic5_secondary_aside',
			'priority'		=> 10,
			),
		'1st Subsidiary Aside' => array(
			'admin_menu_order' => 300,
			'args' => array (
				'name' => '1st Subsidiary Aside',
				'id' => '1st-subsidiary-aside',
                'description' => __('The 1st widget area in the footer.', 'thematic5'),
				'before_widget' => thematic5_before_widget(),
				'after_widget' => thematic5_after_widget(),
				'before_title' => thematic5_before_title(),
				'after_title' => thematic5_after_title(),
				),
			'action_hook'	=> 'widget_area_subsidiaries',
			'function'		=> 'thematic5_1st_subsidiary_aside',
			'priority'		=> 30,
			),
		'2nd Subsidiary Aside' => array(
			'admin_menu_order' => 400,
			'args' => array (
				'name' => '2nd Subsidiary Aside',
				'id' => '2nd-subsidiary-aside',
                'description' => __('The 2nd widget area in the footer.', 'thematic5'),
				'before_widget' => thematic5_before_widget(),
				'after_widget' => thematic5_after_widget(),
				'before_title' => thematic5_before_title(),
				'after_title' => thematic5_after_title(),
				),
			'action_hook'	=> 'widget_area_subsidiaries',
			'function'		=> 'thematic5_2nd_subsidiary_aside',
			'priority'		=> 50,
			),
		'3rd Subsidiary Aside' => array(
			'admin_menu_order' => 500,
			'args' => array (
				'name' => '3rd Subsidiary Aside',
				'id' => '3rd-subsidiary-aside',
                'description' => __('The 3rd widget area in the footer.', 'thematic5'),
				'before_widget' => thematic5_before_widget(),
				'after_widget' => thematic5_after_widget(),
				'before_title' => thematic5_before_title(),
				'after_title' => thematic5_after_title(),
				),
			'action_hook'	=> 'widget_area_subsidiaries',
			'function'		=> 'thematic5_3rd_subsidiary_aside',
			'priority'		=> 70,
		),
		'Content Top' => array(
			'admin_menu_order' => 600,
			'args' => array (
				'name' => 'Content Top',
				'id' => 'content-top',
                'description' => __('The top widget area displayed above the posts.', 'thematic5'),
				'before_widget' => thematic5_before_widget(),
				'after_widget' => thematic5_after_widget(),
				'before_title' => thematic5_before_title(),
				'after_title' => thematic5_after_title(),
				),
			'action_hook'	=> 'widget_area_content_top',
			'function'		=> 'thematic5_content_top',
			'priority'		=> 10,
			),
		'Index Insert' => array(
			'admin_menu_order' => 700,
			'args' => array (
				'name' => 'Index Insert',
				'id' => 'index-insert',
                'description' => __('The widget area inserted after x posts on the index page.', 'thematic5'),
				'before_widget' => thematic5_before_widget(),
				'after_widget' => thematic5_after_widget(),
				'before_title' => thematic5_before_title(),
				'after_title' => thematic5_after_title(),
				),
			'action_hook'	=> 'widget_area_index_insert',
			'function'		=> 'thematic5_index_insert',
			'priority'		=> 10,
			),
		'Content Bottom' => array(
			'admin_menu_order' => 800,
			'args' => array (
				'name' => 'Content Bottom',
				'id' => 'content-bottom',
                'description' => __('The bottom widget area displayed beneath the posts.', 'thematic5'),
				'before_widget' => thematic5_before_widget(),
				'after_widget' => thematic5_after_widget(),
				'before_title' => thematic5_before_title(),
				'after_title' => thematic5_after_title(),
				),
			'action_hook'	=> 'widget_area_content_bottom',
			'function'		=> 'thematic5_content_bottom',
			'priority'		=> 10,
			),
		'Single Insert' => array(
			'admin_menu_order' => 900,
			'args' => array (
				'name' => 'Single Insert',
				'id' => 'single-insert',
                'description' => __('The widget area inserted between the post and the comments on a single post.', 'thematic5'),
				'before_widget' => thematic5_before_widget(),
				'after_widget' => thematic5_after_widget(),
				'before_title' => thematic5_before_title(),
				'after_title' => thematic5_after_title(),
				),
			'action_hook'	=> 'widget_area_single_insert',
			'function'		=> 'thematic5_single_insert',
			'priority'		=> 10,
			),
		'Header Aside' => array(
			'admin_menu_order' => 1000,
			'args' => array (
				'name' => 'Header',
				'id' => 'header-aside',
                'description' => __('The widget area in the page header.', 'thematic5'),
				'before_widget' => thematic5_before_widget(),
				'after_widget' => thematic5_after_widget(),
				'before_title' => thematic5_before_title(),
				'after_title' => thematic5_after_title(),
				),
			'action_hook'	=> 'thematic5_header',
			'function'		=> 'thematic5_header_aside',
			'priority'		=> 11,
			),
		'404 Aside' => array(
			'admin_menu_order' => 1100,
			'args' => array (
				'name' => '404 Aside',
				'id' => '404-aside',
                'description' => __('The widget area displayed on 404 error-pages.', 'thematic5'),
				'before_widget' => thematic5_before_widget(),
				'after_widget' => thematic5_after_widget(),
				'before_title' => thematic5_before_title(),
				'after_title' => thematic5_after_title(),
				),
			'action_hook'	=> 'widget_area_404_aside',
			'function'		=> 'thematic5_404_aside',
			'priority'		=> 10,
			),
		);
	
	return apply_filters('thematic5_widgetized_areas', $thematic5_widgetized_areas);
	
}

/**
 * Registers Widget Areas(Sidebars) and pre-sets default widgets
 *
 * @uses thematic5_presetwidgets
 * @todo consider deprecating the widgets directory search this seems to have never been used
 */
function thematic5_widgets_init() {

	$thematic5_widgetized_areas = thematic5_widgets_array();
	foreach ( $thematic5_widgetized_areas as $key => $value ) {
		register_sidebar( $thematic5_widgetized_areas[$key]['args'] );
	}  
	
	// Remove WP default Widgets
	// WP 2.8 function using $widget_class
    unregister_widget( 'WP_Widget_Meta' );
    unregister_widget( 'WP_Widget_Search' );

	// Finished intializing Widgets plugin, now let's load the thematic default widgets
	register_widget( 'Thematic_Widget_Search' );
	register_widget( 'Thematic_Widget_Meta' );
	register_widget( 'Thematic_Widget_RSSlinks' );

	// Pre-set Widgets
	$preset_widgets = array (
		'primary-aside'  => array( 'search-2', 'pages-2', 'categories-2', 'archives-2' ),
		'secondary-aside'  => array( 'links-2', 'rss-links-2', 'meta-2' )
		);

    if ( isset( $_GET['activated'] ) ) {
    	thematic5_presetwidgets();
  		update_option( 'sidebars_widgets', apply_filters('thematic5_preset_widgets',$preset_widgets ));
  	}

}

add_action( 'widgets_init', 'thematic5_widgets_init' );

/**
 * Registers action hook.
 *
 * Action Hook: thematic5_presetwidgets
 */
function thematic5_presetwidgets() {
	do_action( 'thematic5_presetwidgets' );
}

if ( function_exists( 'childtheme_override_init_presetwidgets') )  {
    /**
     * @ignore
     */
    function thematic5_init_presetwidgets() {
    	childtheme_override_init_presetwidgets();
    }
} else {
	/**
	 * Sets the "pre-set" widgets in options table
	 */
	function thematic5_init_presetwidgets() {
		update_option( 'widget_search', array( 2 => array( 'title' => '' ), '_multiwidget' => 1 ) );
		update_option( 'widget_pages', array( 2 => array( 'title' => ''), '_multiwidget' => 1 ) );
		update_option( 'widget_categories', array( 2 => array( 'title' => '', 'count' => 0, 'hierarchical' => 0, 'dropdown' => 0 ), '_multiwidget' => 1 ) );
		update_option( 'widget_archives', array( 2 => array( 'title' => '', 'count' => 0, 'dropdown' => 0 ), '_multiwidget' => 1 ) );
		update_option( 'widget_links', array( 2 => array( 'title' => ''), '_multiwidget' => 1 ) );
		update_option( 'widget_rss-links', array( 2 => array( 'title' => ''), '_multiwidget' => 1 ) );
		update_option( 'widget_meta', array( 2 => array( 'title' => ''), '_multiwidget' => 1 ) );
	}
}

add_action( 'thematic5_presetwidgets', 'thematic5_init_presetwidgets' );

/**
 * Add wigitized area functions to specific action hooks.
 *
 * @uses thematic5_widgets_array to get function names and action hooks.
 */
function thematic5_connect_functions() {

	$thematic5_widgetized_areas = thematic5_widgets_array();

	foreach ( $thematic5_widgetized_areas as $key => $value ) {
		if ( !has_action( $thematic5_widgetized_areas[$key]['action_hook'], $thematic5_widgetized_areas[$key]['function'] ) )
			add_action( $thematic5_widgetized_areas[$key]['action_hook'], $thematic5_widgetized_areas[$key]['function'], $thematic5_widgetized_areas[$key]['priority'] );	
	}

}

add_action( 'wp_head', 'thematic5_connect_functions');


/**
 * Filters the order in which the Widget Areas (Sidebars) will be listed in the WP-Admin/Widgets
 * 
 * It sorts the array generated by thematic5_widgetized_areas() by [admin_menu_order]
 * allowing for child themes to filter thematic5_widgetized_areas to control
 * the sidebar list order in the WP-Admin/Widgets.
 * 
 * @see thematic5_widgetized_areas
 * @param array
 * @return array
 */
function thematic5_sort_widgetized_areas($content) {
	asort($content);
	return $content;
}
add_filter('thematic5_widgetized_areas', 'thematic5_sort_widgetized_areas', 100);


/**
 * Displays the Primary Aside
 * 
 * @uses thematic5_before_widget_area
 * @uses thematic5_after_widget_area
 */
function thematic5_primary_aside() {
	if (is_active_sidebar( 'primary-aside' ) ) {
		echo thematic5_before_widget_area( 'primary-aside' );
		dynamic_sidebar( 'primary-aside' );
		echo thematic5_after_widget_area( 'primary-aside' );
	}
}

/**
 * Displays the Secondary Aside 
 *
 * @uses thematic5_before_widget_area
 * @uses thematic5_after_widget_area
 */
function thematic5_secondary_aside() {
	if ( is_active_sidebar( 'secondary-aside' ) ) {
		echo thematic5_before_widget_area( 'secondary-aside' );
		dynamic_sidebar( 'secondary-aside' );
		echo thematic5_after_widget_area( 'secondary-aside' );
	}
}

/**
 * Displays the 2nd Subsidiary Aside
 *
 * @uses thematic5_before_widget_area
 * @uses thematic5_after_widget_area
 */
function thematic5_1st_subsidiary_aside() {
	if ( is_active_sidebar( '1st-subsidiary-aside' ) ) {
		echo thematic5_before_widget_area( '1st-subsidiary-aside' );
		dynamic_sidebar( '1st-subsidiary-aside' );
		echo thematic5_after_widget_area( '1st-subsidiary-aside' );
	}
}

/**
 * Displays the 2nd Subsidiary Aside
 *
 * @uses thematic5_before_widget_area
 * @uses thematic5_after_widget_area
 */
function thematic5_2nd_subsidiary_aside() {
	if ( is_active_sidebar( '2nd-subsidiary-aside' ) ) {
		echo thematic5_before_widget_area('2nd-subsidiary-aside' );
		dynamic_sidebar( '2nd-subsidiary-aside' );
		echo thematic5_after_widget_area( '2nd-subsidiary-aside' );
	}
}

/**
 * Displays the 3rd Subsidiary Aside
 *
 * @uses thematic5_before_widget_area
 * @uses thematic5_after_widget_area
 */
function thematic5_3rd_subsidiary_aside() {
	if ( is_active_sidebar( '3rd-subsidiary-aside' ) ) {
		echo thematic5_before_widget_area('3rd-subsidiary-aside' );
		dynamic_sidebar( '3rd-subsidiary-aside' );
		echo thematic5_after_widget_area( '3rd-subsidiary-aside' );
	}
}

/**
 * Displays the Content Top
 *
 * @uses thematic5_before_widget_area
 * @uses thematic5_after_widget_area
 */
function thematic5_index_top() {
	if ( is_active_sidebar( 'content-top' ) ) {
		echo thematic5_before_widget_area( 'content-top' );
		dynamic_sidebar('content-top');
		echo thematic5_after_widget_area( 'content-top' );
	}
}

/**
 * Displays the Index Insert
 *
 * @uses thematic5_before_widget_area
 * @uses thematic5_after_widget_area
 */
function thematic5_index_insert() {
	if ( is_active_sidebar( 'index-insert' ) ) {
		echo thematic5_before_widget_area( 'index-insert' );
		dynamic_sidebar( 'index-insert' );
		echo thematic5_after_widget_area( 'index-insert' );
	}
}

/**
 * Displays the Content Bottom
 *
 * @uses thematic5_before_widget_area
 * @uses thematic5_after_widget_area
 */
function thematic5_index_bottom() {
	if ( is_active_sidebar( 'content-bottom' ) ) {
		echo thematic5_before_widget_area( 'content-bottom' );
		dynamic_sidebar( 'content-bottom' );
		echo thematic5_after_widget_area( 'content-bottom' );
	}
}


/**
 * Displays the Single Insert
 *
 * @uses thematic5_before_widget_area
 * @uses thematic5_after_widget_area
 */
function thematic5_single_insert() {
	if ( is_active_sidebar( 'single-insert' ) ) {
		echo thematic5_before_widget_area( 'single-insert' );
		dynamic_sidebar( 'single-insert' );
		echo thematic5_after_widget_area( 'single-insert' );
	}
}


/**
 * Displays the Header Aside
 *
 * @uses thematic5_before_widget_area
 * @uses thematic5_after_widget_area
 */
function thematic5_page_top() {
	if ( is_active_sidebar( 'header-aside' ) ) {
		echo thematic5_before_widget_area( 'header-aside' );
		dynamic_sidebar( 'header-aside' );
		echo thematic5_after_widget_area( 'header-aside' );
	}
}

/**
 * Displays the 404 Aside
 *
 * @uses thematic5_before_widget_area
 * @uses thematic5_after_widget_area
 */
function thematic5_page_bottom() {
	if ( is_active_sidebar( '404-aside' ) ) {
		echo thematic5_before_widget_area( '404-aside' );
		dynamic_sidebar( '404-aside' );
		echo thematic5_after_widget_area( '404-aside' );
	}
}

/**
 * Returns the opening CSS markup before the widget area
 *
 * Filter: thematic5_before_widget_area
 * 
 * @param $hook determines the markup specific to the widget area
 * @return string 
 */
function thematic5_before_widget_area($hook) {
	$content =  "\n\t\t";
	if ( $hook == 'primary-aside' ) {
		$content .= '<div id="primary" class="aside main-aside">' . "\n\n";
	} elseif ( $hook == 'secondary-aside' ) {
		$content .= '<div id="secondary" class="aside main-aside">' . "\n\n";
	} elseif ( $hook == '1st-subsidiary-aside' ) {
		$content .= '<div id="first" class="aside sub-aside">' . "\n\n";
	} elseif ( $hook == '2nd-subsidiary-aside' ) {
		$content .= '<div id="second" class="aside sub-aside">' . "\n\n";
	} elseif ( $hook == '3rd-subsidiary-aside' ) {
		$content .= '<div id="third" class="aside sub-aside">' . "\n\n";
	} else {
		$content .= '<div id="' . $hook . '" class="aside">' ."\n";
	}
	$content .= "\t\t\t" . '<ul class="xoxo">' . "\n\n\t\t\t\t";
	return apply_filters( 'thematic5_before_widget_area', $content );
}

/**
 * Returns the closing CSS markup before the widget area
 *
 * Filter: thematic5_after_widget_area
 * 
 * @param $hook determines the markup specific to the widget area
 * @return string 
 */
function thematic5_after_widget_area($hook) {
	$content = "\n\t\t\t\t" . '</ul>' ."\n\n\t\t";
	if ( $hook == 'primary-aside' ) {
		$content .= '</div><!-- #primary .aside -->' ."\n\n";
	} elseif ( $hook == 'secondary-aside' ) {
		$content .= '</div><!-- #secondary .aside -->' ."\n\n";
	} elseif ( $hook == '1st-subsidiary-aside' ) {
		$content .= '</div><!-- #first .aside -->' ."\n\n";
	} elseif ( $hook == '2nd-subsidiary-aside' ) {
		$content .= '</div><!-- #second .aside -->' ."\n\n";
	} elseif ( $hook == '3rd-subsidiary-aside' ) {
		$content .= '</div><!-- #third .aside -->' ."\n\n";
	} else {
		$content .= '</div><!-- #' . $hook . ' .aside -->' ."\n\n";
	} 
	return apply_filters( 'thematic5_after_widget_area', $content );
}

?>