<?php
/**
 * Attachments Template
 *
 * Displays singular WordPress Media Library items.
 *
 * @package Thematic
 * @subpackage Templates
 *
 * @link http://codex.wordpress.org/Using_Image_and_File_Attachments Codex:Using Attachments
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

	            // start the loop
	            while ( have_posts() ) : the_post();

	        	// displays the page title
				thematic5_page_title();

				// action hook for placing content above #post
				thematic5_abovepost();
			?>

				<?php
					echo '<div id="post-' . get_the_ID() . '" ';
					// Checking for defined constant to enable Thematic's post classes
					if ( !( THEMATIC_COMPATIBLE_POST_CLASS ) ) {
					    post_class();
					    echo '>';
					} else {
					    echo 'class="';
					    thematic5_post_class();
					    echo '">';
					}

	            	// creating the post header
	            	thematic5_postheader();
	            ?>

					<div class="entry-content">

						<div class="entry-attachment"><?php the_attachment_link( $post->ID, true ) ?></div>

	                        <?php 
	                        	the_content( thematic5_more_text() );

	                        	wp_link_pages( 'before=<div class="page-link">' . __( 'Pages:', 'thematic' ) . '&after=</div>' );
	                        ?>

					</div><!-- .entry-content -->

					<?php
	                	// creating the post footer
	                	thematic5_postfooter();
	                ?>

				</div><!-- #post -->

	            <?php
					// action hook for placing contentbelow #post
					thematic5_belowpost();
					
       				// action hook for calling the comments_template
					thematic5_comments_template();
					
					// end loop
        			endwhile;
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