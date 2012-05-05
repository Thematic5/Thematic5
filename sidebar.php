<?php 
/**
 * Main Sidebar Template
 *
 * …
 * 
 * @package Thematic
 * @subpackage Templates
 */

    // action hook for placing content above the main asides
    thematic5_abovemainasides();

    // action hook creating the primary aside
    thematic5_widget_area_primary_aside();	
	
    // action hook for placing content between primary and secondary aside
    thematic5_betweenmainasides();

    // action hook creating the secondary aside
    thematic5_widget_area_secondary_aside();		
	
    // action hook for placing content below the main asides
    thematic5_belowmainasides(); 
?>