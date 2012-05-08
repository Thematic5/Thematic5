<?php
/**
 * Error 404 Page Template
 *
 * Displays a "Not Found" message and a search form when a 404 Error is encountered.
 *
 * @package Thematic
 * @subpackage Templates
 *
 * @link http://codex.wordpress.org/Creating_an_Error_404_Page Codex: Create a 404 Page
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

				// action hook for placing content above #post
				thematic5_abovepost(); 
			?>

				<div id="post-0" class="post error404">

				<?php
		    		// action hook for placing the 404 content
    	        	thematic5_404();
    	        ?>

				</div><!-- .post -->

				<?php 
					// calling the widget area '404-aside'
					get_sidebar('404');
				
					// action hook for placing content below #post
					thematic5_belowpost(); 
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