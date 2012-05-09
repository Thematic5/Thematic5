<?php
/**
 * Header Extensions
 *
 * @package ThematicCoreLibrary
 * @subpackage HeaderExtensions
 */
  

/**
 * Display the DOCTYPE
 * 
 * Filter: thematic5_create_doctype
 */
function thematic5_create_doctype() {
    echo apply_filters( 'thematic5_create_doctype', '<!doctype html>' . "\n" );
}

/**
 * Display the HTML Tag with Language Attributes
 * Users conditional comments to target old versions of Internet Explorer
 * http://paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ 
 *
 * Filter: thematic5_create_html
 */
function thematic5_create_html() {

	ob_start(); ?>
	
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes() ?>> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" <?php language_attributes() ?>> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" <?php language_attributes() ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes() ?>> <!--<![endif]-->
	
	<?php
	
	$content = ob_get_contents();
	ob_end_clean();

    echo apply_filters( 'thematic5_create_html', $content );
}



/**
 * Display the HEAD profile
 * 
 * Filter: thematic5_head_profile
 */
function thematic5_head_profile() {
    $content = '<head profile="http://gmpg.org/xfn/11">' . "\n";
    echo apply_filters('thematic5_head_profile', $content );
}

/**
 * Register action hook: thematic5_head
 * 
 * Located in header.php, just before wp_head()
 */
function thematic5_head() {
    do_action('thematic5_head');
} // end thematic5_head
		

/**
 * Display the META content-type
 * 
 * Filter: thematic5_create_contenttype
 */
function thematic5_create_contenttype() {
    $content = "<meta http-equiv=\"Content-Type\" content=\"";
    $content .= get_bloginfo('html_type'); 
    $content .= "; charset=";
    $content .= get_bloginfo('charset');
    $content .= "\" />";
    $content .= "\n";
    echo apply_filters('thematic5_create_contenttype', $content);
}
add_action('thematic5_head','thematic5_create_contenttype', 10);


if ( function_exists('childtheme_override_doctitle') )  {
	/**
	 * @ignore
	 */
	 function thematic5_doctitle() {
    	childtheme_override_doctitle();
    }
} else {
	/**
	 * Display the content of the title tag
	 * 
	 * Override: childtheme_override_doctitle
	 * Filter: thematic5_doctitle_separator
	 */
	function thematic5_doctitle() {
		$separator = apply_filters('thematic5_doctitle_separator', '|');
	
	    $doctitle = "<title>" . wp_title( $separator, false, 'right' ) . "</title>" . "\n";

	    echo $doctitle;
	} // end thematic5_doctitle
}
add_action('thematic5_head','thematic5_doctitle', 20);


/**
 * Filter the document title to output contextual content
 * 
 * Credits to Oenology theme
 * 
 * Filter: thematic5_doctitle
 */
function thematic5_wptitle( $title, $separator ) {
    
	// Don't affect wp_title() calls in feeds or if we use SEO plugins.
	if ( is_feed() || !thematic5_seo() )
		return $title;
        	
	// The $paged global variable contains the page number of a listing of posts.
	// The $page global variable contains the page number of a single post that is paged.
	// We'll display whichever one applies, if we're not looking at the first page.
	global $paged, $page;

	if ( is_search() ) {
		// If we're a search, let's start over:
		$title = sprintf( 'Search results for %s', '"' . get_search_query() . '"' );
		// Add a page number if we're on page 2 or more:
		if ( $paged >= 2 )
		$title .= " $separator " . sprintf( 'Page %s', $paged );
		// Add the site name to the end:
		$title .= " $separator " . get_bloginfo( 'name', 'display' );
		// We're done. Let's send the new title back to wp_title():
		return $title;
	}

	// Otherwise, let's start by adding the site name to the end:
	$title .= get_bloginfo( 'name', 'display' );

	// If we have a site description and we're on the home/front page, add the description:
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title .= " $separator " . $site_description;

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		$title .= " $separator " . sprintf( 'Page %s', max( $paged, $page ) );

	$title = apply_filters( 'thematic5_doctitle', $title, $separator);
	
	return $title;
}
add_filter('wp_title','thematic5_wptitle', 10, 2);


/**
 * Switch Thematic's SEO functions on or off
 * 
 * Provides compatibility with SEO plugins: All in One SEO Pack, HeadSpace, 
 * Platinum SEO Pack, wpSEO and Yoast SEO. Default: ON
 * 
 * Filter: thematic5_seo
 */
