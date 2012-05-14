<?php
/**
 * Search Template
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
	            // action hook for inserting contentabove #content
				thematic5_abovecontent();
		
				// filter for manipulating the element that wraps the content 
				echo apply_filters( 'thematic5_open_id_content', '<div id="content" role="main">' . "\n\n" );
							
				if (have_posts()) {
	
	                // displays the page title
	                thematic5_page_title();
	
	                // create the navigation above the content
	                thematic5_navigation_above();
				
	                // action hook for placing content above the search loop
	                thematic5_above_searchloop();			
	
	                // action hook creating the search loop
	                thematic5_searchloop();
	
	                // action hook for placing content below the search loop
	                thematic5_below_searchloop();			
	
	                // create the navigation below the content
	                thematic5_navigation_below();
	
	            } else {
	            
	            	// action hook for inserting content above #post
	           		thematic5_abovepost();
	           ?>

				<div id="post-0" class="post noresults">
					
					<h1 class="entry-title"><?php _e( 'Nothing Found', 'thematic5' ) ?></h1>
					
					<div class="entry-content">
						
						<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'thematic5' ) ?></p>
					
					</div><!-- .entry-content -->
					
					<?php thematic5_search_form( 'search-result' ) ?>
				
				</div><!-- #post -->
	
	            <?php
	            	// action hook for inserting content below #post
	            	thematic5_belowpost();
	            }
	            ?>
	            
			</div><!-- #content -->
			
			<?php 
				// action hook for inserting content below #content
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