=== Thematic ===
Contributors: iandstewart, chrisgossmann, emhr
Tags: white, three-columns, two-columns, fixed-width, theme-options, left-sidebar, right-sidebar, threaded-comments, sticky-post, microformats
Requires at least: 3.0
Tested up to: 3.3.1
Stable tag: 0.9.8

The ultimate in SEO-ready themes, Thematic is a highly extensible, WordPress Theme Framework featuring 13 widget-ready areas, &amp; a whole lot more.

== Description ==

Thematic is a free, open-source, highly extensible, search-engine optimized WordPress Theme Framework featuring 13 widget-ready areas, grid-based layout samples, styling for popular plugins, and a whole community behind it. It's perfect for beginner bloggers and WordPress development professionals.

Features:

* Perfect to use as-is or as a blank WordPress theme for development
* Fully Search-Engine Optimized
* Extra widget-ready areas (13 in total) and more possible in your Child Theme
* Free and commercially supported Child Themes are available for upgrading the theme
* Includes a sample WordPress Child Theme for rapid development
* A wiki-editable guide to Thematic Customization
* Ready for WordPress plugins like Subscribe to Comments, WP-PageNavi, and Comment-license
* Fully compatible with All-In-One SEO and Platinum SEO plugins
* Multiple, easy to implement, bulletproof layout options for 2, or 3 column designs
* Modular CSS with pre-packaged resets and basic typography
* Dynamic post and body classes make it a hyper-canvas for CSS artists
* Editable footer text to remove the theme credit without harming the theme
* Options for multi-author blogs

== Changelog ==

