<?php
/**
 * Dynamic Classes
 *
 * @package ThematicCoreLibrary
 * @subpackage DynamicClasses
 */
 

/**
 * Generates semantic classes for BODY element
 *
 * @param bool $print (default: true)
 */
function thematic5_add_body_class( $c ) {

		global $wp_query, $current_user, $blog_id, $post, $taxonomy;

	    if ( is_multisite() ) {
	    	// Applies the blog id to BODY element .. blog-id1 for WordPress < 3.0
	    	$c[] = 'blogid-' . $blog_id;
	    }
	
		// Special classes for BODY element when a single post
		if ( is_single() && apply_filters( 'thematic5_show_bc_singlepost', TRUE ) ) {
			$postID = $wp_query->post->ID;
			the_post();
	
	        // Adds post slug class, prefixed by 'slug-'
	        $c[] = 'slug-' . $wp_query->post->post_name;
	
			// Adds classes for the month, day, and hour when the post was published
			if ( isset( $wp_query->post->post_date ) )
				thematic5_date_classes( mysql2date( 'U', $wp_query->post->post_date ), $c, 's-' );
	
			// Adds category classes for each category on single posts
			if ( $cats = get_the_category() )
				foreach ( $cats as $cat )
					$c[] = 's-category-' . $cat->slug;

			// Adds tag classes for each tag on single posts
			if ( $tags = get_the_tags() )
				foreach ( $tags as $tag )
					$c[] = 's-tag-' . $tag->slug;

			// Adds taxonomy classes for each term on single posts
			$single_post_type = get_post_type_object( get_post_type( $post->ID ) );
			
			// Check for post types without taxonomy inclusion
			if ( isset( $single_post_type->taxonomy ) ) {
			    if ( $tax = get_the_terms( $post->ID, get_post_taxonomies() ) ) {
			    	foreach ( $tax as $term )   { 
			    		// Remove tags and categories from results
			    		if  ( $term->taxonomy != 'post_tag' )	{
			    			if  ( $term->taxonomy != 'category' )   { 
			    				$c[] = 's-tax-' . $term->taxonomy;
			    				$c[] = 's-' . $term->taxonomy . '-' . $term->slug;
			    			}
			    		}
			    	}
			    }
			}
			
			// Adds MIME-specific classes for attachments
			if ( is_attachment() ) {
				$mime_type = get_post_mime_type();
				$mime_prefix = array( 'application/', 'image/', 'text/', 'audio/', 'video/', 'music/' );
					$c[] = 'attachmentid-' . $postID . ' attachment-' . str_replace( $mime_prefix, "", "$mime_type" );
			}
	
			// Adds author class for the post author
			$c[] = 's-author-' . sanitize_title_with_dashes( strtolower( get_the_author_meta( 'user_nicename', $post->post_author ) ) );
			rewind_posts();
			
		}
	
		// Author name classes for BODY on author archives
		elseif ( is_author() && apply_filters( 'thematic5_show_bc_authorarchives', TRUE ) ) {
			$author = $wp_query->get_queried_object();
			$c[] = 'author';
			$c[] = 'author-' . $author->user_nicename;
		}
	
		// Page author for BODY on 'pages'
		elseif ( is_page() && apply_filters( 'thematic5_show_bc_pages', TRUE ) ) {
			$pageID = $wp_query->post->ID;
			$page_children = wp_list_pages( "child_of=$pageID&echo=0" );
			the_post();
	
	        // Adds post slug class, prefixed by 'slug-'
	        $c[] = 'slug-' . $wp_query->post->post_name;
	
			$c[] = 'page pageid-' . $pageID;
			
			$c[] = 'page-author-' . sanitize_title_with_dashes( strtolower( get_the_author_meta( 'user_nicename', $post->post_author) ) );
			
			// Checks to see if the page has children and/or is a child page; props to Adam
			if ( $page_children )
				$c[] = 'page-parent';
			if ( $wp_query->post->post_parent )
				$c[] = 'page-child parent-pageid-' . $wp_query->post->post_parent;		
				
			rewind_posts();
		}
	
		// Search classes for results or no results
		elseif ( is_search() && apply_filters( 'thematic5_show_bc_search', TRUE ) ) {
			the_post();
			if ( $wp_query->found_posts > 0 ) {
				$c[] = 'search-results';
			} else {
				$c[] = 'search-no-results';
			}
			rewind_posts();
		}
	
	 // Paged classes; for page x > 1 classes of index and all post types etc.
		if ( isset( $post ) && apply_filters( 'thematic5_show_bc_pagex', TRUE ) ) {
			if ( ( ( ( $page = $wp_query->get( 'paged' ) ) || ( $page = $wp_query->get('page') ) ) && $page > 1 ) ) {
				// Thanks to Prentiss Riddle, twitter.com/pzriddle, for the security fix below. 
				$page = intval( $page ); // Ensures that an integer (not some dangerous script) is passed for the variable
 					$c[] = 'paged-' . $page;
 				if ( thematic5_is_custom_post_type() ) {
 							$c[] = str_replace( '_','-',$post->post_type ) . '-paged-' . $page;
 					} elseif ( is_single() && $post->post_type=="post"  ) {
				        $c[] = 'single-paged-' . $page;
					} elseif ( is_page() ) {
				        $c[] = 'page-paged-' . $page;
					} elseif ( is_category() ) {
				        $c[] = 'category-paged-' . $page;
					} elseif ( is_tag() ) {
				        $c[] = 'tag-paged-' . $page;
					} elseif ( is_tax() ) {
				        $c[] = 'taxonomy-paged-' . $page;
					} elseif ( is_date() ) {
				        $c[] = 'date-paged-' . $page;
					} elseif ( is_author() ) {
				        $c[] = 'author-paged-' . $page;
					} elseif ( is_search() ) {
				        $c[] = 'search-paged-' . $page;
 				} 
 			// Paged classes; for page x = 1	For all post types
 			} elseif ( strpos( $post->post_content, '<!--nextpage-->') )  { 
 				if ( thematic5_is_custom_post_type() ) {
				    	$c[] = str_replace( '_','-',$post->post_type ) . '-paged-1';
 				    } elseif (is_page()) {
				    	$c[] = 'page-paged-1';
 				    } elseif (is_single())  {
				    	$c[] = 'single-paged-1';
				}
  			}
  		}
		return array_unique ($c);
}
add_filter( 'body_class', 'thematic5_add_body_class' );


