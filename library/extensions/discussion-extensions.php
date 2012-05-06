<?php
/**
 * Discussion Extensions
 *
 * @package ThematicCoreLibrary
 * @subpackage DiscussionExtensions
 */
 
if (function_exists('childtheme_override_commentmeta'))  {
	/**
	 * @ignore
	 */
	function thematic5_commentmeta() {
		childtheme_override_commentmeta();
	}
} else {
	/**
	 * Create comment meta
	 * 
	 * Located in discussion.php
	 * 
	 * Override: childtheme_override_commentmeta <br>
	 * Filter: thematic5_commentmeta
	 */
	function thematic5_commentmeta($print = TRUE) {
		$content = '<div class="comment-meta">' . 
					sprintf( __('Posted %1$s at %2$s <span class="meta-sep">|</span> <a href="%3$s" title="Permalink to this comment">Permalink</a>', 'thematic5' ),
					get_comment_date(),
					get_comment_time(),
					'#comment-' . get_comment_ID() );
							
		if ( get_edit_comment_link() ) {
			$content .=	sprintf(' <span class="meta-sep">|</span><span class="edit-link"> <a class="comment-edit-link" href="%1$s" title="%2$s">%3$s</a></span>',
						get_edit_comment_link(),
						__( 'Edit comment' , 'thematic5' ),
						__( 'Edit', 'thematic5' ) );
			}
		
		$content .= '</div>' . "\n";
			
		return $print ? print(apply_filters('thematic5_commentmeta', $content)) : apply_filters('thematic5_commentmeta', $content);

	} // end thematic5_commentmeta
}

/**
 * Register action hook: thematic5_abovecomment
 * 
 * Located in discussion.php, at the beginning of the li#comment-[id] element.
 * Note that this is *per comment*
 */
function thematic5_abovecomment() {
	do_action('thematic5_abovecomment');
}

/**
 * Register action hook: thematic5_belowcomment
 * 
 * Located discussion.php, just after the comment reply link.
 * Note that this is *per comment*:
 */
function thematic5_belowcomment() {
	do_action('thematic5_belowcomment');
}

?>