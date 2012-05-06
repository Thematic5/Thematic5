<?php
/**
 * Single Post Template
 *
 * …
 * 
 * @package Thematic
 * @subpackage Templates
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
				echo apply_filters( 'thematic5_open_id_content', '<div id="content" role="main">' . "\n\n" );
							
	            // start the loop
	            while ( have_posts() ) : the_post();
    	        
    	        // create the navigation above the content
				thematic5_navigation_above();
		
    	        // calling the widget area 'single-top'
    	        get_sidebar('single-top');
		
    	        // action hook creating the single post
    	        thematic5_singlepost();
				
    	        // calling the widget area 'single-insert'
    	        get_sidebar('single-insert');
		
    	        // create the navigation below the content
				thematic5_navigation_below();
		
       			// action hook for calling the comments_template
    	        thematic5_comments_template();
    	        
    	        // end the loop
        		endwhile;
		
    	        // calling the widget area 'single-bottom'
    	        get_sidebar('single-bottom');
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