/**
 * Define the num val for 'alt' classes (in post DIV and comment LI)
 * 
 * @var int  (default value: 1)
 */
$thematic5_post_alt = 1;
$thematic5_comment_alt = 1;


/**
 * Generates semantic classes for each post DIV element
 */
function thematic5_add_post_class( $c ) {
	global $post, $thematic5_post_alt, $thematic5_content_length, $taxonomy;

	// 'alt' for every other post DIV
	$c[] = "p$thematic5_post_alt"; 
	
	// post type
	$c[] = str_replace( '_', '-', $post->post_type) ; 
	
	// post status
	$c[] = $post->post_status;

	// Author for the post queried
	$c[] = 'author-' . sanitize_title_with_dashes( strtolower( get_the_author_meta( 'user_login' ) ) );

	// Category for the post queried
	foreach ( ( array ) get_the_category() as $cat )
		$c[] = 'category-' . $cat->slug;
		
	// Tags for the post queried; if not tagged, use .untagged
	if ( get_the_tags() == null ) {
		$c[] = 'untagged';
	} else {
		foreach ( ( array ) get_the_tags() as $tag )
			$c[] = 'tag-' . $tag->slug;
	}
		
	if (function_exists('get_post_type_object')) {
		// Taxonomies and terms for the post queried
		$single_post_type = get_post_type_object( get_post_type( $post->ID ) );
		// Check for post types without taxonomy inclusion
		if ( isset($single_post_type->taxonomy) ) {
			foreach ( ( array ) get_the_terms( $post->ID, get_post_taxonomies() )  as $term  )   {
				// Remove tags and categories from results
				if  ( $term->taxonomy != 'category' )	{
					if  ( $term->taxonomy != 'post_tag' )   { 
						$c[] = 'p-tax-' . $term->taxonomy;
						$c[] = 'p-' . $term->taxonomy . '-' . $term->slug;
					}
				}
			}
		}
	}

	// For posts displayed as full content
	if ($thematic5_content_length == 'full')
		$c[] = 'is-full';

	// For posts displayed as excerpts
	if ($thematic5_content_length == 'excerpt') {
		$c[] = 'is-excerpt';
		if ( has_excerpt() && !preg_match( '/<!--more(.*?)?-->/', $post->post_content ) ) {
			// For wp-admin Write Page generated excerpts
			$c[] = 'custom-excerpt';
		} else {
			// For automatically generated excerpts
			$c[] = 'auto-excerpt';
		}
	}
		
	// For single posts that had a wp-admin Write Page generated excerpt  
	if ( has_excerpt() && is_single() )
		$c[] = 'has-excerpt';
		
	//	For posts using more tag
	if ( preg_match( '/<!--more(.*?)?-->/', $post->post_content ) ) {	
		if ( !is_single() ) {
			$c[] = 'wp-teaser';
		} elseif ( is_single() ) {
			$c[] = 'has-teaser';
		}
	}
						
	// For posts with comments open or closed
	if ( comments_open() ) {
		$c[] = 'comments-open';		
	} else {
		$c[] = 'comments-closed';
	}
	
	// For posts with pings open or closed
	if (pings_open()) {
		$c[] = 'pings-open';
	} else {
		$c[] = 'pings-closed';
	}
	
	// For password-protected posts
	if ( $post->post_password )
		$c[] = 'protected';
	
	// For sticky posts
	if (is_sticky())
	   $c[] = 'sticky';

	// Applies the time- and date-based classes (below) to post DIV
	thematic5_date_classes( mysql2date( 'U', $post->post_date ), $c );
	
	// If it's the other to the every, then add 'alt' class
	if ( ++$thematic5_post_alt % 2 )
		$c[] = 'alt';
	
    // Adds post slug class, prefixed by 'slug-'
    $c[] = 'slug-' . $post->post_name;
	
	// And tada!
	return array_unique($c);
}
add_filter('post_class','thematic5_add_post_class');