function thematic5_seo() {
	if ( class_exists('All_in_One_SEO_Pack') || class_exists('HeadSpace_Plugin') || class_exists('Platinum_SEO_Pack') || class_exists('wpSEO') || defined('WPSEO_VERSION') ) {
		$content = FALSE;
	} else {
		$content = true;
	}
		return apply_filters( 'thematic5_seo', $content );
}


/**
 * Switch use of thematic5_the_excerpt() in the meta-tag description
 * 
 * Default: ON
 * 
 * Filter: thematic5_use_excerpt
 */
function thematic5_use_excerpt() {
    $display = TRUE;
    $display = apply_filters('thematic5_use_excerpt', $display);
    return $display;
}


/**
 * Switch use of thematic5_use_autoexcerpt() in the meta-tag description
 * 
 * Default: OFF
 * 
 * Filter: thematic5_use_autoexcerpt
 */
function thematic5_use_autoexcerpt() {
    $display = FALSE;
    $display = apply_filters('thematic5_use_autoexcerpt', $display);
    return $display;
}


/**
 * Display the meta-tag description
 * 
 * Filter: thematic5_create_description
 */
function thematic5_create_description() {
	$content = '';
	if ( thematic5_seo() ) {  
    	if ( is_single() || is_page() ) { 
      		if ( have_posts() ) { 
          		while ( have_posts() ) { 
            		the_post();
					if ( thematic5_the_excerpt() == "" ) { 
                        if ( thematic5_use_autoexcerpt() ) { 
					    	$content = '<meta name="description" content="';
                    		$content .= thematic5_excerpt_rss();
                    		$content .= '" />';
                    		$content .= "\n";
                        }
                	} else {
                        if ( thematic5_use_excerpt() ) {
                    		$content = '<meta name="description" content="';
                    		$content .= thematic5_the_excerpt();
                    		$content .= '" />';
                    		$content .= "\n";
                        }
                	}
            	}
        	}
        } elseif ( is_home() || is_front_page() ) {
    		$content = '<meta name="description" content="';
    		$content .= get_bloginfo( 'description', 'display' );
    		$content .= '" />';
    		$content .= "\n";
        }
        echo apply_filters ('thematic5_create_description', $content);
	}
} // end thematic5_create_description
add_action('thematic5_head','thematic5_create_description', 30);


/**
 * Create the mobile viewport meta-tag
 * 
 * Filter: thematic5_mobile_viewport
 */
function thematic5_mobile_viewport() {
    $content = '<meta name="viewport" content="width=device-width">' . "\n";
    echo apply_filters('thematic5_mobile_viewport', $content);
} // end thematic5_mobile_viewport
add_action('thematic5_head','thematic5_mobile_viewport', 40);


/**
 * Create the robots meta-tag
 * 
 * Filter: thematic5_create_robots
 */
function thematic5_create_robots() {
        global $paged;
		if ( thematic5_seo() ) {
    		if ( ( is_home() && ( $paged < 2 ) ) || is_front_page() || is_single() || is_page() || is_attachment() ) {
				$content = '<meta name="robots" content="index,follow" />';
    		} elseif ( is_search() ) {
        		$content = '<meta name="robots" content="noindex,nofollow" />';
    		} else {	
        		$content = '<meta name="robots" content="noindex,follow" />';
    		}
    		$content .= "\n";
    		if ( get_option('blog_public') ) {
    				echo apply_filters('thematic5_create_robots', $content);
    		}
		}
} // end thematic5_create_robots
add_action('thematic5_head','thematic5_create_robots', 50);


/**
 * Display pingback link
 * 
 * This can be switched on or off using thematic5_show_pingback. Default: ON
 * 
 * Filter: thematic5_pingback_url
 */
function thematic5_show_pingback() {
    $content = '<link rel="pingback" href="';
    $content .= get_bloginfo('pingback_url');
    $content .= '" />';
    $content .= "\n";
    echo apply_filters('thematic5_pingback_url',$content);
}
add_action('thematic5_head','thematic5_show_pingback', 60);

/**
 * Display pingback link
 * 
 * This can be switched on or off using thematic5_show_pingback. Default: ON
 * 
 * Filter: thematic5_pingback_url
 */
function thematic5_html5js() {
    $content = '<!--[if lt IE 9]>';
	$content .= '<script src="'. get_template_directory_uri(). '/js/html5.js" type="text/javascript"></script>';
	$content .= '<![endif]-->' . "\n";

    echo apply_filters('thematic5_html5js',$content);
}
add_action('thematic5_head','thematic5_html5js', 70);




