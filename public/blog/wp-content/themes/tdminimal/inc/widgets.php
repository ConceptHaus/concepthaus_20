<?php 
/**
 * Custom Widgets
 *
 * @package tdminimal
 */

/**
*  	Newsletter Widget
*	@since tdminimal 1.0
*/
class tdminimal_newsletter_widget extends WP_Widget {
	function __construct() {
		parent::__construct(false, $name = 'tdminimal Newsletter Widget', array( 'description' => 'This widget allows you to add your own newsletter form.' ) );
	}
	
	function form( $instance ) {
		$tdminimal_widget_title = isset( $instance['tdminimal_widget_newsletter_widget_title'] ) ? esc_attr( $instance['tdminimal_widget_newsletter_widget_title'] ) : '';
		
		?>
			<p>
				<label for="<?php echo $this->get_field_id( 'tdminimal_widget_newsletter_widget_title' ); ?>"><?php _e( 'Title', 'tdminimal' ); ?></label>
				<input id="<?php echo $this->get_field_id( 'tdminimal_widget_newsletter_widget_title' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'tdminimal_widget_newsletter_widget_title' ); ?>" type="text" value="<?php echo $tdminimal_widget_title; ?>" />
			</p>
		<?php
		
	}
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;  
		$instance['tdminimal_widget_newsletter_widget_title' ] = strip_tags( $new_instance['tdminimal_widget_newsletter_widget_title'] );  
  
    	return $instance;  
	}

	function widget( $args, $instance ) {
		echo $args['before_widget'];
		echo '<h4 class="widget-title">'.$instance['tdminimal_widget_newsletter_widget_title'].'</h4>';
		?>
		
		<?php if( tdminimal_newsletter_form() ): ?>
			<div id="newsletter-container">
				<?php echo tdminimal_newsletter_image(); ?>
				<div id="newsletter">
					<?php 
						$tdminimal_newsletter = tdminimal_newsletter_form();
						echo $tdminimal_newsletter['newsletter-code']; 
					?>
				</div>
			</div>
		<?php endif; ?>
		
		<?php
		echo $args['after_widget'];
	}

}
add_action( 'widgets_init', create_function( '', 'return register_widget( "tdminimal_newsletter_widget" );' ) );

/**
*  	Recent Comments Widget
*	@since tdminimal 1.0
*/
class tdminimal_recent_comments_widget extends WP_Widget {
	function __construct() {
		parent::__construct(false, $name = 'tdminimal Recent Commenst Widget', array( 'description' => 'This widget shows recent comments' ) );
	}
	
	function form( $instance ) {
		$tdminimal_widget_title = isset( $instance['tdminimal_widget_recent_comments_widget_title'] ) ? esc_attr( $instance['tdminimal_widget_recent_comments_widget_title'] ) : '';
		$tdminimal_widget_number = isset( $instance['tdminimal_widget_recent_comments_widget_number'] ) ? esc_attr( $instance['tdminimal_widget_recent_comments_widget_number'] ) : '5';
		?>
			<p>
				<label for="<?php echo $this->get_field_id( 'tdminimal_widget_recent_comments_widget_title' ); ?>"><?php _e( 'Title', 'tdminimal' ); ?></label>
				<input id="<?php echo $this->get_field_id( 'tdminimal_widget_recent_comments_widget_title' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'tdminimal_widget_recent_comments_widget_title' ); ?>" type="text" value="<?php echo $tdminimal_widget_title; ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'tdminimal_widget_recent_comments_widget_number' ); ?>"><?php _e( 'Number of comments to show:', 'tdminimal' ); ?></label>
				<input id="<?php echo $this->get_field_id( 'tdminimal_widget_recent_comments_widget_number' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'tdminimal_widget_recent_comments_widget_number' ); ?>" type="text" value="<?php echo $tdminimal_widget_number; ?>" />
			</p>
		<?php
		
	}
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;  
		$instance['tdminimal_widget_recent_comments_widget_title' ] = strip_tags( $new_instance['tdminimal_widget_recent_comments_widget_title'] );  
  		$instance['tdminimal_widget_recent_comments_widget_number' ] = intval(strip_tags( $new_instance['tdminimal_widget_recent_comments_widget_number'] )); 
  		