= 0.9.8 =
* Moved: conditional comment handling from page templates to <code>thematic5_include_comments()</code>
* Fixed: many templates misuse of the <code>the_post()</code> 
* Moved: thematic5_init_navmenu() to functions.php for adherence to theme review guidelines
* Added: <code>thematic5_get_comment_link()</code> to filter <code>get_comment_link()</code>
* Changed: default.css for comment threading abnomalities  
* Added: html attributes for #comments-list and #pings-list in comments.php
* Added: <code>thematic5_add_comment_class()</code> to filter <code>comment_class()</code>
* Deprecated: <code>childtheme_override_comment_class()</code> and <code>thematic5_comment_class()</code>
* Changed: <code>thematic5_post_footer()</code> "Comments" to " Responses"
* Fixed: Pagination of pings and comments when threaded.
* Changed: All of the functions in shortcodes.php to namspace with <code>thematic5_*</code>
* Changed: <code>thematic5_page_title()</code> to remove 'Blog Archives' 
* Removed: <code>widget_thematic5_rsslinks_control()</code>
* Changed: Namespacing of classes from <code>THM_*</code> to <code>Thematic_*</code>
* Changed: Namespacing of functions from <code>widget_area_*()</code> to <code>thematic5_widget_area_*()</code>
* Added: <code>thematic5_list_bookmarks_args(), thematic5_list_comments_arg(), thematic5_more_text()</code> 
* Deprecated: <code>widget_area_*()</code> functions <code>list_bookmarks_args(), list_comments_arg(), pageGetPageNo(), more_text()</code>
* Changed: <code>thematic5_commentbutton_text()</code> to return escaped content
* Moved: enqueue of comment reply script to <code>thematic5_head_scripts()</code>
* Deprecated: <code>thematic5_show_commentreply()</code>
* Replaced: <code>get_bloginfo(*)</code> for Theme Review required functions
* Moved: <code>thematic5_create_contenttype()</code> within header.php for Theme Review compliance
* Removed: <code>wp_register_*</code> because <code>wp_enqueue_*</code> registers * when the src param is set for <code>_scripts</code> and <code>_styles</code>
* Moved: Function <code>thematic5_head_scripts</code> to header.php
* Changed: the action hook for <code>thematic5_head_scripts()</code> and <code>thematic5_create_stylesheet()</code> to <code>wp_enqueue_scripts</code>
* Changed: Function <code>thematic5_head_scripts</code> to <code>wp_enqueue_script</code>.
* Fixed: Valid CSS support for ie7 in default.css for hr color
* Depecated: archives.php template for proper template namespacing please use the newly added tempate-page-archives.php
* Deprecated: template-page-blog.php in favor of home.php
* Fixed: CSS to comply with WP theme unit tests: images, clearing floats, etc.
* Changed: default.css moved .gallery styles into images.css 
* Added: Action hook thematic5_abovemainclose
* Added: Check for <code>current_theme_supports('thematic5_support_post_type_author_link')</code> in <code>thematic5_postmeta_authorlink</code>
* Added: Pretty Permalink support for custom post type archives in <code>thematic5_postfooter</code>
* Added: WP Nav Menu compatibility to default sylesheet
* Fixed: 2c-l-fixed.css .hentry width bug
* Added: docblocks to all templates
* Fixed: Override childtheme_override_theme_setup
* Added: Function thematic5_opt_init()
* Added: Function thematic5_get_wp_opt()
* Added: Override: childtheme_override_opt_init()
* Added: Function thematic5_get_theme_opt()
* Added: Function thematic5_convert_legacy_opt()
* Added: Filter thematic5_theme_convert_legacy_opt
* Added: Function thematic5_default_opt()
* Added: Filter thematic5_theme_default_opt
* Added: Function thematic5_opt_add_page()
* Added: Filter thematic5_theme_add_opt_page
* Added: Function thematic5_opt_page_help()
* Added: Filter thematic5_theme_opt_help_sidebar
* Added: Filter thematic5_theme_opt_help_txt
* Added: Function thematic5_legacy_help()
* Added: Override childtheme_override_opt_page_help
* Added: Function thematic5_do_legacy_help_section()
* Added: Function thematic5_do_opt_page()
* Added: Function thematic5_do_opt_section_main()
* Added: Filter thematic5_theme_opt_section_main
* Added: Function thematic5_do_insert_opt()
* Added: Function thematic5_do_auth_opt()
* Added: Function thematic5_do_footer_opt()
* Added: Function thematic5_do_legacy_opt()
* Added: Function thematic5_validate_opt()
* Added: Override childtheme_override_validate_opt
* Added: Filter thematic5_theme_opt_validation
* Changed Template author.php to use new thematic5_get_theme_opt()
* Changed Function thematic5_index_loop() to use new thematic5_get_theme_opt()
* Changed Function thematic5_siteinfo() to use new thematic5_get_theme_opt()
* Removed: Global $options array
* Removed: Function mytheme_add_admin()
* Removed: Function mytheme_admin()
* FIXED: <code>thematic5_tag_query()</code>.
* REMOVED: <code>thematic5_canonical_url()</code> (no longer needed).
* Added: Add <code>add_theme_support('minorbrowserversion_ff')</code> to display major and minor Firefox version in the body class.
* Added: Add <code>add_theme_support('minorbrowserversion_ie')</code> to display major and minor IE version in the body class.
* Added: Add <code>add_theme_support('minorbrowserversion_op')</code> to display major and minor Opera version in the body class.
* Added: Add <code>add_theme_support('minorbrowserversion_sf')</code> to display major and minor Safari version in the body class.
* Added: Add <code>add_theme_support('minorbrowserversion_all')</code> to display major and minor version for all browsers in the body class.
* Added: Add <code>add_theme_support('minorbrowserversion_ch')</code> to display major and minor Chrome version in the body class.
* Changed: By default only the major browser version will be used in the body class.
* Added: Filter <code>thematic5_doctitle_separator</code>.
* Fixed: Thematic Options is working again. 
* Changed: Filter <code>thematic5_dropdown_options</code>.
* Removed: Variable <code>thematic5_use_superfish</code>. 
* Changed: Function <code>thematic5_create_stylesheet</code> to <code>wp_enqueue_style</code>.
* Removed: filter <code>thematic5_create_stylesheet</code>.
* Added: New hook <code>thematic5_child_init</code> used for <code>remove_theme_support</code>.
* Added: <code>add_theme_support('thematic5_superfish')</code>
* Changed: Started to clean up the functions.php.
* Fixed: Missing text domain.
* Fixed: thematic5_page_title() Tag archive display name of queried tag
* Changed: thematic5_page_title() now supports for custom post type archives
* Changed: thematic5_postfooter(), thematic5_postfooter_postcategory(), thematic5_postfooter_posttags() , thematic5_postfooter_postcomments(), function thematic5_postfooter_postconnect() to provide support for custom post types and custom taxonomies.
* Added: thematic5_postfooter_posttax() providing a looping structure for post taxonomies
* Added: New override childtheme_override_postfooter_posttax() 
* Added: New filter thematic5_postfooter_posttax
* Added: thematic5_postfooter_postterms($tax) for assembling the term list for individual taxonomies
* Added: New override childtheme_override_postfooter_postterms($tax) 
* Added: New filter thematic5_postfooter_postterms
* Added: New filter thematic5_open_id_content. Defaults to: <code>'<div id="content">' . "\n"</code>.
* Added: $content_width defines the max image width.
* Added: Farsi language files. Credits: Ehsan
* Added: The action hooks <code>thematic5_above_archiveloop</code> and <code>thematic5_below_archivloop</code>. Credits: Kathy
* Added: Automatic support for All in One SEO Pack, HeadSpace Plugin, Platinum SEO Pack, wpSEO, and WordPress SEO.
* Added: Icelandic language files. Credits: Stefán Vignir Skarphéðinsson
* Changed: Removed changelog.html in favor of the new readme.txt.
* Fixed: <code>childtheme_menu_args</code> in Thematic Sample Childtheme (the value for echo is FALSE).
* Fixed: An E_NOTICE in dynamic_classes.php (occured while displaying a 404 page). Credits: markauk
* Fixed: childtheme_override_content_init() is now working.
* Fixed: Updated Brazilian Portuguese language files. Credits: Eduardo Zulian.
* Fixed: Removed sidebar-subsidiary.php. Code is created using action hooks.
* Fixed: The override part of some more functions.
* Fixed: Set Thematic filter thematic5_page_menu_args for thematic5_page_menu_args().
* Fixed: Removed thematic5_page_menu_args() filter of wp_page_menu_args.
* Fixed: Reinstated thematic5_nav_menu filter.
* Fixed: Undefined variable $redirect in thmfooter_login_link() from shortcodes.php.
* Fixed: The override part of a few functions creating the header missed the add_action part.
= 0.9.7.7 =
* Fixed: search.php call to undefined function blog_info().
* Fixed: Theme Review Images Test via CSS.
= 0.9.7.6 =
* Fixed: "Constant * already defined" notices when defining constants in a child themes.
* Fixed: "Undefined variable" $id, $aria_req notices when using default comment_form().
* Fixed: "Undefined constant assumed get_post_type_object" notice in thematic5_post_class.
= 0.9.7.5 =
* Added: The constant THEMATIC_COMPATIBLE_FEEDLINKS which defaults to false. In this case the WordPress functions add_theme_support( 'automatic-feed-links' ) is used. If you set it to TRUE, Thematic will use its own functionality. This is a requirement by the Theme Review Team.
* Added: New function thematic5_body() to header.php defined in dynamic-classes.php 
* Added: New function childtheme_override_body() defined in dynamic-classes.php
* Added: New function thematic5_body_open() defined in dynamic-classes.php
* Added: Added Estonian language files. Credits: Peeter Marvet
* Added: Thematic's browser / OS class to WorpPress' body_class(). Menu will now display properly with the Test Data.
* Added: the constant THEMATIC_COMPATIBLE_COMMENT_FORM which defaults to false. In this case the WordPress function comment_form() is used. If you set it to TRUE, Thematic will use its own functionality. This is a requirement by the Theme Review Team. 
* Added: Added: Thematic's browser / OS class to WorpPress' body_class(). Menu will now display properly with the Test Data.
* Added: the constant THEMATIC_COMPATIBLE_POST_CLASS which defaults to false. In this case the WordPress function post_class() is used. If you set it to TRUE, Thematic will use its own function thematic5_post_class(). This is a requirement by the Theme Review Team.
* Added: the constant THEMATIC_COMPATIBLE_BODY_CLASS which defaults to false. In this case the WordPress function body_class() is used. If you set it to TRUE, Thematic will use its own function thematic5_body_class(). This is a requirement by the Theme Review Team.
* Added: Better SSL support by replacing bloginfo('siteurl') & get_bloginfo('siteurl') with site_url()
* Changed: the filter body_class to thematic5_body_class.
* Fixed: Finnish language files. Credits: Peeter Marvet
* Fixed: Trailing slashes in the search forms of search.php and thematic5_404()
* Fixed: childtheme_override_access().
* Fixed: the closing > for the post_class part.
* Fixed behaviour of thematic5_show_bodyclass. The body tag will now be created, if a filter returns false.
* Fixed: Removed add_theme_support('menu') according to Andrew Nacin.
* Fixed: Comment handling for archives.php, links.php and page.php can be made compatible with old handling controlled by a key/value of "comments".
* Wrapped some WP 3.0 function calls. Thematic still supports WP 2.9.x.
= 0.9.7.4 =
* Added: Filter thematic5_post_thumb_size in thematic5_content()
* Added: Filter thematic5_post_thumb_attr in thematic5_content()
* Added: Filter thematic5_post_thumbs Default TRUE in thematic5_content()
* Added: Post Thumbnails to thematic5_content() excerpts
* Added: add_theme_support( 'post-thumbnails' ) as required by WP Theme Dev Checklist
* Added: Post and Body classes for custom post types
* Added: Helper function thematic5_is_custom_post_type()
* Added: Czech language files Credits: JanJan Fertek
* Added: Filter thematic5_show_bc_taxonomyarchives Default True
* Added: Post and Body classes for custom taxonomies
* Added: Custom taxonomy support for archives in thematic5_page_title()
* Added: Helper function thematic5_get_term_name() for retrieving custom taxonomy name Credit Justin Tadlock 
* Added: CDATA encoding to JavaScript
* Added: Blog template page-blog.php  
* Added: Page template page-fullwidth.php and relative styles in thematic>library>layouts *.css files for full width content
* Fixed: Clearing Floats issues in compliance with Theme_Unit_Test WordPress Theme Review Guidelines
* Fixed: Conditional display of comment-edit anchor tag and meta separator
* Fixed: Trailing slash in thematic5_search_form()
* Fixed: Missing Dutch nl_NL.po
* Added add_theme_support( 'automatic-feed-links' ).
* Removed the deprecated function call get_the_author().
* Renamed template files page-... to template-page-... according to <a href="http://codex.wordpress.org/Theme_Review#Custom_Template_Naming_Conventions">4.5.4 Custom Template Naming Conventions</a> and adjusted the CSS files.
* Updated: PT lang files Thanks to: Bernardo Maciel
* Updated: Dutch translation props: Fili
= 0.9.7.3 =
* Fixed: Changed trackback_url() to get_trackback_url().
* Fixed: Displaying WordPress Galleries is fixed.
* Fixed: Cleaned up theme-options.php.
* Fixed: Cleaned up comments-extensions.php.
* Fixed: Removed the custom field check to display the comments template for page.php, archives.php and links.php.
* Fixed: Deprecated is_sidebar_active() in favor of is_active_sidebar().
* Fixed: Cleaned up the deprecated function calls
* Fixed: duplicate key in thematic5_nav_menu_args().
* Fixed: The deprecated function uses WordPress' functionality for reporting.
= 0.9.7.2 =
* Added: Fallback to wp_page_menu if theme location has no menu
* Added: thematic5_init_navmenu registers the theme location for our menu. Override: childtheme_override_init_navmenu
* Added: thematic5_primary_menu_name filters the menu name 'Primary Menu'.
* Added: thematic5_primary_menu_id filters the  menu id 'primary-menu'.
* Added: The main menu uses the menu id 'primary-menu' and the menu name 'Primary Menu'.
* Fixed: Changed add_theme_support( 'nav-menus' ) to add_theme_support( 'menus' ).
* Fixed: a bug that prevents the 'Reset Widgets'.
= 0.9.7.1 =
* Fixed: Potential security issue in theme-options.php.
= 0.9.7 =
* Added: new function: thematic5_init_presetwidgets() to initialize the preset widgets. Override function: childtheme_override_init_presetwidgets()
* Added: new function: thematic5_content_init() to set up new post classes.
* Added: childtheme_override_content_init() overrides thematic5_content_init
* Added: new post classes: is-full is-excerpt custom-excerpt auto-excerpt wp-teaser has-more wp-more has-teaser
* Added: new filter thematic5_get_excerpt to thematic5_content()
* Added: filter to customize the length ofthematic5_search_form() in widgets-extensions.php. Credits: Aaron Jorbin
* Added: childtheme_override_doctitle() overrides thematic5_doctitle
* Added: childtheme_override_head_scripts() overrides thematic5_head_scripts
* Added: childtheme_override_brandingopen() overrides thematic5_brandingopen
* Added: childtheme_override_blogtitle() overrides thematic5_blogtitle
* Added: childtheme_override_blogdescription() overrides thematic5_blogdescription            
* Added: childtheme_override_brandingclose() overrides thematic5_brandingclose
* Added: childtheme_override_access() overrides thematic5_access
* Added: childtheme_override_subsidiaries() overrides thematic5_subsidiaries
* Added: childtheme_override_siteinfoopen() overrides thematic5_siteinfoopen()
* Added: childtheme_override_siteinfo() overrides thematic5_siteinfo()
* Added: childtheme_override_siteinfoclose() overrides thematic5_siteinfoclose()
* Added: New action hooks thematic5_abovecomment and thematic5_belowcomment Credits: heaven.
* Added: childtheme_override_commentmeta overrides thematic5_commentmeta()
* Added: new filter thematic5_commentmeta() to discussion.php. Credits: heaven
* Added: childtheme_override_body_class() overrides thematic5_body_class()
* Added: childtheme_override_post_class() overrides thematic5_post_class()
* Added: childtheme_override_comment_class() overrides thematic5_archive_loop()
* Added: childtheme_override_author_loop() overrides thematic5_comment_class()
* Added: childtheme_override_date_classes() overrides thematic5_date_classes()
* Added: Finnish language files. Credits: Mikito Takada
* Added: new filter thematic5_open_wrapper to the header.php. This filter defaults to true.
* Added: new filter thematic5_close_wrapper to the footer.php. This filter defaults to true.
* Added: childtheme_override_page_title() overrides thematic5_page_title()
* Added: childtheme_override_nav_above() overrides thematic5_nav_above()
* Added: childtheme_override_archive_loop() overrides thematic5_archive_loop()
* Added: childtheme_override_author_loop() overrides thematic5_author_loop()
* Added: childtheme_override_category_loop() overrides thematic5_category_loop()
* Added: childtheme_override_index_loop() overrides thematic5_index_loop()
* Added: childtheme_override_single_post() overrides thematic5_single_post()
* Added: childtheme_override_search_loop() overrides thematic5_search_loop()
* Added: childtheme_override_tag_loop() overrides thematic5_tag_loop()
* Added: childtheme_override_postheader() overrides thematic5_postheader()
* Added: childtheme_override_postheader_posteditlink() overrides thematic5_postheader_posteditlink()
* Added: childtheme_override_postheader_posttitle() overrides thematic5_postheader_posttitle()
* Added: childtheme_override_postheader_postmeta() overrides thematic5_postheader_postmeta()
* Added: childtheme_override_postmeta_authorlink() overrides thematic5_postmeta_authorlink()
* Added: childtheme_override_postmeta_entrydate() overrides thematic5_postmeta_entrydate()
* Added: childtheme_override_postmeta_editlink() overrides thematic5_postmeta_editlink()
* Added: childtheme_override_content() overrides thematic5_content()
* Added: childtheme_override_archivesopen() overrides thematic5_archivesopen()
* Added: childtheme_override_category_archives() overrides thematic5_category_archives()
* Added: childtheme_override_monthly_archives() overrides thematic5_monthly_archives()
* Added: childtheme_override_archivesclose() overrides thematic5_archivesclose()
* Added: childtheme_override_404_content() overrides thematic5_404_content()
* Added: childtheme_override_postfooter() overrides thematic5_postfooter()
* Added: childtheme_override_postfooter_posteditlink() overrides thematic5_postfooter_posteditlink()
* Added: childtheme_override_postfooter_postcategory() overrides thematic5_postfooter_postcategory()
* Added: childtheme_override_postfooter_posttags() overrides thematic5_postfooter_posttags()
* Added: childtheme_override_postfooter_postcomments() overrides thematic5_postfooter_postcomments()
* Added: childtheme_override_postfooter_postconnect() overrides thematic5_postfooter_postconnect()
* Added: childtheme_override_nav_below() overrides thematic5_nav_below()
* Added: childtheme_override_previous_post_link() overrides thematic5_previous_post_link()
* Added: childtheme_override_next_post_link() overrides thematic5_next_post_link()
* Added: childtheme_override_author_info_avatar() overrides thematic5_author_info_avatar()
* Added: childtheme_override_cats_meow() overrides thematic5_cats_meow()
* Added: childtheme_override_tag_ur_it() overrides thematic5_tag_ur_it()
* Added: Support for wp_nav_menu().
* Added: New filter thematic5_menu_type to switch between wp_page_menu() and wp_nav_menu(). Defaults to wp_page_menu().
* Added: New filter thematic5_nav_menu_args to filter the arguments for wp_nav_menu().
* Added: New filter thematic5_page_menu_args to filter the arguments for wp_page_menu().
* Added: New filter thematic5_use_superfish to prevent the use of Superfish for the menu.
* Added: New filter thematic5_show_bc_blogid to prevent the BODY class blogid-n. 
* Added: New BODY class blogid-n.
* Added: New action hooks thematic5_abovepost and thematic5_belowpost.
* Added: New action hooks thematic5_abovecontent and thematic5_belowcontent.
* Added: Theme options support WordPress mu and WordPress 3.0 Multi-User option.
* Fixed: The UL Class sf-menu will be created only for the wp_page_menu() in the header.
* Fixed: Changed #trackbacks-list .comment-content to left:-10000px; in default.css. Fixes a glitch with the 'Many Tackbacks' post (WordPress Test Data).
* Fixed: Changed $version to $thm_version to prevent a collision with WP E-Commerce.
* Fixed: Widget areas can now be moved based on a conditional tag.
* Fixed: Removed thematic5_before_widget() and thematic5_after_widget() from Search Widget
* Fixed: Upgraded the Thematic widgets to the new API. Thematic now requires WordPress 2.8.x or above.
* Updated: Norwegian language files updated. Credits: peter.holme.
* Updated: Norwegian language files updated. Credits: Thomas Misund.
= 0.9.6.2 =
* Fixed: a bug in widgets-extensions.php not loading the preset widgets after switching themes.
* Fixed: a bug in page.php not loading thematic5_comments_template()
* Fixed: missing gettext in comments-extensions.php
= 0.9.6.1 =
* Added: thematic5_abovecontainer()
* Added: thematic5_belowcontainer()
* Added: Thematic prevents the creation of the WordPress Generator. This can be filtered using a filter for thematic5_hide_generators. Return TRUE and the WordPress Generator will be created.
* Added: The standard text 'One Comment' can be filtered using thematic5_singlecomment_text.
* Added: The standard text 'n Comments' can be filtered using thematic5_multiplecomments_text.
* Added: The standard text 'Post a Comment' can be filtered using thematic5_postcomment_text.
* Added: The standard text 'Post a Reply to %s' can be filtered using thematic5_postreply_text.
* Added: The standard text 'Comment' for the text box can be filtered using thematic5_commentbox_text.
* Added: The standard text 'Post Comment' for the send button can be filtered using thematic5_commentbutton_text.
* Added: Split up thematic5_postheader() and thematic5_postfooter() into sub-functions. With these new functions it is easier to rearrange the displayed data.
* Added: thematic5_postheader_posttitle()
* Added: thematic5_postheader_postmeta()
* Added: thematic5_postmeta_authorlink()
* Added: thematic5_postmeta_entrydate()
* Added: thematic5_postmeta_editlink()
* Added: thematic5_postfooter()
* Added: thematic5_postfooter_posteditlink()
* Added: thematic5_postfooter_postcategory()
* Added: thematic5_postfooter_posttags()
* Added: thematic5_postfooter_postconnect()
* Added: thematic5_postfooter_postcomments()
* Added: thematic5_show_bodyclass (master switch)
* Added: thematic5_show_bc_wordpress
* Added: thematic5_show_bc_datetime
* Added: thematic5_show_bc_contenttype
* Added: thematic5_show_bc_singular
* Added: thematic5_show_bc_singlepost
* Added: thematic5_show_bc_authorarchives
* Added: thematic5_show_bc_categoryarchives
* Added: thematic5_show_bc_tagarchives
* Added: thematic5_show_bc_pages
* Added: thematic5_show_bc_search
* Added: thematic5_show_bc_loggedin
* Added: thematic5_show_bc_browser
* Added: thematic5_head_profile.
* Added: Complete rewrite of the widget areas: 
* Fixed: a bug in thematic5_page_title() not displaying a correct title in attachement.php
* Fixed: Fixed the widget area 'Index Insert'.
* Fixed: Fixed a bug in thematic5_create_robots().