/**
 * Add the default stylesheet to the head of the document.
 * 
 * Register and enqueue Thematic style.css
 * 
 * @todo check WP versions > 3.3 for addition of wp_enqueue_styles
 */
function thematic5_create_stylesheet() {
	wp_enqueue_style( 'thematic5_style', get_stylesheet_uri() );
}
add_action('wp_enqueue_scripts','thematic5_create_stylesheet');


if ( function_exists('childtheme_override_head_scripts') )  {
    /**
     * @ignore
     */
    function thematic5_head_scripts() {
    	childtheme_override_head_scripts();
    }
} else {
    /**
     * Adds comment reply and navigation menu scripts to the head of the document.
     *
     * Child themes should use wp_dequeue_scripts to remove individual scripts.
     * Larger changes can be made using the override.
     *
     * Override: childtheme_override_head_scripts <br>
     *
     * For Reference: {@link http://users.tpg.com.au/j_birch/plugins/superfish/#getting-started Superfish Jquery Plugin}
     *
     * @since 0.9.8
     */
    function thematic5_head_scripts() {
    	
    	// load comment reply script on posts and pages when option is set and check for deprecated filter
    	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
			has_filter( 'thematic5_show_commentreply' ) ? thematic5_show_commentreply() : wp_enqueue_script( 'comment-reply' );
		
		// load jquery and superfish associated plugins when theme support is active and not in admin
    	if ( !is_admin() && current_theme_supports('thematic5_superfish') ) {
			$scriptdir = get_template_directory_uri();
			$scriptdir .= '/library/scripts/';
			wp_enqueue_script('jquery');
			wp_enqueue_script('hoverIntent');
		
			wp_enqueue_script('superfish', $scriptdir . 'superfish.js', array('jquery') );
			wp_enqueue_script('supersubs', $scriptdir . 'supersubs.js', array('jquery'));
			wp_enqueue_script('thematic-dropdowns', apply_filters('thematic5_dropdown_options', $scriptdir . 'thematic-dropdowns.js') , array('jquery', 'superfish' ));
     	
     	}
 	}
 }

add_action('wp_enqueue_scripts','thematic5_head_scripts');


/**
 * Return the default arguments for wp_page_menu()
 * 
 * This is used as fallback when the user has not created a custom nav menu in wordpress admin
 * 
 * Filter: thematic5_page_menu_args
 *
 * @return array
 */
function thematic5_page_menu_args() {
	$args = array (
		'sort_column' => 'menu_order',
		'menu_class'  => 'menu',
		'include'     => '',
		'exclude'     => '',
		'echo'        => FALSE,
		'show_home'   => FALSE,
		'link_before' => '',
		'link_after'  => ''
	);
	return apply_filters('thematic5_page_menu_args', $args);
}


/**
 * Return the default arguments for wp_nav_menu
 * 
 * Filter: thematic5_primary_menu_id <br>
 * Filter: thematic5_nav_menu_args
 *
 * @return array
 */
function thematic5_nav_menu_args() {
	$args = array (
		'theme_location'	=> apply_filters('thematic5_primary_menu_id', 'primary-menu'),
		'menu'				=> '',
		'container'			=> 'div',
		'container_class'	=> 'menu',
		'menu_class'		=> 'sf-menu',
		'fallback_cb'		=> 'wp_page_menu',
		'before'			=> '',
		'after'				=> '',
		'link_before'		=> '',
		'link_after'		=> '',
		'depth'				=> 0,
		'walker'			=> '',
		'echo'				=> false
	);
	
	return apply_filters('thematic5_nav_menu_args', $args);
}


/**
 * Switch adding superfish css class to wp_page_menu
 * 
 * This adds a css class of "sf-menu" to the first <ul> of wp_page_menu. Default: ON
 * Switchable using included filter.
 * 
 * Filter: thematic5_use_superfish
 *
 * @param string
 * @return string
 */
function thematic5_add_menuclass($ulclass) {
	if ( apply_filters( 'thematic5_use_superfish', TRUE ) ) {
		return preg_replace( '/<ul>/', '<ul class="sf-menu">', $ulclass, 1 );
	} else {
		return $ulclass;
	}
}


/**
 * Register action hook: thematic5_before
 * 
 * Located in header.php, just after the opening body tag, before anything else.
 */
function thematic5_before() {
    do_action( 'thematic5_before' );
}


/**
 * Register action hook: thematic5_abovefooter
 * 
 * Located in header.php, inside the header div
 */
function thematic5_aboveheader() {
    do_action( 'thematic5_aboveheader' );
}