    	return $instance;  
	}

	function widget( $args, $instance ) {
		$recent_comments = get_comments( array(
			'number'    => $instance['tdminimal_widget_recent_comments_widget_number'],
			'status'    => 'approve'
		) );
		
		echo $args['before_widget'];
		echo '<h4 class="widget-title">'.$instance['tdminimal_widget_recent_comments_widget_title'].'</h4>';
		
		if ( $recent_comments ) { 
			echo '<ul>';
			foreach ($recent_comments as $comment) {
				$comment_output = '<li>';
				$comment_output .= '<div class="recent-comment-meta">';
				$comment_output .= '<div class="avatar-container">'.get_avatar( $comment->comment_author_email, 92).'</div>';
				$comment_output .= '<div class="recent-comment-info"><h4 class="author-name">'.$comment->comment_author.'</h4> <div class="recent-comment-title"><a class="comment-title" href="'. get_permalink($comment->comment_post_ID).'#comment-'.$comment->comment_ID .'" title="'.$comment->comment_author .' | '.get_the_title($comment->comment_post_ID).'">'.get_the_title($comment->comment_post_ID).'</a></div></div>';
				$comment_output .= '</div>';
				$comment_output .= '<div class="recent-comment-excerpt">'.get_comment_excerpt($comment->comment_ID).'</div>';
				$comment_output .= '</li>';
				
				echo $comment_output;
			}
			echo '</ul>';
		}
		
		echo $args['after_widget'];
	}

}
add_action( 'widgets_init', create_function( '', 'return register_widget( "tdminimal_recent_comments_widget" );' ) );

/**
*  	Recent Posts Widget
*	@since tdminimal 1.0
*/
class tdminimal_recent_posts_widget extends WP_Widget {
	function __construct() {
		parent::__construct(false, $name = 'tdminimal Recent Posts Widget', array( 'description' => 'This widget shows recent posts' ) );
	}
	
	function form( $instance ) {
		$tdminimal_widget_title = isset( $instance['tdminimal_widget_recent_posts_widget_title'] ) ? esc_attr( $instance['tdminimal_widget_recent_posts_widget_title'] ) : '';
		$tdminimal_widget_number = isset( $instance['tdminimal_widget_recent_posts_widget_number'] ) ? esc_attr( $instance['tdminimal_widget_recent_posts_widget_number'] ) : '5';
		$tdminimal_widget_layout = isset( $instance['tdminimal_widget_recent_posts_widget_layout'] ) ? esc_attr( $instance['tdminimal_widget_recent_posts_widget_layout'] ) : 'thumb';
		$tdminimal_widget_category = isset( $instance['tdminimal_widget_recent_posts_widget_category'] ) ? esc_attr( $instance['tdminimal_widget_recent_posts_widget_category'] ) : '';

		?>
			<p>
				<label for="<?php echo $this->get_field_id( 'tdminimal_widget_recent_posts_widget_title' ); ?>"><?php _e( 'Title', 'tdminimal' ); ?></label>
				<input id="<?php echo $this->get_field_id( 'tdminimal_widget_recent_posts_widget_title' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'tdminimal_widget_recent_posts_widget_title' ); ?>" type="text" value="<?php echo $tdminimal_widget_title; ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'tdminimal_widget_recent_posts_widget_number' ); ?>"><?php _e( 'Number of posts to show:', 'tdminimal' ); ?></label>
				<input id="<?php echo $this->get_field_id( 'tdminimal_widget_recent_posts_widget_number' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'tdminimal_widget_recent_posts_widget_number' ); ?>" type="text" value="<?php echo $tdminimal_widget_number; ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'tdminimal_widget_recent_posts_widget_category' ); ?>"><?php _e( 'Category Name (Optional):', 'tdminimal' ); ?></label>
				<input id="<?php echo $this->get_field_id( 'tdminimal_widget_recent_posts_widget_category' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'tdminimal_widget_recent_posts_widget_category' ); ?>" type="text" value="<?php echo $tdminimal_widget_category; ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'tdminimal_widget_recent_posts_widget_layout' ); ?>"><?php _e( 'Image Width:', 'tdminimal' ); ?></label>
				<select id="<?php echo $this->get_field_id( 'tdminimal_widget_recent_posts_widget_layout' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'tdminimal_widget_recent_posts_widget_layout' ); ?>">
					<option value="full" <?php selected($tdminimal_widget_layout, 'full', true); ?>><?php _e( 'Full Size', 'tdminimal' ); ?></option>
				  	<option value="thumb" <?php selected($tdminimal_widget_layout, 'thumb', true); ?>><?php _e( 'Thumbnail', 'tdminimal' ); ?></option>
				  	<option value="none" <?php selected($tdminimal_widget_layout, 'none', true); ?>><?php _e( 'None', 'tdminimal' ); ?></option>
				</select>
			</p>
		<?php
		
	}
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;  
		$instance['tdminimal_widget_recent_posts_widget_title'] = strip_tags( $new_instance['tdminimal_widget_recent_posts_widget_title'] );  
  		$instance['tdminimal_widget_recent_posts_widget_number'] = intval(strip_tags( $new_instance['tdminimal_widget_recent_posts_widget_number'] )); 
  		$instance['tdminimal_widget_recent_posts_widget_layout'] = strip_tags( $new_instance['tdminimal_widget_recent_posts_widget_layout'] );
  		$instance['tdminimal_widget_recent_posts_widget_category'] = strip_tags( $new_instance['tdminimal_widget_recent_posts_widget_category'] ); 
  		  		
