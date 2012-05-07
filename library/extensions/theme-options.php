<?php
/**
 * Thematic Theme Options
 *
 * An improved theme options page using the WP Settings API
 * Child themes can use the WP settings api and the filters provided here to 
 * customize their child theme's options and settings validation. <br>
 *
 * For Reference: {@link http://codex.wordpress.org/Creating_an_Archive_Index Codex-Creating an Archive Index}
 *
 * @package ThematicCoreLibrary
 * @subpackage ThemeOptions
 */
 
/**
 * Sets default options in database if not pre-existent.
 * Registers with WP settings API, adds a main section with three settings fields.
 * 
 * Override: childtheme_override_opt_init
 *
 * @since Thematic 0.9.8
 */
if (function_exists('childtheme_override_opt_init')) {
	function thematic5_opt_init() {
		childtheme_override_opt_init();
	}
} else {
	function thematic5_opt_init() {
		
		// Retrieve current options from database	
		$current_options = thematic5_get_wp_opt('thematic5_theme_opt');
		
		// If no current settings exist
		if ( false === $current_options )  {
			// Fresh theme installation: Add default settings to database
			add_option( 'thematic5_theme_opt', thematic5_default_opt() );
		}
		
		register_setting ('thematic5_opt_group', 'thematic5_theme_opt', 'thematic5_validate_opt');
		
		add_settings_section ('thematic5_opt_section_main', '', 'thematic5_do_opt_section_main', 'thematic5_theme_opt');
	
		add_settings_field ('thematic5_insert_opt', __('Index Insert Position', 'thematic5')	, 'thematic5_do_insert_opt'	, 'thematic5_theme_opt', 'thematic5_opt_section_main');
		add_settings_field ('thematic5_auth_opt',   __('Info on Author Page'	, 'thematic5')	, 'thematic5_do_auth_opt'	, 'thematic5_theme_opt', 'thematic5_opt_section_main');
		add_settings_field ('thematic5_footer_opt', __('Text in Footer'	, 'thematic5')		, 'thematic5_do_footer_opt'	, 'thematic5_theme_opt', 'thematic5_opt_section_main');
	
	}
}

add_action ('admin_init', 'thematic5_opt_init');

	
/**
 * A wrapper for get_option that provides WP multi site compatibility.
 *
 * Returns an option's value from wp_otions table in database
 * or returns false if no value is found for that row 
 *
 * @since Thematic 0.9.8
 */
function thematic5_get_wp_opt( $option_name, $default = false ) {
	global $blog_id;
	
	if (THEMATIC_MB) {
		$opt = get_blog_option( $blog_id, $option_name, $default );
	} else {
		$opt = get_option( $option_name, $default );
	}
	
	return $opt;
}


/**
 * Returns or echoes a theme option value by its key
 * or returns false if no value is found
 *
 * @uses thematic5_get_wp_opt()
 * @since Thematic 0.9.8
 */
function thematic5_get_theme_opt( $opt_key, $echo = false ) {
	
	$theme_opt = thematic5_get_wp_opt( 'thematic5_theme_opt' );
	
	if ( isset( $theme_opt[$opt_key] ) ) {
		if ( false === $echo ) {
			return $theme_opt[$opt_key] ;
		} else { 
			echo $theme_opt[$opt_key];
		}
	} else {
		return false;
	}
}


/**
 * Returns default theme options.
 *
 * Filter: thematic5_theme_default_opt
 * 
 * @since Thematic 0.9.8
 *
 */
function thematic5_default_opt() {
	$thematic5_default_opt = array(
		'index_insert' 	=> 2,
		'author_info'  	=> 0, // 0 = not checked 1 = checked
		'footer_txt' 	=> 'Powered by [wp-link]. Built on the [theme-link].'
	);

	return apply_filters( 'thematic5_theme_default_opt', $thematic5_default_opt );
}	

	
/**
 * Adds the theme option page as an admin menu item, 
 * and queues the contextual help on theme options page load
 *
 * Filter: thematic5_theme_add_opt_page
 * The filter provides the ability for child themes to customize or remove and add 
 * their own options page and queue contextual help in one function
 * 
 * @since Thematic 0.9.8
 */
 
