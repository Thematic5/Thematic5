<?php
/**
 * Comments Template
 *
 * Lists the comments and displays the comments form. 
 * 
 * @package Thematic
 * @subpackage Templates
 *
 * @todo chase the invalid counts & pagination for comments/trackbacks
 * @todo remove the THEMATIC_COMPATIBLE_COMMENT_FORM condition to a legacy function for template berevity
 */
?>
				<?php
					// action hook for inserting content above #comments
					thematic5_abovecomments() 
				?>
				
				<div id="comments">
	
				<?php 
					// Disable direct access to the comments script
					if ( 'comments.php' == basename( $_SERVER['SCRIPT_FILENAME'] ) )
					    die ( __('Please do not load this page directly.', 'thematic5')  );
					
					// Set required varible from options
					$req = get_option('require_name_email');
					
					// Check post password and cookies
					if ( post_password_required() ) :
				?>
	
					<div class="nopassword"><?php _e('This post is password protected. Enter the password to view any comments.', 'thematic5') ?></div>
				
				</div><!-- #comments -->
	
				<?php 
						return;
					endif; 
				
				?>
	
				<?php if ( have_comments() ) : ?>
	
					<?php
						// Collect the comments and pings
						$thematic5_comments = $wp_query->comments_by_type['comment'];
						$thematic5_pings = $wp_query->comments_by_type['pings'];
						
						// Calculate the total number of each
						$thematic5_comment_count = count( $thematic5_comments );
						$thematic5_ping_count = count( $thematic5_pings );
						
						// Get the page count for each
						$thematic5_comment_pages = get_comment_pages_count( $thematic5_comments );
						$thematic5_ping_pages = get_comment_pages_count( $thematic5_pings );
						
						// Determine which is the greater pagination number between the two (comment,ping) paginations
						$thematic5_max_response_pages = ( $thematic5_ping_pages > $thematic5_comment_pages ) ? $thematic5_ping_pages : $thematic5_comment_pages;
						
						// Reset the query var to use our calculation for the maximum page (newest/oldest)
						if ( $overridden_cpage )
							set_query_var( 'cpage', 'newest' == get_option('default_comments_page') ? $thematic5_comment_pages : 1 );
					?>
					
					<?php if ( ! empty( $comments_by_type['comment'] ) ) : ?>
							
					<?php
						// action hook for inserting content above #comments-list
						thematic5_abovecommentslist() ;
					?>

						<?php if ( get_query_var('cpage') <= $thematic5_comment_pages )  : ?>
					
					<div id="comments-list-wrapper" class="comments">

						<h3><?php printf( $thematic5_comment_count > 1 ? __( thematic5_multiplecomments_text(), 'thematic5' ) : __( thematic5_singlecomment_text(), 'thematic5' ), $thematic5_comment_count ) ?></h3>
	
						<ol id="comments-list" >
							<?php wp_list_comments( thematic5_list_comments_arg() ); ?>
						</ol>
										
					</div><!-- #comments-list-wrapper .comments -->
					
						<?php endif; ?>
						
					<?php 
						// action hook for inserting content below #comments-list
						thematic5_belowcommentslist() 
					?>
					
					<?php endif; ?>
					
					<div id="comments-nav-below" class="comment-navigation">
	        		
	        			<div class="paginated-comments-links"><?php paginate_comments_links( 'total=' . $thematic5_max_response_pages ); ?></div>
	                
	                </div>	
	                	                  
					<?php if ( ! empty( $comments_by_type['pings'] ) ) : ?>
	
					<?php 
						// action hook for inserting content above #trackbacks-list-wrapper
						thematic5_abovetrackbackslist();
					?>
						
						<?php if ( get_query_var('cpage') <= $thematic5_ping_pages ) : ?>
						
					<div id="pings-list-wrapper" class="pings">
						
						<h3><?php printf( $thematic5_ping_count > 1 ? '<span>%d</span> ' . __( 'Trackbacks', 'thematic5' ) : __( '<span>One</span> Trackback', 'thematic5' ), $thematic5_ping_count ) ?></h3>
	
						<ul id="trackbacks-list">
							<?php wp_list_comments( 'type=pings&callback=thematic5_pings' ); ?>
						</ul>				
	
					</div><!-- #pings-list-wrapper .pings -->			
						
						<?php endif; ?>
						
					<?php
						// action hook for inserting content below #trackbacks-list
						thematic5_belowtrackbackslist();
					?>
									
					<?php endif; ?>

				<?php endif; ?>
							
			<?php
				if ( 'open' == $post->comment_status ) : 
			?>
			
					<div id="respond">
					
	    				<h3><?php comment_form_title( __( thematic5_postcomment_text(), 'thematic5' ), __( thematic5_postreply_text(), 'thematic5' ) ); ?></h3>
	
	    				<div id="cancel-comment-reply"><?php cancel_comment_reply_link() ?></div>
	
						<?php if ( get_option( 'comment_registration' ) && !$user_ID ) : ?>
							<p id="login-req"><?php printf( __( 'You must be <a href="%s" title="Log in">logged in</a> to post a comment.', 'thematic5' ), site_url( '/wp-login.php?redirect_to=' . get_permalink() ) ) ?></p>
						
						<?php else : ?>
						<div class="formcontainer">	
	
							<?php
								// action hook for inserting content above #commentform
								thematic5_abovecommentsform() 
							?>					
	
							<form id="commentform" action="<?php echo site_url( '/wp-comments-post.php' ) ?>" method="post">
	
							<?php if ( $user_ID ) : ?>
	
								<p id="login"><?php printf( __( '<span class="loggedin">Logged in as <a href="%1$s" title="Logged in as %2$s">%2$s</a>.</span> <span class="logout"><a href="%3$s" title="Log out of this account">Log out?</a></span>', 'thematic5' ),
									site_url( '/wp-admin/profile.php' ),
									esc_html( $user_identity ),
									wp_logout_url( get_permalink() ) ) ?>
								</p>
	
							<?php else : ?>
	
								<p id="comment-notes"><?php _e( 'Your email is <em>never</em> published nor shared.', 'thematic5' ) ?> <?php if ( $req ) _e( 'Required fields are marked <span class="required">*</span>', 'thematic5' ) ?></p>
	
	                            <div id="form-section-author" class="form-section">
	    							<div class="form-label"><label for="author"><?php _e( 'Name', 'thematic5' ) ?></label> <?php if ( $req ) _e( '<span class="required">*</span>', 'thematic5' ) ?></div>
	    							<div class="form-input"><input id="author" name="author" type="text" value="<?php echo $comment_author ?>" size="30" maxlength="20" tabindex="3" /></div>
	                            </div><!-- #form-section-author .form-section -->
	
	                            <div id="form-section-email" class="form-section">
	    							<div class="form-label"><label for="email"><?php _e( 'Email', 'thematic5' ) ?></label> <?php if ( $req ) _e( '<span class="required">*</span>', 'thematic5' ) ?></div>
	    							<div class="form-input"><input id="email" name="email" type="text" value="<?php echo $comment_author_email ?>" size="30" maxlength="50" tabindex="4" /></div>
	                            </div><!-- #form-section-email .form-section -->
	
	                            <div id="form-section-url" class="form-section">
	    							<div class="form-label"><label for="url"><?php _e( 'Website', 'thematic5' ) ?></label></div>
	    							<div class="form-input"><input id="url" name="url" type="text" value="<?php echo $comment_author_url ?>" size="30" maxlength="50" tabindex="5" /></div>
	                            </div><!-- #form-section-url .form-section -->
	
							<?php endif /* if ( $user_ID ) */ ?>
	
	                            <div id="form-section-comment" class="form-section">
	    							<div class="form-label"><label for="comment"><?php _e( thematic5_commentbox_text(), 'thematic5' ) ?></label></div>
	    							<div class="form-textarea"><textarea id="comment" name="comment" cols="45" rows="8" tabindex="6"></textarea></div>
	                            </div><!-- #form-section-comment .form-section -->
	                            
	                            <div id="form-allowed-tags" class="form-section">
	                                <p><span><?php _e( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes:', 'thematic5' ) ?></span> <code><?php echo allowed_tags(); ?></code></p>
	                            </div>
								
	                  			<?php do_action( 'comment_form', $post->ID ); ?>
	                  
								<div class="form-submit"><input id="submit" name="submit" type="submit" value="<?php echo thematic5_commentbutton_text(); ?>" tabindex="7" /><input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" /></div>
	
	                            <?php comment_id_fields(); ?>    
	
							</form><!-- #commentform -->
	
							<?php
								// action hook for inserting content below #commentform
								thematic5_belowcommentsform()
							?>
	
						</div><!-- .formcontainer -->
						<?php endif /* if ( get_option('comment_registration') && !$user_ID ) */ ?>
	
						</div><!-- #respond -->
						
						<?php
								
							endif /* if ( 'open' == $post->comment_status ) */ 
						?>
	
				</div><!-- #comments -->
				
				<?php
					// action hook for inserting content below #comments
					thematic5_belowcomments()
				?>