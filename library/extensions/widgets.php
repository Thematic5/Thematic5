<?php
/**
 * Widgets
 *
 * @package ThematicCoreLibrary
 * @subpackage Widgets
 */


/**
 * Markup before the widget
 */
function thematic5_before_widget() {
	$content = '<aside id="%1$s" class="widgetcontainer %2$s">';
	return apply_filters('thematic5_before_widget', $content);
}


/**
 * Markup after the widget
 */
function thematic5_after_widget() {
	$content = '</aside>';
	return apply_filters('thematic5_after_widget', $content);
}



/**
 * Markup before the widget title
 */
function thematic5_before_title() {
	$content = "<h1 class=\"widgettitle\">";
	return apply_filters('thematic5_before_title', $content);
}


/**
 * Markup after the widget title
 */
function thematic5_after_title() {
	$content = "</h1>\n";
	return apply_filters('thematic5_after_title', $content);
}


/**
 * Search widget class
 *
 * @since 0.9.6.3
 */
class Thematic_Widget_Search extends WP_Widget {

	function Thematic_Widget_Search() {
		$widget_ops = array('classname' => 'widget_search', 'description' => __( 'A search form for your blog', 'thematic5') );
		$this->WP_Widget('search', __('Search', 'thematic5'), $widget_ops);
	}

	function widget( $args, $instance ) {
		extract($args);
		$title = apply_filters('widget_title', empty($instance['title']) ? __('Search', 'thematic5') : $instance['title']);

		echo $before_widget;
		if ( $title )
			echo $before_title ?><label for="s"><?php echo $title ?></label><?php echo $after_title;

		// Use current theme search form if it exists
		get_search_form();

		echo $after_widget;
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '') );
		$title = $instance['title'];
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'thematic5'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>
<?php
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$new_instance = wp_parse_args((array) $new_instance, array( 'title' => ''));
		$instance['title'] = strip_tags($new_instance['title']);
		return $instance;
	}

}

/**
 * Meta widget class
 *
 * Displays log in/out
 *
 * @since 0.9.6.3
 */
class Thematic_Widget_Meta extends WP_Widget {

	function Thematic_Widget_Meta() {
		$widget_ops = array('classname' => 'widget_meta', 'description' => __( "Log in/out and admin", 'thematic5') );
		$this->WP_Widget('meta', __('Meta', 'thematic5'), $widget_ops);
	}

	function widget( $args, $instance ) {
		extract($args);
		$title = apply_filters('widget_title', empty($instance['title']) ? __('Meta', 'thematic5') : $instance['title']);

		echo $before_widget;
		if ( $title )
			echo $before_title . $title . $after_title;
?>
			<ul>
			<?php wp_register(); ?>
			<li><?php wp_loginout(); ?></li>
			<?php wp_meta(); ?>
			</ul>
<?php
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);

		return $instance;
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
		$title = strip_tags($instance['title']);
?>
			<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'thematic5'); ?></label> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>
<?php
	}
}
    
/**
 * RSS links widget class
 *
 * @since 0.9.6.3
 */
class Thematic_Widget_RSSlinks extends WP_Widget {

	function Thematic_Widget_RSSlinks() {
		$widget_ops = array( 'description' => __('Links to your posts and comments feed', 'thematic5') );
		$this->WP_Widget( 'rss-links', __('RSS Links', 'thematic5'), $widget_ops);
	}

	function widget($args, $instance) {
		extract($args);
		$title = apply_filters('widget_title', empty($instance['title']) ? __('RSS Links', 'thematic5') : $instance['title']);
		echo $before_widget;
		if ( $title )
			echo $before_title . $title . $after_title;
?>
			<ul>
				<li><a href="<?php bloginfo('rss2_url') ?>" title="<?php echo esc_attr( get_bloginfo('name', 'display') ) ?> <?php _e('Posts RSS feed', 'thematic5'); ?>" rel="alternate nofollow" type="application/rss+xml"><?php _e('All posts', 'thematic5') ?></a></li>
				<li><a href="<?php bloginfo('comments_rss2_url') ?>" title="<?php echo esc_attr( get_bloginfo('name', 'display') ) ?> <?php esc_attr_e('Comments RSS feed', 'thematic5'); ?>" rel="alternate nofollow" type="application/rss+xml"><?php _e('All comments', 'thematic5') ?></a></li>
			</ul>
<?php
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);

		return $instance;
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
		$title = strip_tags($instance['title']);
?>
			<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'thematic5'); ?></label> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>
<?php
	}
}

?>