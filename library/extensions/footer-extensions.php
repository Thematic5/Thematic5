<?php
/**
 * Footer Extensions
 *
 * @package ThematicCoreLibrary
 * @subpackage FooterExtensions
 */
 
/**
 * Register action hook: thematic5_abovemainclose
 * 
 * Located in footer.php, just before the closing of the main div
 */
function thematic5_abovemainclose() {
    do_action('thematic5_abovemainclose');
} // end thematic5_belowmainsidebar


/**
 * Register action hook: thematic5_abovefooter
 * 
 * Located in footer.php, just before the footer div
 */
function thematic5_abovefooter() {
    do_action('thematic5_abovefooter');
} // end thematic5_abovefooter


/**
 * Register action hook: thematic5_footer
 * 
 * Located in footer.php, inside the footer div
 */
function thematic5_footer() {
    do_action('thematic5_footer');
} // end thematic5_footer


/**
 * Filter: thematic5_footertext
 * 
 * The footertext is now set in theme options. This function is obsolete. 
 */
function thematic5_footertext($thm_footertext) {
    $thm_footertext = apply_filters('thematic5_footertext', $thm_footertext);
    return $thm_footertext;
} // end thematic5_footertext


/**
 * Register action hook: thematic5_belowfooter
 * 
 * Located in footer.php, just after the footer div
 */
function thematic5_belowfooter() {
    do_action('thematic5_belowfooter');
} // end thematic5_belowfooter


/**
 * Register action hook: thematic5_after
 * 
 * Located in footer.php, just before the closing body tag, after everything else.
 */
function thematic5_after() {
    do_action('thematic5_after');
} // end thematic5_after


if (function_exists('childtheme_override_subsidiaries'))  {
	/**
	 * @ignore
	 */
	function thematic5_subsidiaries() {
		childtheme_override_subsidiaries();
	}
} else {
	/**
	 * Create the subsidiary widgets areas in footer
	 * 
	 * Override: childtheme_override_subsidiaries
	 */
	function thematic5_subsidiaries() {
	      	
		// action hook for placing content above the subsidiary widget areas
		thematic5_abovesubasides();
		
		// action hook for creating the subsidiary widget areas
		thematic5_widget_area_subsidiaries();
		
		// action hook for placing content below subsidiary widget areas
		thematic5_belowsubasides();
   	}
}

add_action('thematic5_footer', 'thematic5_subsidiaries', 10);


if (function_exists('childtheme_override_siteinfoopen'))  {
	/**
	 * @ignore
	 */
	function thematic5_siteinfoopen() {
		childtheme_override_siteinfoopen();
	}
} else {
	/**
	 * Open the #siteinfo div
	 * 
	 * Override: childtheme_override_siteinfoopen
	 */
	function thematic5_siteinfoopen() {
    ?>
    
	<div id="siteinfo">        

   	<?php
   	}
}

add_action('thematic5_footer', 'thematic5_siteinfoopen', 20);
  
 
if (function_exists('childtheme_override_siteinfo'))  {
	/**
	 * @ignore
	 */
	function thematic5_siteinfo() {
		childtheme_override_siteinfo();
	}
} else {
	/**
	 * Display the footer text from theme options within the #siteinfo div
	 * 
	 * Override: childtheme_override_siteinfo
	 */
	function thematic5_siteinfo() {
		// footer text set in theme options
		echo "\t\t" . do_shortcode( thematic5_get_theme_opt( 'footer_txt' ) ) . "\n";
	}
}

add_action('thematic5_footer', 'thematic5_siteinfo', 30);

   
if (function_exists('childtheme_override_siteinfoclose'))  {
	/**
	 * @ignore
	 */
	function thematic5_siteinfoclose() {
		childtheme_override_siteinfoclose();
	}
} else {
	/**
	 * Close the #siteinfo div
	 * 
	 * Override: childtheme_override_siteinfoclose
	 */
	function thematic5_siteinfoclose() {
    ?>

	</div><!-- #siteinfo -->
	
   	<?php
   	}
}

add_action('thematic5_footer', 'thematic5_siteinfoclose', 40);