    	return $instance;  
	}

	function widget( $args, $instance ) {
		setlocale( LC_TIME, get_locale() );
		
		if( $instance['tdminimal_widget_recent_posts_widget_category'] != '' ) { 
			$category_id = get_cat_ID( $instance['tdminimal_widget_recent_posts_widget_category'] );
			$recent_posts_args = array(
				'post_type' => 'post',
    			'posts_per_page' => $instance['tdminimal_widget_recent_posts_widget_number'],
    			'ignore_sticky_posts' => 1,
    			'cat' => $category_id
			);
		} else {
			$recent_posts_args = array(
				'post_type' => 'post',
    			'posts_per_page' => $instance['tdminimal_widget_recent_posts_widget_number'],
    			'ignore_sticky_posts' => 1
			);
		}
		
		$recent_posts_query = new WP_Query( $recent_posts_args );
		$image_width = $instance['tdminimal_widget_recent_posts_widget_layout'];
		
		echo $args['before_widget'];
		echo '<h4 class="widget-title">'.$instance['tdminimal_widget_recent_posts_widget_title'].'</h4>';
		
		if( $recent_posts_query->have_posts() ) { 
			$recent_posts_output = '<ul>';
			while( $recent_posts_query->have_posts() ) {
				$recent_posts_query->the_post();
				
				if( $image_width === 'full' ) {
					$recent_posts_output .= '<li class="full-width">';
					
					if( has_post_thumbnail() ) {
						$recent_posts_output .= '<div class="popular-post-entry-image post-thumb" style="float: none;">';
						$recent_posts_output .= get_the_post_thumbnail();
						$recent_posts_output .= '<a href="'.get_permalink().'" class="thumb-mask" rel="bookmark" title="'.get_the_title().'"></a>';
						$recent_posts_output .= '<a href="'.get_permalink().'" class="thumb-mask-link-icon" rel="bookmark" title="'.get_the_title().'"><i class="fa fa-link"></i></a>';
						$recent_posts_output .= '</div>';
					}
					
				} else if ( $image_width === 'thumb' ) {
					$recent_posts_output .= '<li class="thumb-width">';
					$recent_posts_output .= '<div class="recent-post-entry-image"><a href="'.get_permalink().'" rel="bookmark" title="'.get_the_title().'">'.get_the_post_thumbnail( $recent_posts_query->post->ID, 'thumbnail' ).'</a></div>';
				} else {
					$recent_posts_output .= '<li>';
				}
				
				$recent_posts_output .= '<h4 class="recent-post-entry-title"><a href="'.get_permalink().'" rel="bookmark" title="'.get_the_title().'">'.get_the_title().'</a></h4>';
				$recent_posts_output .= '<span class="recent-post-date">'.esc_html( strftime('%B %e, %Y', get_post_time('U', true)) ). '</span>';
				$recent_posts_output .= '</li>';
			}
			$recent_posts_output .= '</ul>';
			
			echo $recent_posts_output;
		}
		wp_reset_query();
		echo $args['after_widget'];
	}

}
add_action( 'widgets_init', create_function( '', 'return register_widget( "tdminimal_recent_posts_widget" );' ) );

