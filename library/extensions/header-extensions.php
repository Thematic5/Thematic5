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
    $content = '<!doctype html>' . "\n";
    echo apply_filters( 'thematic5_create_doctype', $content );
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
	 * Located in header.php Credits: Tarski Theme
	 * 
	 * Override: childtheme_override_doctitle
	 * Filter: thematic5_doctitle_separator
	 * Filter: thematic5_doctitle
	 */
	function thematic5_doctitle() {
		$site_name = get_bloginfo('name' , 'display');
	    $separator = apply_filters('thematic5_doctitle_separator', '|');
	        	
	    if ( is_single() ) {
	      $content = single_post_title('', FALSE);
	    }
	    elseif ( is_home() || is_front_page() ) { 
	      $content = get_bloginfo('description', 'display');
	    }
	    elseif ( is_page() ) { 
	      $content = single_post_title('', FALSE); 
	    }
	    elseif ( is_search() ) { 
	      $content = __('Search Results for:', 'thematic5'); 
	      $content .= ' ' . get_search_query();
	    }
	    elseif ( is_category() ) {
	      $content = __('Category Archives:', 'thematic5');
	      $content .= ' ' . single_cat_title('', FALSE);;
	    }
	    elseif ( is_tag() ) { 
	      $content = __('Tag Archives:', 'thematic5');
	      $content .= ' ' . thematic5_tag_query();
	    }
	    elseif ( is_404() ) { 
	      $content = __('Not Found', 'thematic5'); 
	    }
	    else { 
	      $content = get_bloginfo('description', 'display');
	    }
	
	    if ( get_query_var('paged') ) {
	      $content .= ' ' .$separator. ' ';
	      $content .= 'Page';
	      $content .= ' ';
	      $content .= get_query_var('paged');
	    }
	
	    if($content) {
	      if ( is_home() || is_front_page() ) {
	          $elements = array(
	            'site_name' => $site_name,
	            'separator' => $separator,
	            'content' => $content
	          );
	      }
	      else {
	          $elements = array(
	            'content' => $content
	          );
	      }  
	    } else {
	      $elements = array(
	        'site_name' => $site_name
	      );
	    }
	
	    // Filters should return an array
	    $elements = apply_filters('thematic5_doctitle', $elements);
		
	    // But if they don't, it won't try to implode
	    if( is_array($elements) ) {
	      $doctitle = implode(' ', $elements);
	    }
	    else {
	      $doctitle = $elements;
	    }
	    
	    $doctitle = "<title>" . $doctitle . "</title>" . "\n";
	    
	    echo $doctitle;
	} // end thematic5_doctitle
}


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
 * This can be switched on or off using thematic5_show_description
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


/**
 * Switch creating the meta-tag description
 * 
 * Default: ON
 * 
 * Filter: thematic5_show_description
 */
function thematic5_show_description() {
    $display = TRUE;
    $display = apply_filters('thematic5_show_description', $display);
    if ( $display ) {
        thematic5_create_description();
    }
} // end thematic5_show_description


/**
 * Create the robots meta-tag
 * 
 * This can be switched on or off using thematic5_show_robots
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


/**
 * Switch creating the robots meta-tag
 * 
 * Default: ON
 * 
 * Filter: thematic5_show_robots
 */
function thematic5_show_robots() {
    $display = TRUE;
    $display = apply_filters('thematic5_show_robots', $display);
    if ( $display ) {
        thematic5_create_robots();
    }
} // end thematic5_show_robots

/**
 * Display pingback link
 * 
 * This can be switched on or off using thematic5_show_pingback. Default: ON
 * 
 * Filter: thematic5_show_pingback
 * Filter: thematic5_pingback_url
 */
function thematic5_show_pingback() {
    $display = TRUE;
    $display = apply_filters('thematic5_show_pingback', $display);
    if ($display) {
        $content = '<link rel="pingback" href="';
        $content .= get_bloginfo('pingback_url');
        $content .= '" />';
        $content .= "\n";
        echo apply_filters('thematic5_pingback_url',$content);
    }
}

/**
 * Add the default stylesheet to the head of the document.
 * 
 * Register and enqueue Thematic style.css
 * 
 * @todo check WP versions > 3.3 for addiytion of wp_enqueue_styles
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

add_action('thematic5_header','thematic5_brandingclose',7);


if ( function_exists('childtheme_override_access') )  {
    /**
	 * @ignore
	 */
	 function thematic5_access() {
    	childtheme_override_access();
    }
} else {
    /**
     * Display the #access nav
     * 
     * Override: childtheme_override_access
     */    
    function thematic5_access() { 
    ?>
    
    <nav id="access" role="navigation">
		<h1 class="assistive-text"><?php _e( 'Menu', 'thematic5' ); ?></h1>
    	<div class="assistive-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip navigation to the content', 'thematic5' ); ?>"><?php _e('Skip to content', 'thematic5'); ?></a></div><!-- .skip-link -->
    	
    	<?php 
    	if (  has_nav_menu( apply_filters('thematic5_primary_menu_id', 'primary-menu') ) ) {
    	    echo  wp_nav_menu(thematic5_nav_menu_args());
    	} else {
    	    echo  thematic5_add_menuclass(wp_page_menu(thematic5_page_menu_args()));	
    	}
    	?>
    	
    </nav><!-- #access -->
    <?php 
    }
}
add_action('thematic5_header','thematic5_access',9);


/**
 * Register action hook: thematic5_belowheader
 * 
 * Located in header.php, just after the header div
 */
function thematic5_belowheader() {
    do_action('thematic5_belowheader');
} // end thematic5_belowheader
		

?>