/** 
 * Adds classes to commment li's using the WordPress comment_class filter
 *
 * @since 0.9.8
 */
function thematic5_add_comment_class($classes) {
    global $comment, $post;

    // Add time and date based classes
    thematic5_date_classes( mysql2date( 'U', $comment->comment_date ), $classes, 'thm-c-' );
	
	// If it's the other to the every, then add 'alt' class
	if ( ++$thematic5_comment_alt % 2 )
		$classes = 'alt';

    // Do not duplicate values
    return array_unique( $classes );
}

add_filter( 'comment_class', 'thematic5_add_comment_class', 20 );



if ( function_exists( 'childtheme_override_date_classes' ) )  {
	/**
	 * @ignore
	 */
	function thematic5_date_classes() {
		childtheme_override_date_classes();
	}
} else {
	/**
	 * Generates time and date based classes relative to GMT (UTC)
	 */
	function thematic5_date_classes( $t, &$c, $p = '' ) {
		$t = $t + ( get_option('gmt_offset') * 3600 );
		$c[] = $p . 'y' . gmdate( 'Y', $t ); // Year
		$c[] = $p . 'm' . gmdate( 'm', $t ); // Month
		$c[] = $p . 'd' . gmdate( 'd', $t ); // Day
		$c[] = $p . 'h' . gmdate( 'H', $t ); // Hour
	}
}

// Remember: Thematic, like The Sandbox, is for play.

?>