/**
/**
*  	Popular Posts Widget
*	@since tdminimal 1.0
*/
class tdminimal_popular_posts_widget extends WP_Widget {
	function __construct() {
		parent::__construct(false, $name = 'tdminimal Popular Posts Widget', array( 'description' => 'This widget shows popular posts' ) );
	}
	
	function form( $instance ) {
		$tdminimal_widget_title = isset( $instance['tdminimal_widget_popular_posts_widget_title'] ) ? esc_attr( $instance['tdminimal_widget_popular_posts_widget_title'] ) : '';
		$tdminimal_widget_number = isset( $instance['tdminimal_widget_popular_posts_widget_number'] ) ? esc_attr( $instance['tdminimal_widget_popular_posts_widget_number'] ) : '5';
		$tdminimal_widget_layout = isset( $instance['tdminimal_widget_popular_posts_widget_layout'] ) ? esc_attr( $instance['tdminimal_widget_popular_posts_widget_layout'] ) : 'thumb';
		$tdminimal_widget_category = isset( $instance['tdminimal_widget_popular_posts_widget_category'] ) ? esc_attr( $instance['tdminimal_widget_popular_posts_widget_category'] ) : '';

		?>
			<p>
				<label for="<?php echo $this->get_field_id( 'tdminimal_widget_popular_posts_widget_title' ); ?>"><?php _e( 'Title', 'tdminimal' ); ?></label>
				<input id="<?php echo $this->get_field_id( 'tdminimal_widget_popular_posts_widget_title' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'tdminimal_widget_popular_posts_widget_title' ); ?>" type="text" value="<?php echo $tdminimal_widget_title; ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'tdminimal_widget_popular_posts_widget_number' ); ?>"><?php _e( 'Number of posts to show:', 'tdminimal' ); ?></label>
				<input id="<?php echo $this->get_field_id( 'tdminimal_widget_popular_posts_widget_number' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'tdminimal_widget_popular_posts_widget_number' ); ?>" type="text" value="<?php echo $tdminimal_widget_number; ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'tdminimal_widget_popular_posts_widget_category' ); ?>"><?php _e( 'Category Name (Optional):', 'tdminimal' ); ?></label>
				<input id="<?php echo $this->get_field_id( 'tdminimal_widget_popular_posts_widget_category' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'tdminimal_widget_popular_posts_widget_category' ); ?>" type="text" value="<?php echo $tdminimal_widget_category; ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'tdminimal_widget_popular_posts_widget_layout' ); ?>"><?php _e( 'Image Width:', 'tdminimal' ); ?></label>
				<select id="<?php echo $this->get_field_id( 'tdminimal_widget_popular_posts_widget_layout' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'tdminimal_widget_popular_posts_widget_layout' ); ?>">
					<option value="full" <?php selected($tdminimal_widget_layout, 'full', true); ?>><?php _e( 'Full Size', 'tdminimal' ); ?></option>
				  	<option value="thumb" <?php selected($tdminimal_widget_layout, 'thumb', true); ?>><?php _e( 'Thumbnail', 'tdminimal' ); ?></option>
				  	<option value="none" <?php selected($tdminimal_widget_layout, 'none', true); ?>><?php _e( 'None', 'tdminimal' ); ?></option>
				</select>
			</p>
		<?php
		
	}
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;  
		$instance['tdminimal_widget_popular_posts_widget_title'] = strip_tags( $new_instance['tdminimal_widget_popular_posts_widget_title'] );  
  		$instance['tdminimal_widget_popular_posts_widget_number'] = intval(strip_tags( $new_instance['tdminimal_widget_popular_posts_widget_number'] )); 
  		$instance['tdminimal_widget_popular_posts_widget_layout'] = strip_tags( $new_instance['tdminimal_widget_popular_posts_widget_layout'] );
  		$instance['tdminimal_widget_popular_posts_widget_category'] = strip_tags( $new_instance['tdminimal_widget_popular_posts_widget_category'] );

