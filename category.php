<?php
/**
 * Category Template
 *
 * Displays an archive index of posts assigned to a Category. 
 *
 * @package Thematic
 * @subpackage Templates
 *
 * @link http://codex.wordpress.org/Category_Templates Codex: Category Templates
 */

	// calling the header.php
	get_header();

	// action hook for placing content above #container
	thematic5_abovecontainer();
?>

		<div id="container">

			<?php
				// action hook for placing content above #content
				thematic5_abovecontent();

				// filter for manipulating the element that wraps the content 
				echo apply_filters( 'thematic5_open_id_content', '<div id="content">' . "\n\n" );

				// displays the page title
	        	thematic5_page_title();

	        	// create the navigation above the content
	        	thematic5_navigation_above();

	        	// action hook for placing content above the category loop
	        	thematic5_above_categoryloop();			

	        	// action hook creating the category loop
	        	thematic5_categoryloop();

	        	// action hook for placing content below the category loop
	        	thematic5_below_categoryloop();			

	        	// create the navigation below the content
	        	thematic5_navigation_below();
	        ?>

			</div><!-- #content -->

			<?php
				// action hook for placing content below #content
				thematic5_belowcontent();
			?>
		</div><!-- #container -->

<?php
	// action hook for placing content below #container
	thematic5_belowcontainer();

	// calling the standard sidebar 
	thematic5_sidebar();

	// calling footer.php
	get_footer();
?>