function thematic5_opt_add_page() {

	$thematic5_opt_page = add_theme_page ('Theme Options', 'Theme Options', 'edit_theme_options', 'thematic5_opt', 'thematic5_do_opt_page');
	$thematic5_opt_page = apply_filters ('thematic5_theme_add_opt_page', $thematic5_opt_page );
	
	if ( ! $thematic5_opt_page ) {
		return;
	}
	
	add_action( "load-$thematic5_opt_page", 'thematic5_opt_page_help' );
}

add_action( 'admin_menu', 'thematic5_opt_add_page' );


/**
 * Generates the help texts and help sidebar items for the options screen
 *
 * Filter: thematic5_theme_opt_help_txt <br>
 * Filter: thematic5_theme_opt_help_sidebar <br>
 * Override: childtheme_override_opt_page_help <br>
 * Conditional WP compatibilty 3.3 & 3.2 <br>
 * 
 * @since Thematic 0.9.8 
 * @todo remove Legacy compatibilty WP 3.0 when min WP version increases
 * @todo removeconditional compatibilty  WP version > 3.3 or > 3.2
 */
if (function_exists('childtheme_override_opt_page_help')) {
	function thematic5_opt_page_help() {
		childtheme_override_opt_page_help();
	}
} else {
	function thematic5_opt_page_help() {	
		
		$screen = get_current_screen();
		
		$sidebar  = '<p><strong>' . __( 'For more information:', 'thematic5') . '</strong></p>';
		$sidebar .= '<a href="http://thematictheme.com">ThematicTheme.com</a></p>';
		$sidebar .= '<p><strong>' . __('For support:', 'thematic5') . '</strong></p>';
		$sidebar .= '<a href="http://thematictheme.com/forums/"> Thematic ';
		$sidebar .= __('forums', 'thematic5' ) . '</a></p>';
		
		$sidebar = apply_filters ( 'thematic5_theme_opt_help_sidebar', $sidebar );
		
		$help =  '<p>' . __('The options below are enabled by the Thematic Theme framework and/or a child theme.', 'thematic5') .' ';
		$help .= __('New options can be added and the default ones removed by creating a child theme. This contextual help can be customized in a child theme also.', 'thematic5') . '</p>';
		
		$help = apply_filters ( 'thematic5_theme_opt_help_txt', $help );
	
		if ( method_exists( $screen, 'add_help_tab' ) ) {
			// WordPress 3.3
			$screen->add_help_tab( array( 'title' => __( 'Overview', 'thematic5' ), 'id' => 'theme-opt-help', 'content' => $help, ) );
			$screen->set_help_sidebar( $sidebar );
			
		} elseif ( function_exists('add_contextual_help') ) {
			// WordPress 3.2
			add_contextual_help( $screen, $help . $sidebar );
		} 
	}
}


/**
 * Renders the them options page
 *
 * @since Thematic 0.9.8 
 * @todo remove Legacy compatibilty WP 3.0 when min WP version increases
 * @todo remove conditional compatibilty when min WP version > 3.1
 */
function thematic5_do_opt_page() { ?>

 <div class="wrap">
	<?php screen_icon(); ?>
	<h2><?php printf( __( '%s Theme Options', 'thematic5' ), get_current_theme() ); ?></h2>
	<?php settings_errors(); ?>
	
	<form action="options.php" method="post" >
		<?php
			settings_fields( 'thematic5_opt_group' );
			do_settings_sections( 'thematic5_theme_opt' );
			if ( function_exists('submit_button') ) {
			// WordPress 3.1
				submit_button();
			} else {
			// WordPress 3.0
			?>
			 	<p class="submit">
 					<input name="submit" type="submit" class="button-primary" value="<?php esc_attr_e('Save Changes', 'thematic5') ?>" />
 				</p>
 			<?php
			}
			
		?>
		</form>
 
 </div>
 
<?php 
}