    	return $instance;  
	}

	function widget( $args, $instance ) {
		setlocale( LC_TIME, get_locale() );
		
		if( $instance['tdminimal_widget_popular_posts_widget_category'] != '' ) {
			$category_id = get_cat_ID( $instance['tdminimal_widget_popular_posts_widget_category'] );
			$recent_posts_args = array(
				'post_type' => 'post',
    			'posts_per_page' => $instance['tdminimal_widget_popular_posts_widget_number'],
    			'ignore_sticky_posts' => 1,
    			'orderby'=>'comment_count',
    			'order' => 'DESC',
    			'cat' => $category_id
			);
		} else {
			$recent_posts_args = array(
				'post_type' => 'post',
    			'posts_per_page' => $instance['tdminimal_widget_popular_posts_widget_number'],
    			'ignore_sticky_posts' => 1,
    			'orderby'=>'comment_count',
    			'order' => 'DESC'
			);
		}
		
		$recent_posts_query = new WP_Query( $recent_posts_args );
		$image_width = $instance['tdminimal_widget_popular_posts_widget_layout'];
		
		echo $args['before_widget'];
		echo '<h4 class="widget-title">'.$instance['tdminimal_widget_popular_posts_widget_title'].'</h4>';
		
		if( $recent_posts_query->have_posts() ) { 
			$recent_posts_output = '<ul>';
			while( $recent_posts_query->have_posts() ) {
				$recent_posts_query->the_post();
				
				if( $image_width === 'full' ) {
					$recent_posts_output .= '<li class="full-width">';
					
					if( has_post_thumbnail() ) {
						$recent_posts_output .= '<div class="popular-post-entry-image post-thumb" style="float: none;">';
						$recent_posts_output .= get_the_post_thumbnail();
						$recent_posts_output .= '<a href="'.get_permalink().'" class="thumb-mask" rel="bookmark" title="'.get_the_title().'"></a>';
						$recent_posts_output .= '<a href="'.get_permalink().'" class="thumb-mask-link-icon" rel="bookmark" title="'.get_the_title().'"><i class="fa fa-link"></i></a>';
						$recent_posts_output .= '</div>';
					}
					
				} else if ( $image_width === 'thumb' ) {
					$recent_posts_output .= '<li class="thumb-width">';
					$recent_posts_output .= '<div class="popular-post-entry-image"><a href="'.get_permalink().'" rel="bookmark" title="'.get_the_title().'">'.get_the_post_thumbnail( $recent_posts_query->post->ID, 'thumbnail' ).'</a></div>';
				} else {
					$recent_posts_output .= '<li>';
				}
				
				$recent_posts_output .= '<h4 class="popular-post-entry-title"><a href="'.get_permalink().'" rel="bookmark" title="'.get_the_title().'">'.get_the_title().'</a></h4>';
				$recent_posts_output .= '<span class="popular-post-date">'.esc_html( strftime('%B %e, %Y', get_post_time('U', true)) ). '</span>';
				$recent_posts_output .= '</li>';
			}
			$recent_posts_output .= '</ul>';
			
			echo $recent_posts_output;
		}
		wp_reset_query();
		echo $args['after_widget'];
	}

}
add_action( 'widgets_init', create_function( '', 'return register_widget( "tdminimal_popular_posts_widget" );' ) );

/**
*  	Authors Widget
*	@since tdminimal 1.0
*/
class tdminimal_author_widget extends WP_Widget {
	function __construct() {
		parent::__construct(false, $name = 'tdminimal Author Widget', array( 'description' => 'This widget shows recent/random/popular authors' ) );
	}
	