/**
 * Register action hook: thematic5_abovefooter
 * 
 * Located in header.php, inside the header div
 */
function thematic5_header() {
    do_action( 'thematic5_header' );
}


if ( function_exists( 'childtheme_override_brandingopen' ) )  {
	/**
	 * @ignore
	 */
	function thematic5_brandingopen() {
		childtheme_override_brandingopen();
		}
	} else {
	/**
	 * Display the opening of the #branding div
	 * 
	 * Override: childtheme_override_brandingopen
	 */
    function thematic5_brandingopen() {
    	echo "\t<div id=\"branding\">\n";
    }
}

add_action( 'thematic5_header','thematic5_brandingopen',1 );


if ( function_exists( 'childtheme_override_blogtitle' ) )  {
	/**
	 * @ignore
	 */
    function thematic5_blogtitle() {
    	childtheme_override_blogtitle();
    }
} else {
    /**
     * Display the blog title within the #branding div
     * 
     * Override: childtheme_override_blogtitle
     */    
    function thematic5_blogtitle() { 
    ?>
    
    	<div id="blog-title"><span><a href="<?php echo home_url() ?>/" title="<?php bloginfo('name') ?>" rel="home"><?php bloginfo('name') ?></a></span></div>
    
    <?php 
    }
}

add_action('thematic5_header','thematic5_blogtitle',3);


if ( function_exists('childtheme_override_blogdescription') )  {
	/**
	 * @ignore
	 */
    function thematic5_blogdescription() {
    	childtheme_override_blogdescription();
    }
} else {
    /**
     * Display the blog description within the #branding div
     * 
     * Override: childtheme_override_blogdescription
     */
    function thematic5_blogdescription() {
    	$blogdesc = '"blog-description">' . get_bloginfo('description', 'display');
    	if ( is_home() || is_front_page() ) { 
        	echo "\t<h1 id=$blogdesc</h1>\n\n";
        } else {	
        	echo "\t<div id=$blogdesc</div>\n\n";
        }
    }
}

add_action('thematic5_header','thematic5_blogdescription',5);


if (function_exists('childtheme_override_header_asides'))  {
	/**
	 * @ignore
	 */
	function thematic5_header_asides() {
		childtheme_override_header_asides();
	}
} else {
	/**
	 * Create the widget area in header
	 * 
	 * Override: childtheme_override_header_asides
	 */
	function thematic5_header_asides() {
	      	
		// action hook for placing content above the header widget area
		thematic5_aboveheaderaside();
		
		// action hook for creating the header widget area
		thematic5_widget_area_header_aside();
		
		// action hook for placing content below header widget area
		thematic5_belowheaderaside();
   	}
}

add_action('thematic5_header', 'thematic5_header_aside', 7);


if ( function_exists('childtheme_override_brandingclose') )  {
	/**
	 * @ignore
	 */
	 function thematic5_brandingclose() {
    	childtheme_override_brandingclose();
    }
} else {
    /**
     * Display the closing of the #branding div
     * 
     * Override: childtheme_override_brandingclose
     */    
    function thematic5_brandingclose() {
    	echo "\t\t</div><!--  #branding -->\n";
    }
}

add_action('thematic5_header','thematic5_brandingclose', 9);


if ( function_exists('childtheme_override_access') )  {
    /**
	 * @ignore
	 */
	 function thematic5_access() {
    	childtheme_override_access();
    }
} else {
    /**
     * Display the #access div
     * 
     * Override: childtheme_override_access
     */    
    function thematic5_access() { 
    ?>
    
    <div id="access">
    
    	<div class="skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip navigation to the content', 'thematic5' ); ?>"><?php _e('Skip to content', 'thematic5'); ?></a></div><!-- .skip-link -->
    	
    	<?php 
    	if ( ( function_exists("has_nav_menu") ) && ( has_nav_menu( apply_filters('thematic5_primary_menu_id', 'primary-menu') ) ) ) {
    	    echo  wp_nav_menu(thematic5_nav_menu_args());
    	} else {
    	    echo  thematic5_add_menuclass(wp_page_menu(thematic5_page_menu_args()));	
    	}
    	?>
    	
    </div><!-- #access -->
    <?php 
    }
}

add_action('thematic5_header','thematic5_access', 11);


/**
 * Register action hook: thematic5_belowheader
 * 
 * Located in header.php, just after the header div
 */
function thematic5_belowheader() {
    do_action('thematic5_belowheader');
} // end thematic5_belowheader
		

?>