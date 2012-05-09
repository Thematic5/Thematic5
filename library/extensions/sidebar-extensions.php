<?php

/**
 * Sidebars Extensions
 *
 * @package ThematicCoreLibrary
 * @subpackage SidebarExtensions
 */


/**
 * Get the standard sidebar
 *
 * This includes the primary and secondary widget areas. 
 * The sidebar can be switched on or off using thematic5_sidebar. <br>
 * Default: ON <br>
 * 
 * Filter: thematic5_sidebar
 */
function thematic5_sidebar() {
	$show = TRUE;
	$show = apply_filters('thematic5_sidebar', $show);
	
	if ($show)
    	get_sidebar();
	
	return;
} // end thematic5_sidebar


/* 
 * Main Aside Hooks
 */


/**
 * Register action hook: thematic5_abovemainasides 
 *
 * Located in sidebar.php
 * Just before the main asides (commonly used as sidebars)
 */
function thematic5_abovemainasides() {
    do_action('thematic5_abovemainasides');
}


/**
 * Register action hook: widget_area_primary_aside 
 *
 * Located in sidebar.php
 * Regular hook for primary widget area
 */
function thematic5_widget_area_primary_aside() {
    do_action('widget_area_primary_aside');
}


/**
 * Register action hook: thematic5_betweenmainasides 
 *
 * Located in sidebar.php
 * Between the main asides (commonly used as sidebars)
 */
function thematic5_betweenmainasides() {
    do_action('thematic5_betweenmainasides');
}


/**
 * Register action hook: widget_area_secondary_aside 
 *
 * Located in sidebar.php
 * Regular hook for secondary widget area
 */
function thematic5_widget_area_secondary_aside() {
    do_action('widget_area_secondary_aside');
}


/**
 * Register action hook: thematic5_belowmainasides 
 *
 * Located in sidebar.php
 * Just after the main asides (commonly used as sidebars)
 */
function thematic5_belowmainasides() {
    do_action('thematic5_belowmainasides');
}


/*
 * Index Aside Hooks
 */


/*	
 * Register action hook: thematic5_abovecontenttop 
 *
 * Located in sidebar-content-top.php
 * Just above the 'content-top' widget area
 */
function thematic5_abovecontenttop() {
	do_action('thematic5_abovecontenttop');
}


/**
 * Register action hook: widget_area_content_top
 *
 * Located in sidebar.php
 * Regular hook for the 'content-top' widget area
 */
function thematic5_widget_area_content_top() {
    do_action('widget_area_content_top');
}

	
/**
 * Register action hook: thematic5_belowcontenttop 
 *
 * Located in sidebar-content-top.php
 * Just below the 'content-top' widget area
 */
function thematic5_belowcontenttop() {
    do_action('thematic5_belowcontenttop');
}


/**
 * Register action hook: thematic5_aboveindexinsert 
 *
 * Located in sidebar-index-insert.php
 * Just before the 'index-insert' widget area
 */
function thematic5_aboveindexinsert() {
    do_action('thematic5_aboveindexinsert');
}


/**
 * Register action hook: widget_area_index_insert
 * 
 * Located in sidebar-index-insert.php
 * Regular hook for the 'index-insert' widget area
 */
function thematic5_widget_area_index_insert() {
	do_action('widget_area_index_insert');
}
	
	
/**
 * Register action hook: thematic5_belowindexinsert 
 *
 * Located in sidebar-index-insert.php
 * Just after the 'index-insert' widget area
 */
function thematic5_belowindexinsert() {
    do_action('thematic5_belowindexinsert');
}	


/**
 * Register action hook: thematic5_abovecontentbottom 
 *
 * Located in sidebar-content-bottom.php
 * Just above the 'content-bottom' widget area
 */
function thematic5_abovecontentbottom() {
    do_action('thematic5_abovecontentbottom');
}
	

/**
 * Register action hook: widget_area_content_bottom 
 *
 * Located in sidebar-content-bottom.php
 * Regular hook for the 'content-bottom' widget area
 */	
function thematic5_widget_area_content_bottom() {
    do_action('widget_area_content_bottom');
}
	
	
/**
 * Register action hook: thematic5_belowcontentbottom 
 *
 * Located in sidebar-content-bottom.php
 * Just below the 'index-bottom' widget area
 */	
function thematic5_belowcontentbottom() {
    do_action('thematic5_belowcontentbottom');
}
	


/*
 * 404 Aside Hooks
 */


/**
 * Register action hook: thematic5_above404 
 *
 * Located in sidebar-404.php
 * Just above the '404-aside' widget area
 */
function thematic5_above404() {
    do_action('thematic5_above404');
}


/**
 * Register action hook: widget_area_404_aside 
 *
 * Located in sidebar-404.php
 * Regular hook for the '404-aside' widget area
 */
function thematic5_widget_area_404_aside() {
    do_action('widget_area_404_aside');
}


/**
 * Register action hook: thematic5_below404 
 *
 * Located in sidebar-404.php
 * Just below the '404-aside' widget area
 */
function thematic5_below404() {
    do_action('thematic5_below404');
} // end thematic5_belowpagetop




/*
 * Header Aside Hooks
 */


/**
 * Register action hook: thematic5_aboveheaderaside 
 *
 * Just above the header widget area
 */
function thematic5_aboveheaderaside() {
    do_action('thematic5_aboveheaderaside');
}

/**
 * Register action hook: widget_area_subsidiaries 
 *
 * Regular hook for the header widget area
 */