/**
 * Renders the "Main" settings section. This is left blank in Theamatic and outputs nothing
 *
 * Filter: thematic5_theme_opt_section_main
 *
 * @since Thematic 0.9.8
 */
function thematic5_do_opt_section_main() {
	$thematic5_opt_section_main = '';
	echo ( apply_filters( 'thematic5_theme_opt_section_main' , $thematic5_opt_section_main ) );
}


/**
 * Renders Index Insert elements
 *
 * @since Thematic 0.9.8
 */
function thematic5_do_insert_opt() { 
?>
	<input type="text" maxlength="4" size="4" value="<?php esc_attr_e( (thematic5_get_theme_opt('index_insert') ) ) ;  ?>" id="thm_insert_position" name="thematic5_theme_opt[index_insert]">
	<label for="thm_insert_position"><?php _e('The Index Insert widget area will appear after this post number. Entering nothing or 0 will disable this feature.','thematic5'); ?></label>
<?php 
}


/**
 * Renders Author Info elements
 *
 * @since Thematic 0.9.8
 */
function thematic5_do_auth_opt() { 
?>
	<input id="thm_authorinfo" type="checkbox"  value="1" name="thematic5_theme_opt[author_info]"  <?php checked( thematic5_get_theme_opt('author_info') , 1 ); ?> />
	<label for="thm_authorinfo"><?php _e('Display a', 'thematic5') ?> <a target="_blank" href="http://microformats.org/wiki/hcard">microformatted vCard</a> <?php _e("with the author's avatar, bio and email on the author page.", 'thematic5') ?></label>
<?php
}


/**
 * Renders Footer Text elements
 *
 * @since Thematic 0.9.8
 */
function thematic5_do_footer_opt() { 
?>
	<textarea rows="5" cols="94" id="thm_footertext" name="thematic5_theme_opt[footer_txt]"><?php thematic5_get_theme_opt('footer_txt', true ); ?></textarea>
	<br><?php _e('You can use HTML and shortcodes in your footer text. Shortcode examples', 'thematic5'); ?>: [wp-link] [theme-link] [loginout-link] [blog-title] [blog-link] [the-year]
<?php
}



/**
 * Validates theme options form post data.
 * Provides error reporting for invalid input.
 *
 * Override: childtheme_override_validate_opt <br>
 * Filter: thematic5_theme_opt_validation
 * 
 * @since Thematic 0.9.8 
 */
if (function_exists('childtheme_override_validate_opt')) {
	function thematic5_thematic5_validate_opt() {
		childtheme_override_validate_opt();
	}
} else {
 	function thematic5_validate_opt($input){
 	   $output = thematic5_get_wp_opt( 'thematic5_theme_opt', thematic5_default_opt() );	
 	   
 	   // Index Insert position must be a non-negative number
 	   if ( !is_numeric( $input['index_insert'] ) || $input['index_insert'] < 0 )  {
 	   		add_settings_error(
 	   		'thematic5_theme_opt',
 	   		'thematic5_insert_opt',
 	   		__('The index insert position value must be a number equal to or greater than zero. This setting has been reverted to the previous value.', 'thematic5' ),
 	   		'error'
 	   		);
 	   } else {
 	   	// A sanitize numeric value to ensure a whole number
 	   	$output['index_insert'] = intval( $input['index_insert'] );
 	   }
 	   
 	   // Author Info CheckBox value either 1(yes) or 0(no)
 	   	$output['author_info'] =  ( $input['author_info'] == 0 ? 0 : 1 );
 	 
 	   // Footer Text sanitized allowing HTML and WP shortcodes
 	   if ( isset( $input['footer_txt'] ) ) {
 	   	$output['footer_txt'] = wp_kses_post( $input['footer_txt'] ) ;	
 	   }
 	   	
 	   return apply_filters( 'thematic5_theme_opt_validation', $output, $input );
 	}
} 
 