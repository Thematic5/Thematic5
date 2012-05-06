<?php
/**
 * Header Template
 *
 * This template calls a series of functions that output the head tag of the document.
 * The body and div #main elements are opened at the end of this file. 
 * 
 * @package Thematic
 * @subpackage Templates
 */
 
	// Create doctype
	thematic5_create_doctype();
	
	// Create the <html> tag with language attributes
	thematic5_create_html();
	
	// Opens the head tag 
	thematic5_head_profile();
	
	// Action hook for header meta 
	thematic5_head();
	
	/* The function wp_head() loads Thematic's stylesheet and scripts.
	 * Calling wp_head() is required to provide plugins and child themes
	 * the ability to insert markup within the <head> tag.
	 */
	wp_head();
?>
</head>

<body <?php body_class(); ?>>

<?php 

	// Action hook to place content before opening #wrapper
	thematic5_before(); 

	// Filter provided for altering output of wrapping element follows the body tag
	if (apply_filters('thematic5_open_wrapper', true)) {
  	  echo ('<div id="wrapper" class="hfeed">' . "\n");
	}

	// Action hook for placing content above the theme header
	thematic5_aboveheader(); 
?>
   
	<div id="header">
        
        <?php 
			// Action hook creating the theme header
			thematic5_header();
        ?>
        
	</div><!-- #header-->
    
    <?php
		// Action hook for placing content below the theme header
		thematic5_belowheader();
    ?>
	<div id="main">