function thematic5_widget_area_header_aside() {
    do_action('widget_area_header_aside');
}


/**
 * Register action hook: thematic5_belowheaderaside 
 *
 * Just below the header widget area
 */
function thematic5_belowheaderaside() {
    do_action('thematic5_belowheaderaside');
}





/*
 * Subsidiary Aside Hooks
 */


/**
 * Register action hook: thematic5_abovesubasides 
 *
 * Located in sidebar-subsidiary.php
 * Just above the subsidiary widget areas
 */
function thematic5_abovesubasides() {
    do_action('thematic5_abovesubasides');
}


/**
 * Register action hook: thematic5_belowsubasides 
 *
 * Located in sidebar-subsidiary.php
 * Just below the subsidiary widget areas
 */
function thematic5_belowsubasides() {
    do_action('thematic5_belowsubasides');
}


/**
 * Open the #subsidiary div
 * 
 * Will only display if there is a widget in one of the subsidiary asides
 */
function thematic5_subsidiaryopen() {
    if ( is_active_sidebar('1st-subsidiary-aside') || is_active_sidebar('2nd-subsidiary-aside') || is_active_sidebar('3rd-subsidiary-aside') ) { // one of the subsidiary asides has a widget ?>
        
        <div id="subsidiary">
        
    <?php
    }
}
add_action('widget_area_subsidiaries', 'thematic5_subsidiaryopen', 10);


/**
 * Register action hook: thematic5_before_first_sub 
 *
 * Is only available if there is a widget in one of the subsidiary asides
 */
function thematic5_before_first_sub() {
    do_action('thematic5_before_first_sub');
}


/**
 * Add the thematic5_before_first_sub hook within the #subsidiary div
 *
 * Will only add the hook if there is a widget in one of the subsidiary asides
 */
function thematic5_add_before_first_sub() {
    if ( is_active_sidebar('1st-subsidiary-aside') || is_active_sidebar('2nd-subsidiary-aside') || is_active_sidebar('3rd-subsidiary-aside') ) { // one of the subsidiary asides has a widget
        thematic5_before_first_sub();
    }
}
add_action('widget_area_subsidiaries', 'thematic5_add_before_first_sub',20);

	
/**
 * Register action hook: widget_area_subsidiaries 
 *
 * Located in sidebar-subsidiary.php
 * Regular hook for the subsidiary widget areas
 */
function thematic5_widget_area_subsidiaries() {
    do_action('widget_area_subsidiaries');
}


/**
 * Register action hook: thematic5_between_firstsecond_sub 
 *
 * Is only available if there is a widget in one of the subsidiary asides
 */
function thematic5_between_firstsecond_sub() {
    do_action('thematic5_between_firstsecond_sub');
}


/**
 * Add the thematic5_between_firstsecond_sub hook within the #subsidiary div
 *
 * Will only add the hook if there is a widget in one of the subsidiary asides
 */
function thematic5_add_between_firstsecond_sub() {
    if ( is_active_sidebar('1st-subsidiary-aside') || is_active_sidebar('2nd-subsidiary-aside') || is_active_sidebar('3rd-subsidiary-aside') ) { // one of the subsidiary asides has a widget
        thematic5_between_firstsecond_sub();
    }
}
add_action('widget_area_subsidiaries', 'thematic5_add_between_firstsecond_sub',40);


/**
 * Register action hook: thematic5_between_secondthird_sub 
 *
 * Is only available if there is a widget in one of the subsidiary asides
 */
function thematic5_between_secondthird_sub() {
    do_action('thematic5_between_secondthird_sub');
}


/**
 * Add the thematic5_between_secondthird_sub hook within the #subsidiary div
 *
 * Will only add the hook if there is a widget in one of the subsidiary asides
 */
function thematic5_add_between_secondthird_sub() {
    if ( is_active_sidebar('1st-subsidiary-aside') || is_active_sidebar('2nd-subsidiary-aside') || is_active_sidebar('3rd-subsidiary-aside') ) { // one of the subsidiary asides has a widget
        thematic5_between_secondthird_sub();
    }
}
add_action('widget_area_subsidiaries', 'thematic5_add_between_secondthird_sub',60);


/**
 * Register action hook: thematic5_after_third_sub 
 *
 * Is only available if there is a widget in one of the subsidiary asides
 */
function thematic5_after_third_sub() {
    do_action('thematic5_after_third_sub');
}	


/**
 * Add the thematic5_after_third_sub hook within the #subsidiary div
 *
 * Will only add the hook if there is a widget in one of the subsidiary asides
 */
function thematic5_add_after_third_sub() {
    if ( is_active_sidebar('1st-subsidiary-aside') || is_active_sidebar('2nd-subsidiary-aside') || is_active_sidebar('3rd-subsidiary-aside') ) { // one of the subsidiary asides has a widget
        thematic5_after_third_sub();
    }
}
add_action('widget_area_subsidiaries', 'thematic5_add_after_third_sub',80);


/**
 * Close the #subsidiary div
 * 
 * Will only display if there is a widget in one of the subsidiary asides
 */
function thematic5_subsidiaryclose() {
    if ( is_active_sidebar('1st-subsidiary-aside') || is_active_sidebar('2nd-subsidiary-aside') || is_active_sidebar('3rd-subsidiary-aside') ) { // one of the subsidiary asides has a widget ?>
        
        </div><!-- #subsidiary -->
        
    <?php
    }
}
add_action('widget_area_subsidiaries', 'thematic5_subsidiaryclose', 200);