	function form( $instance ) {
		$tdminimal_widget_title = isset( $instance['tdminimal_widget_author_widget_title'] ) ? esc_attr( $instance['tdminimal_widget_author_widget_title'] ) : '';
		$tdminimal_widget_number = isset( $instance['tdminimal_widget_author_widget_number'] ) ? esc_attr( $instance['tdminimal_widget_author_widget_number'] ) : '5';
		$tdminimal_widget_sort = isset( $instance['tdminimal_widget_author_widget_sort'] ) ? esc_attr( $instance['tdminimal_widget_author_widget_sort'] ) : '';
		?>
			<p>
				<label for="<?php echo $this->get_field_id( 'tdminimal_widget_author_widget_title' ); ?>"><?php _e( 'Title', 'tdminimal' ); ?></label>
				<input id="<?php echo $this->get_field_id( 'tdminimal_widget_author_widget_title' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'tdminimal_widget_author_widget_title' ); ?>" type="text" value="<?php echo $tdminimal_widget_title; ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'tdminimal_widget_author_widget_number' ); ?>"><?php _e( 'Number of posts to show:', 'tdminimal' ); ?></label>
				<input id="<?php echo $this->get_field_id( 'tdminimal_widget_author_widget_number' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'tdminimal_widget_author_widget_number' ); ?>" type="text" value="<?php echo $tdminimal_widget_number; ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'tdminimal_widget_author_widget_sort' ); ?>"><?php _e( 'Sort by:', 'tdminimal' ); ?></label>
				<select id="<?php echo $this->get_field_id( 'tdminimal_widget_author_widget_sort' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'tdminimal_widget_author_widget_sort' ); ?>">
					<option value="recent" <?php selected($tdminimal_widget_sort, 'recent', true); ?>><?php _e( 'Recent', 'tdminimal' ); ?></option>
				  	<option value="popular" <?php selected($tdminimal_widget_sort, 'popular', true); ?>><?php _e( 'Popular', 'tdminimal' ); ?></option>
				  	<option value="name" <?php selected($tdminimal_widget_sort, 'name', true); ?>><?php _e( 'Name', 'tdminimal' ); ?></option>
				</select>
			</p>
		<?php
		
	}
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;  
		$instance['tdminimal_widget_author_widget_title'] = strip_tags( $new_instance['tdminimal_widget_author_widget_title'] );  
  		$instance['tdminimal_widget_author_widget_number'] = intval(strip_tags( $new_instance['tdminimal_widget_author_widget_number'] )); 
  		$instance['tdminimal_widget_author_widget_sort'] = strip_tags( $new_instance['tdminimal_widget_author_widget_sort'] );
  		
    	return $instance;  
	}

	function widget( $args, $instance ) {
		
		$authors_order = $instance['tdminimal_widget_author_widget_sort'];
		
		if ( $authors_order === 'recent' ) {
			$order_authors_by = 'registered';
			$author_order = 'DESC';
		} else if ( $authors_order === 'popular' ) {
			$order_authors_by = 'post_count';
			$author_order = 'DESC';
		} else if ( $authors_order === 'name' ) {
			$order_authors_by = 'display_name';
			$author_order = 'ASC';
		}
	
		$tdauthors = new WP_User_Query( array(
			'orderby' => $order_authors_by,
			'number' => $instance['tdminimal_widget_author_widget_number'],
			'order' => $author_order
		));
		
		$authors = $tdauthors->get_results();
		
		echo $args['before_widget'];
		echo '<h4 class="widget-title">'.$instance['tdminimal_widget_author_widget_title'].'</h4>';
		
		if ( !empty( $authors ) ) { 
			$output = '<ul>';
			foreach( $authors as $author ){
				$output .= '<li>';
				$output .= '<div class="avatar-container"><a href="'.get_author_posts_url( $author->ID ).'">'.get_avatar( $author->ID, 92 ).'</a></div>';
				$output .= '<h4 class="author-widget-name">'.$author->display_name.'</h4>';
    			$output .= '<div class="author-link"><a href="'.get_author_posts_url( $author->ID ).'">'. __( 'View all posts by', 'tdminimal' ) . ' '. $author->display_name . '</a></div>';
				$output .= '</li>';
			}
			$output .= '</ul>';
			echo $output;
		}
		
		wp_reset_query();
		echo $args['after_widget'];
	}

}
add_action( 'widgets_init', create_function( '', 'return register_widget( "tdminimal_author_widget" );' ) );

/**
 *  Gallery Widget
 *	@since tdminimal 1.0
 */
class tdminimal_gallery_widget extends WP_Widget {
	function __construct() {
		parent::__construct(false, $name = 'tdminimal Gallery Widget', array( 'description' => 'This widget shows galleries from Gallery Post Format' ) );
	}
	
