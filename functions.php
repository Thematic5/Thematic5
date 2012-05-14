<?php
/**
 * Theme Functions
 *
 * This file is used by WordPress to initialize the theme.
 * Thematic is designed to be used as a theme framework and this file should not be modified.
 * You should use a Child Theme to make your customizations. A sample child theme is provided
 * as an example in root directory of this theme. You can move it into the wp-content/themes to
 * enable activation of the child theme. <br>
 *
 * Reference:  {@link http://codex.wordpress.org/Child_Themes Codex: Child Themes}
 * 
 * @package Thematic
 * @subpackage ThemeInit
 */


/** 
 * Legacy options global variables likely not needed anymore…
 * Can these be removed safely?
 */
$themename = "Thematic";
$shortname = "thm";


/**
 * Registers action hook: thematic5_init 
 * 
 * @since Thematic 0.9.8
 */
function thematic5_init() {
	do_action('thematic5_init');
}


/**
 * thematic5_theme_setup & childtheme_override_theme_setup
 *
 * Override: childtheme_override_theme_setup
 *
 * @since Thematic 0.9.8
 */
if ( function_exists('childtheme_override_theme_setup') ) {
	/**
	 * @ignore
	 */
	function thematic5_theme_setup() {
		childtheme_override_theme_setup();
	}
} else {
	/**
	 * 
	 */
	function thematic5_theme_setup() {
		global $content_width;

		/**
		 * Set the content width based on the theme's design and stylesheet.
		 *
		 * Used to set the width of images and content. Should be equal to the width the theme
		 * is designed for, generally via the style.css stylesheet.
		 *
		 * @since Thematic 0.9.8
		 */
		if ( !isset($content_width) )
			$content_width = 540;

		/**
		 * Get Theme and Child Theme Data.
		 * 
		 * Used to get title, version, author, URI of the parent and the child theme.
		 * get_theme_data() is deprecated as of 3.4 in favor of wp_get_theme()
		 */
		if (function_exists('wp_get_theme')){
				// get theme data of parent theme
		        $theme_data = wp_get_theme( 'Thematic5' );
		        $thm_version = $theme_data->Version;
		        $thm_name = $theme_data->Name;
		        $thm_theme_uri = $theme_data->ThemeURI;
		        $thm_description = $theme_data->Description;
		        $thm_author = $theme_data->Author;
		        $thm_author_uri = $theme_data->AuthorURI;
		
				$child_theme_data = wp_get_theme();
				$child_version = trim( $child_theme_data->Version );
				$child_name = $child_theme_data->Name;
				$child_author = $child_theme_data->Author;
				$child_theme_uri = $child_theme_data->ThemeURI;

		} else {
		        $theme_data = get_theme_data( get_template_directory() . '/style.css' );
		        $thm_version = $theme_data['Version'];
		        $thm_name = $theme_data['Name'];
		        $thm_theme_uri = $theme_data['Theme_URI'];
		        $thm_description = $theme_data['Description'];
		        $thm_author = $theme_data['Author'];
		        $thm_author_uri = $theme_data['Author_URI'];
		
				$ct = get_theme_data(  get_stylesheet_directory() . '/style.css' );
				$child_version = trim( $ct['Version'] );
				$child_name = $ct['Title'];
				$child_author = $ct['Author'];
				$child_theme_uri = $ct['URI'];
				
		}
		
		if (!$thm_version)
			$thm_version = "unknown";
		
		if ( !$child_version )
			$child_version = "unknown";

		if ( !defined('THEMENAME') )
			define('THEMENAME', $thm_name);

		if ( !defined('THEMEAUTHOR') )
			define('THEMEAUTHOR', $thm_author);

		if ( !defined('THEMEURI') )
			define('THEMEURI', $thm_theme_uri);

		if ( !defined('THEMATICVERSION') )
			define('THEMATICVERSION', $thm_version);

		define( 'TEMPLATENAME', $child_name );
		define( 'TEMPLATEAUTHOR', $child_author );
		define( 'TEMPLATEURI', $child_theme_uri );
		define( 'TEMPLATEVERSION', $child_version );

		// Check for WordPress mu or WordPress 3.0
		define( 'THEMATIC_MB', function_exists('get_blog_option') );

		// Create the feedlinks
		add_theme_support('automatic-feed-links');
 
		if ( apply_filters('thematic5_post_thumbs', true) )
			add_theme_support('post-thumbnails');
 
		add_theme_support('thematic5_superfish');

		// Path constants
		define( 'THEMELIB', TEMPLATEPATH . '/library' );

		// Create Theme Options Page
		require_once (THEMELIB . '/extensions/theme-options.php');
		
		// Load legacy functions
		require_once (THEMELIB . '/legacy/deprecated.php');

		// Load widgets
		require_once (THEMELIB . '/extensions/widgets.php');

		// Load custom header extensions
		require_once (THEMELIB . '/extensions/header-extensions.php');

		// Load custom content filters
		require_once (THEMELIB . '/extensions/content-extensions.php');

		// Load custom Comments filters
		require_once (THEMELIB . '/extensions/comments-extensions.php');

		// Load custom discussion filters
		require_once (THEMELIB . '/extensions/discussion-extensions.php');

		// Load custom Widgets
		require_once (THEMELIB . '/extensions/widgets-extensions.php');

		// Load the Comments Template functions and callbacks
		require_once (THEMELIB . '/extensions/discussion.php');

		// Load custom sidebar hooks
		require_once (THEMELIB . '/extensions/sidebar-extensions.php');

		// Load custom footer hooks
		require_once (THEMELIB . '/extensions/footer-extensions.php');

		// Add Dynamic Contextual Semantic Classes
		require_once (THEMELIB . '/extensions/dynamic-classes.php');

		// Need a little help from our helper functions
		require_once (THEMELIB . '/extensions/helpers.php');

		// Load shortcodes
		require_once (THEMELIB . '/extensions/shortcodes.php');

		// Adds filters for the description/meta content in archives.php
		add_filter('archive_meta', 'wptexturize');
		add_filter('archive_meta', 'convert_smilies');
		add_filter('archive_meta', 'convert_chars');
		add_filter('archive_meta', 'wpautop');

		// Remove the WordPress Generator - via http://blog.ftwr.co.uk/archives/2007/10/06/improving-the-wordpress-generator/
		function thematic5_remove_generators() {
 			return '';
 		}
 		if ( apply_filters('thematic5_hide_generators', true) )
 			add_filter('the_generator', 'thematic5_remove_generators');
 
		// Translate, if applicable
		load_theme_textdomain('thematic5', THEMELIB . '/languages');

		$locale = get_locale();
		$locale_file = THEMELIB . "/languages/$locale.php";
		if ( is_readable($locale_file) )
			require_once ($locale_file);
	}
}

add_action('after_setup_theme', 'thematic5_theme_setup', 10);


/**
 * Registers action hook: thematic5_child_init
 * 
 * @since Thematic 0.9.8
 */
function thematic5_child_init() {
	do_action('thematic5_child_init');
}

add_action('after_setup_theme', 'thematic5_child_init', 20);


if ( function_exists('childtheme_override_init_navmenu') )  {
	/**
	 * @ignore
	 */
	 function thematic5_init_navmenu() {
    	childtheme_override_init_navmenu();
    }
} else {
	/**
	 * Register primary nav menu
	 * 
	 * Override: childtheme_override_init_navmenu
	 * Filter: thematic5_primary_menu_id
	 * Filter: thematic5_primary_menu_name
	 */
    function thematic5_init_navmenu() {
		register_nav_menu( apply_filters('thematic5_primary_menu_id', 'primary-menu'), apply_filters('thematic5_primary_menu_name', __( 'Primary Menu', 'thematic5' ) ) );
	}
}
add_action('init', 'thematic5_init_navmenu');