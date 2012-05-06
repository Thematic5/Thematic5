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
 * Register action hook: thematic5_aboveindextop 
 *
 * Located in sidebar-index-top.php
 * Just above the 'index.top' widget area
 */
function thematic5_aboveindextop() {
	do_action('thematic5_aboveindextop');
}


/**
 * Register action hook: widget_area_index_top
 *
 * Located in sidebar.php
 * Regular hook for the 'index.top' widget area
 */
function thematic5_widget_area_index_top() {
    do_action('widget_area_index_top');
}

	
/**
 * Register action hook: thematic5_belowindextop 
 *
 * Located in sidebar-index-top.php
 * Just below the 'index.top' widget area
 */
function thematic5_belowindextop() {
    do_action('thematic5_belowindextop');
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
 * Register action hook: thematic5_aboveindexbottom 
 *
 * Located in sidebar-index-bottom.php
 * Just above the 'index-bottom' widget area
 */
function thematic5_aboveindexbottom() {
    do_action('thematic5_aboveindexbottom');
}
	

/**
 * Register action hook: widget_area_index_bottom 
 *
 * Located in sidebar-index-bottom.php
 * Regular hook for the 'index-bottom' widget area
 */	
function thematic5_widget_area_index_bottom() {
    do_action('widget_area_index_bottom');
}
	
	
/**
 * Register action hook: thematic5_belowindexbottom 
 *
 * Located in sidebar-index-bottom.php
 * Just below the 'index-bottom' widget area
 */	function thematic5_belowindexbottom() {
    do_action('thematic5_belowindexbottom');
}
	
	
/*
 * Single Post Asides
 */


/**
 * Register action hook: thematic5_abovesingletop 
 *
 * Located in sidebar-single-top.php
 * Just above the 'single-top' widget area
 */
function thematic5_abovesingletop() {
    do_action('thematic5_abovesingletop');
}


/**
 * Register action hook: widget_area_single_top 
 *
 * Located in sidebar-single-top.php
 * Regular hook for the 'single-top' widget area
 */
function thematic5_widget_area_single_top() {
    do_action('widget_area_single_top');
}


/**
 * Register action hook: thematic5_belowsingletop 
 *
 * Located in sidebar-single-top.php
 * Just below the 'single-top' widget area
 */
function thematic5_belowsingletop() {
    do_action('thematic5_belowsingletop');
}
	
	
/**
 * Register action hook: thematic5_abovesingleinsert 
 *
 * Located in sidebar-single-insert.php
 * Just above the 'single-insert' widget area
 */
function thematic5_abovesingleinsert() {
    do_action('thematic5_abovesingleinsert');
}


/**
 * Register action hook: widget_area_single_insert 
 *
 * Located in sidebar-single-insert.php
 * Regular hook for the 'single-insert' widget area
 */
function thematic5_widget_area_single_insert() {
    do_action('widget_area_single_insert');
}


/**
 * Register action hook: thematic5_belowsingleinsert 
 *
 * Located in sidebar-single-insert.php
 * Just below the 'single-insert' widget area
 */
function thematic5_belowsingleinsert() {
    do_action('thematic5_belowsingleinsert');
}


/**
 * Register action hook: thematic5_abovesinglebottom 
 *
 * Located in sidebar-single-bottom.php
 * Just above the 'single-bottom' widget area
 */
function thematic5_abovesinglebottom() {
    do_action('thematic5_abovesinglebottom');
}


/**
 * Register action hook: widget_area_single_bottom 
 *
 * Located in sidebar-single-bottom.php
 * Regular hook for the 'single-bottom' widget area
 */
function thematic5_widget_area_single_bottom() {
    do_action('widget_area_single_bottom');
}


/**
 * Register action hook: thematic5_belowsinglebottom 
 *
 * Located in sidebar-single-bottom.php
 * Just below the 'single-bottom' widget area
 */
function thematic5_belowsinglebottom() {
    do_action('thematic5_belowsinglebottom');
}


/*
 * Page Aside Hooks
 */


/**
 * Register action hook: thematic5_abovepagetop 
 *
 * Located in sidebar-page-top.php
 * Just above the 'page-top' widget area
 */
function thematic5_abovepagetop() {
    do_action('thematic5_abovepagetop');
}


/**
 * Register action hook: widget_area_page_top 
 *
 * Located in sidebar-page-top.php
 * Regular hook for the 'page-top' widget area
 */
function thematic5_widget_area_page_top() {
    do_action('widget_area_page_top');
}


/**
 * Register action hook: thematic5_belowpagetop 
 *
 * Located in sidebar-page-top.php
 * Just below the 'page-top' widget area
 */
function thematic5_belowpagetop() {
    do_action('thematic5_belowpagetop');
} // end thematic5_belowpagetop


/**
 * Register action hook: thematic5_abovepagebottom 
 *
 * Located in sidebar-page-bottom.php
 * Just above the 'page-bottom' widget area
 */
function thematic5_abovepagebottom() {
    do_action('thematic5_abovepagebottom');
} // end thematic5_abovepagebottom


/**
 * Register action hook: widget_area_page_bottom 
 *
 * Located in sidebar-page-bottom.php
 * Regular hook for the 'page-bottom' widget area
 */
function thematic5_widget_area_page_bottom() {
    do_action('widget_area_page_bottom');
} // end widget_area_page_bottom


/**
 * Register action hook: thematic5_belowpagebottom 
 *
 * Located in sidebar-page-bottom.php
 * Just below the 'page-bottom' widget area
 */
function thematic5_belowpagebottom() {
    do_action('thematic5_belowpagebottom');
} // end thematic5_belowpagebottom	


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