	function form( $instance ) {
		$tdminimal_widget_title = isset( $instance['tdminimal_widget_gallery_widget_title'] ) ? esc_attr( $instance['tdminimal_widget_gallery_widget_title'] ) : '';
		$tdminimal_widget_post_name = isset( $instance['tdminimal_widget_galler_widget_post_title'] ) ? esc_attr( $instance['tdminimal_widget_galler_widget_post_title'] ) : '';
		?>
			<p>
				<label for="<?php echo $this->get_field_id( 'tdminimal_widget_gallery_widget_title' ); ?>"><?php _e( 'Title', 'tdminimal' ); ?></label>
				<input id="<?php echo $this->get_field_id( 'tdminimal_widget_gallery_widget_title' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'tdminimal_widget_gallery_widget_title' ); ?>" type="text" value="<?php echo $tdminimal_widget_title; ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'tdminimal_widget_galler_widget_post_title' ); ?>"><?php _e( 'Gallery Post Title:', 'tdminimal' ); ?></label>
				<input id="<?php echo $this->get_field_id( 'tdminimal_widget_galler_widget_post_title' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'tdminimal_widget_galler_widget_post_title' ); ?>" type="text" value="<?php echo $tdminimal_widget_post_name; ?>" />
			</p>
		<?php
		
	}
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;  
		$instance['tdminimal_widget_gallery_widget_title'] = strip_tags( $new_instance['tdminimal_widget_gallery_widget_title'] );  
  		$instance['tdminimal_widget_galler_widget_post_title'] = strip_tags( $new_instance['tdminimal_widget_galler_widget_post_title'] );
  		
    	return $instance;  
	}
	
	function widget( $args, $instance ) {
		$selected_post = get_page_by_title( $instance['tdminimal_widget_galler_widget_post_title'], 'OBJECT', 'post' );
		
		if( $selected_post && get_post_format( $selected_post->ID ) === 'gallery' ) {
			$gallery_link =  get_permalink( $selected_post->ID );
			$gallery_args = array(
				'post_type' => 'attachment',
				'numberposts' => -1,
				'post_status' => null,
				'post_parent' => $selected_post->ID
			);
			
			$attachments = get_posts( $gallery_args );
 
			if( !empty( $attachments ) ) {
				$output = '<ul class="bxslider">';
				foreach ( $attachments as $attachment ) { 
					$output .= '<li><img src="'.wp_get_attachment_url( $attachment->ID ).'" alt="'.$attachment->post_title.'"></li>';
				}
				$output .= '</ul>';
				$output .= '<div class="gallery-meta"><a href="'.$gallery_link.'" title="'.$attachment->post_title.'">'.__( 'Read More', 'tdminimal' ).' <i class="icon-chevron-sign-right"></i></a></div>';
				wp_reset_postdata();
			} 
	
		} else {
			$gallery_args = array(
				'posts_per_page' => 1,
				'orderby' => 'rand',
				'tax_query' => array(
					array(                
						'taxonomy' => 'post_format',
						'field' => 'slug',
						'terms' => array( 'post-format-gallery' )
					)
				)
			);
			
			$gallery_posts = new WP_Query( $gallery_args );
			
			if( $gallery_posts->have_posts() ) {
				while( $gallery_posts->have_posts() ) {
					$gallery_posts->the_post(); 
					$selected_post_id = $gallery_posts->post->ID;	
				} 
				
				wp_reset_postdata();
				
				$gallery_args = array(
					'post_type' => 'attachment',
					'numberposts' => -1,
					'post_status' => null,
					'post_parent' => $selected_post_id
				);
				
				$attachments = get_posts( $gallery_args );
 
				if( !empty( $attachments ) ) {
					$output = '<div class="post-slideshow"><ul class="bxslider">';
					foreach ( $attachments as $attachment ) { 
						$output .= '<li><img src="'.wp_get_attachment_url( $attachment->ID ).'" alt="'.$attachment->post_title.'"></li>';
					}
					$output .= '</ul></div>';
					wp_reset_postdata();
				} 
				
				$output .= '<div class="gallery-meta"><a class="button" href="'.get_permalink( $gallery_posts->post->ID ).'" title="'.$gallery_posts->post->post_title.'">'.__( 'Read More', 'tdminimal' ).'</a></div>';
			} else {
				$output = '';
			}
		}
		
		echo $args['before_widget'];
		echo '<h4 class="widget-title">'.$instance['tdminimal_widget_gallery_widget_title'].'</h4>';
		echo $output;
		echo $args['after_widget'];
	}
}
add_action( 'widgets_init', create_function( '', 'return register_widget( "tdminimal_gallery_widget" );' ) );
?>