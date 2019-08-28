<?php 


/*====================================================
	facebook widget
====================================================*/
class Futura_Facebook_Widget extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		parent::__construct(
			'Futura_Facebook_Widget', // base ID
			__( 'Futura - Facebook Widget', 'futura' ), // Name
			array( 'description' => __( 'This widget shows the facebook like box', 'futura' ), ) // Args
		);
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		// outputs the content of the widget
		echo $args['before_widget'];
		if ( ! empty($instance['title']) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}

		if (!empty($instance['facebook_page_url'])) {
			echo '<iframe src="//www.facebook.com/plugins/likebox.php?href=' . esc_url($instance['facebook_page_url']) . '&amp;width&amp;height=258&amp;colorscheme=light&amp;show_faces=true&amp;header=false&amp;stream=false&amp;show_border=false" style="border:none; overflow:hidden; height:258px; width:100%;"></iframe>';
		} else {
			_e('Please add your Facebook page url in facebook widget from widget dashboard.', 'futura');
		}
		echo $args['after_widget'];
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
		// outputs the options form on admin
		$title = ! empty($instance['title']) ? $instance['title'] : __( 'Facebook', 'futura' );
		$facebook_page_url = !empty($instance['facebook_page_url']) ? $instance['facebook_page_url'] : '';
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'futura' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('facebook_page_url') ?>"><?php _e( 'Facebook Page URL', 'futura' ) ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('facebook_page_url') ?>" name="<?php echo $this->get_field_name( 'facebook_page_url' ); ?>" type="url" value="<?php echo esc_url( $facebook_page_url ); ?>">
		</p>
		<?php 
	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ! empty($new_instance['title']) ? strip_tags( $new_instance['title'] ) : '';
		$instance['facebook_page_url'] = !empty($new_instance['facebook_page_url']) ? strip_tags($new_instance['facebook_page_url']) : '';

		return $instance;
	}
}

/*====================================================
	twitter widget
====================================================*/
class Futura_Twitter_Widget extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		parent::__construct(
			'Futura_Twitter_Widget', // base ID
			__( 'Futura - Twitter Widget', 'futura' ), // Name
			array( 'description' => __( 'This widget shows the Recent tweets', 'futura' ), ) // Args
		);
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		// outputs the content of the widget
		echo $args['before_widget'];
		if ( ! empty($instance['title']) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}
		
		if (!empty($instance['twitter_url']) && !empty($instance['twitter_widget_id']) && !empty($instance['number_of_tweet']) ) {
			echo '<a class="twitter-timeline" href="' . esc_url($instance['twitter_url']) . '" data-widget-id="' . $instance['twitter_widget_id'] . '" data-link-color="#0062CC" data-chrome="nofooter noscrollbar" data-tweet-limit="' . $instance['number_of_tweet'] . '">Tweets</a>';
			echo '<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?\'http\':\'https\';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>';
		} else {
			_e('Please configure twitter widget correctly from widget dashboard.', 'futura');
		}
		echo $args['after_widget'];
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
		// outputs the options form on admin
		$title = ! empty($instance['title']) ? $instance['title'] : __( 'Twitter', 'futura' );
		$twitter_url = !empty($instance['twitter_url']) ? $instance['twitter_url'] : '';
		$twitter_widget_id = !empty($instance['twitter_widget_id']) ? $instance['twitter_widget_id'] : '';
		$number_of_tweet = !empty($instance['number_of_tweet']) ? $instance['number_of_tweet'] : '3';
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'futura' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('twitter_url') ?>"><?php _e( 'Twitter Profile URL', 'futura' ) ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('twitter_url') ?>" name="<?php echo $this->get_field_name( 'twitter_url' ); ?>" type="url" value="<?php echo esc_url( $twitter_url ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('twitter_widget_id') ?>"><?php _e( 'Twitter Widget ID', 'futura' ) ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('twitter_widget_id') ?>" name="<?php echo $this->get_field_name( 'twitter_widget_id' ); ?>" type="text" value="<?php echo esc_attr( $twitter_widget_id ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('number_of_tweet') ?>"><?php _e( 'Number of Tweet', 'futura' ) ?></label>
			<input id="<?php echo $this->get_field_id('number_of_tweet') ?>" name="<?php echo $this->get_field_name( 'number_of_tweet' ); ?>" type="text" value="<?php echo esc_attr( $number_of_tweet ); ?>" size="2">
		</p>
		<?php 
	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ! empty($new_instance['title']) ? strip_tags( $new_instance['title'] ) : '';
		$instance['twitter_url'] = !empty($new_instance['twitter_url']) ? strip_tags($new_instance['twitter_url']) : '';
		$instance['twitter_widget_id'] = !empty($new_instance['twitter_widget_id']) ? strip_tags($new_instance['twitter_widget_id']) : '';
		$instance['number_of_tweet'] = !empty($new_instance['number_of_tweet']) ? strip_tags($new_instance['number_of_tweet']) : '';

		return $instance;
	}
}

/*====================================================
	Google Plus widget
====================================================*/
class Futura_Google_Plus_Widget extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		parent::__construct(
			'Futura_Google_Plus_Widget', // base ID
			__( 'Futura - Google Plus Widget', 'futura' ), // Name
			array( 'description' => __( 'This widget shows the Google plus badge', 'futura' ), ) // Args
		);
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		// outputs the content of the widget
		echo $args['before_widget'];
		if ( ! empty($instance['title']) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}
		
		if (!empty($instance['badge_type']) && !empty($instance['google_plus_url']) ) {
			echo '<div class="google-plus">';
			echo '<script src="https://apis.google.com/js/platform.js" async defer></script>';
			echo '<div class="g-' . $instance['badge_type'] . '" data-width="200" data-href="' . esc_url($instance['google_plus_url']) . '" data-rel="publisher"></div>';
			echo '<script>jQuery(\'.g-page, g-person, g-community\').attr(\'data-width\', jQuery(\'.google-plus\').width());</script>';
			echo '</div>';
		} else {
			_e('Please configure Google Plus widget correctly from widget dashboard.', 'futura');
		}
		echo $args['after_widget'];
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
		// outputs the options form on admin
		$title = ! empty($instance['title']) ? $instance['title'] : __( 'Google Plus', 'futura' );
		$badge_type = !empty($instance['badge_type']) ? $instance['badge_type'] : '';
		$google_plus_url = !empty($instance['google_plus_url']) ? $instance['google_plus_url'] : '';
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'futura' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('google_plus_url') ?>"><?php _e( 'Google Plus URL', 'futura' ) ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('google_plus_url') ?>" name="<?php echo $this->get_field_name( 'google_plus_url' ); ?>" type="url" value="<?php echo esc_url( $google_plus_url ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('badge_type') ?>"><?php _e( 'Select Badge Type', 'futura' ) ?></label>
			<select id="<?php echo $this->get_field_id( 'badge_type' ); ?>" name="<?php echo $this->get_field_name( 'badge_type' ); ?>">
				<option value="page" <?php echo ($badge_type=='page')?'selected':''; ?>>Page</option>
				<option value="person"<?php echo ($badge_type=='person')?'selected':''; ?>>Person</option>
				<option value="community"<?php echo ($badge_type=='community')?'selected':''; ?>>Community</option>
			</select>
		</p>
		<?php 
	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ! empty($new_instance['title']) ? strip_tags( $new_instance['title'] ) : '';
		$instance['badge_type'] = !empty($new_instance['badge_type']) ? strip_tags($new_instance['badge_type']) : '';
		$instance['google_plus_url'] = !empty($new_instance['google_plus_url']) ? strip_tags($new_instance['google_plus_url']) : '';

		return $instance;
	}
}



/*====================================================
	flickr widget
====================================================*/
class Futura_Flickr_Widget extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		parent::__construct(
			'Futura_Flickr_Widget', // base ID
			__( 'Futura - Flickr Widget', 'futura' ), // Name
			array( 'description' => __( 'This widget shows the flickr photos', 'futura' ), ) // Args
		);
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		// outputs the content of the widget
		echo $args['before_widget'];
		if ( ! empty($instance['title']) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}

		if (!empty($instance['flickr_id'])) {
			wp_enqueue_script('jflickrfeed-js', THEMEROOT.'/js/jflickrfeed.min.js', array('jquery'), '', true );
			echo '<script> var flickr_id = "' . $instance['flickr_id'] .'"</script><div class="content flkr-widget"></div>';
		} else {
			_e('Please add your flickr ID in flickr widget from widget dashboard.', 'futura');
		}
		echo $args['after_widget'];
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
		// outputs the options form on admin
		$title = ! empty($instance['title']) ? $instance['title'] : __( 'Flickr', 'futura' );
		$flickr_id = !empty($instance['flickr_id']) ? $instance['flickr_id'] : '';
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'futura' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('flickr_id') ?>"><?php _e( 'Flicker ID', 'futura' ) ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('flickr_id') ?>" name="<?php echo $this->get_field_name( 'flickr_id' ); ?>" type="text" value="<?php echo esc_attr( $flickr_id ); ?>">
		</p>
		<?php 
	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ! empty($new_instance['title']) ? strip_tags( $new_instance['title'] ) : '';
		$instance['flickr_id'] = !empty($new_instance['flickr_id']) ? strip_tags($new_instance['flickr_id']) : '';

		return $instance;
	}
}

/*====================================================
	social links widget
====================================================*/
class Futura_Social_links_Widget extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		parent::__construct(
			'Futura_Social_links_Widget', // base ID
			__( 'Futura - Social Link Widget', 'futura' ), // Name
			array( 'description' => __( 'This widget shows the social icons', 'futura' ), ) // Args
		);
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		// outputs the content of the widget
		echo $args['before_widget'];
		if ( ! empty($instance['title']) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}
		?>
		<div class="content">
			<ul class="social">
			<?php
			if (!empty($instance['facebook_url'])) {
				echo '<li><a href="' . esc_url($instance['facebook_url']) . '"><i class="fa fa-facebook"></i></a></li>';
			}
			if (!empty($instance['twitter_url'])) {
				echo '<li><a href="' . esc_url($instance['twitter_url']) . '"><i class="fa fa-twitter"></i></a></li>';
			}
			if (!empty($instance['google_plus_url'])) {
				echo '<li><a href="' . esc_url($instance['google_plus_url']) . '"><i class="fa fa-google-plus"></i></a></li>';
			}
			if (!empty($instance['linkedin_url'])) {
				echo '<li><a href="' . esc_url($instance['linkedin_url']) . '"><i class="fa fa-linkedin"></i></a></li>';
			}
			if (!empty($instance['skype_url'])) {
				echo '<li><a href="' . esc_url($instance['skype_url']) . '"><i class="fa fa-skype"></i></a></li>';
			}
			if (!empty($instance['pinterest_url'])) {
				echo '<li><a href="' . esc_url($instance['pinterest_url']) . '"><i class="fa fa-pinterest"></i></a></li>';
			}
			if (!empty($instance['youtube_url'])) {
				echo '<li><a href="' . esc_url($instance['youtube_url']) . '"><i class="fa fa-youtube"></i></a></li>';
			}
			if (!empty($instance['vimeo_url'])) {
				echo '<li><a href="' . esc_url($instance['vimeo_url']) . '"><i class="fa fa-vimeo-square"></i></a></li>';
			}
			if (!empty($instance['dribbble_url'])) {
				echo '<li><a href="' . esc_url($instance['dribbble_url']) . '"><i class="fa fa-dribbble"></i></a></li>';
			}
			if (!empty($instance['flickr_url'])) {
				echo '<li><a href="' . esc_url($instance['flickr_url']) . '"><i class="fa fa-flickr"></i></a></li>';
			}
			if (!empty($instance['tumblr_url'])) {
				echo '<li><a href="' . esc_url($instance['tumblr_url']) . '"><i class="fa fa-tumblr"></i></a></li>';
			}
			if (!empty($instance['github_url'])) {
				echo '<li><a href="' . esc_url($instance['github_url']) . '"><i class="fa fa-github"></i></a></li>';
			}
			if (!empty($instance['instagram_url'])) {
				echo '<li><a href="' . esc_url($instance['instagram_url']) . '"><i class="fa fa-instagram"></i></a></li>';
			}
			if (!empty($instance['stack_overflow_url'])) {
				echo '<li><a href="' . esc_url($instance['stack_overflow_url']) . '"><i class="fa fa-stack-overflow"></i></a></li>';
			}
			if (!empty($instance['stack_exchange_url'])) {
				echo '<li><a href="' . esc_url($instance['stack_exchange_url']) . '"><i class="fa fa-stack-exchange"></i></a></li>';
			}
			if (!empty($instance['xing_url'])) {
				echo '<li><a href="' . esc_url($instance['xing_url']) . '"><i class="fa fa-xing"></i></a></li>';
			}
			if (!empty($instance['envelope_url'])) {
				echo '<li><a href="' . esc_url($instance['envelope_url']) . '"><i class="fa fa-envelope"></i></a></li>';
			}
			if (!empty($instance['rss_url'])) {
				echo '<li><a href="' . home_url() .  $instance['rss_url'] . '"><i class="fa fa-rss"></i></a></li>';
			}
			?>
			</ul>
		</div>
		<?php
		echo $args['after_widget'];
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
		// outputs the options form on admin
		$title = ! empty($instance['title']) ? $instance['title'] : __( 'Social', 'futura' );
		$facebook_url = !empty($instance['facebook_url']) ? $instance['facebook_url'] : '';
		$twitter_url = !empty($instance['twitter_url']) ? $instance['twitter_url'] : '';
		$google_plus_url = !empty($instance['google_plus_url']) ? $instance['google_plus_url'] : '';
		$linkedin_url = !empty($instance['linkedin_url']) ? $instance['linkedin_url'] : '';
		$skype_url = !empty($instance['skype_url']) ? $instance['skype_url'] : '';
		$pinterest_url = !empty($instance['pinterest_url']) ? $instance['pinterest_url'] : '';
		$youtube_url = !empty($instance['youtube_url']) ? $instance['youtube_url'] : '';
		$vimeo_url = !empty($instance['vimeo_url']) ? $instance['vimeo_url'] : '';
		$dribbble_url = !empty($instance['dribbble_url']) ? $instance['dribbble_url'] : '';
		$flickr_url = !empty($instance['flickr_url']) ? $instance['flickr_url'] : '';
		$tumblr_url = !empty($instance['tumblr_url']) ? $instance['tumblr_url'] : '';
		$github_url = !empty($instance['github_url']) ? $instance['github_url'] : '';
		$instagram_url = !empty($instance['instagram_url']) ? $instance['instagram_url'] : '';
		$stack_overflow_url = !empty($instance['stack_overflow_url']) ? $instance['stack_overflow_url'] : '';
		$stack_exchange_url = !empty($instance['stack_exchange_url']) ? $instance['stack_exchange_url'] : '';
		$xing_url = !empty($instance['xing_url']) ? $instance['xing_url'] : '';
		$envelope_url = !empty($instance['envelope_url']) ? $instance['envelope_url'] : '';
		$rss_url = !empty($instance['rss_url']) ? $instance['rss_url'] : '';
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'futura' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('facebook_url') ?>"><?php _e( 'Facebook URL', 'futura' ) ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('facebook_url') ?>" name="<?php echo $this->get_field_name( 'facebook_url' ); ?>" type="text" value="<?php echo esc_attr( $facebook_url ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('twitter_url') ?>"><?php _e( 'Twitter URL', 'futura' ) ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('twitter_url') ?>" name="<?php echo $this->get_field_name( 'twitter_url' ); ?>" type="text" value="<?php echo esc_attr( $twitter_url ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('google_plus_url') ?>"><?php _e( 'Google Plus URL', 'futura' ) ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('google_plus_url') ?>" name="<?php echo $this->get_field_name( 'google_plus_url' ); ?>" type="text" value="<?php echo esc_attr( $google_plus_url ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('linkedin_url') ?>"><?php _e( 'Linkedin URL', 'futura' ) ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('linkedin_url') ?>" name="<?php echo $this->get_field_name( 'linkedin_url' ); ?>" type="text" value="<?php echo esc_attr( $linkedin_url ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('skype_url') ?>"><?php _e( 'Skype URL', 'futura' ) ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('skype_url') ?>" name="<?php echo $this->get_field_name( 'skype_url' ); ?>" type="text" value="<?php echo esc_attr( $skype_url ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('pinterest_url') ?>"><?php _e( 'Pinterest URL', 'futura' ) ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('pinterest_url') ?>" name="<?php echo $this->get_field_name( 'pinterest_url' ); ?>" type="text" value="<?php echo esc_attr( $pinterest_url ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('youtube_url') ?>"><?php _e( 'Youtube URL', 'futura' ) ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('youtube_url') ?>" name="<?php echo $this->get_field_name( 'youtube_url' ); ?>" type="text" value="<?php echo esc_attr( $youtube_url ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('vimeo_url') ?>"><?php _e( 'Vimeo URL', 'futura' ) ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('vimeo_url') ?>" name="<?php echo $this->get_field_name( 'vimeo_url' ); ?>" type="text" value="<?php echo esc_attr( $vimeo_url ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('dribbble_url') ?>"><?php _e( 'Dribbble URL', 'futura' ) ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('dribbble_url') ?>" name="<?php echo $this->get_field_name( 'dribbble_url' ); ?>" type="text" value="<?php echo esc_attr( $dribbble_url ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('flickr_url') ?>"><?php _e( 'Flickr URL', 'futura' ) ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('flickr_url') ?>" name="<?php echo $this->get_field_name( 'flickr_url' ); ?>" type="text" value="<?php echo esc_attr( $flickr_url ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('tumblr_url') ?>"><?php _e( 'Tumblr URL', 'futura' ) ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('tumblr_url') ?>" name="<?php echo $this->get_field_name( 'tumblr_url' ); ?>" type="text" value="<?php echo esc_attr( $tumblr_url ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('github_url') ?>"><?php _e( 'Github URL', 'futura' ) ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('github_url') ?>" name="<?php echo $this->get_field_name( 'github_url' ); ?>" type="text" value="<?php echo esc_attr( $github_url ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('instagram_url') ?>"><?php _e( 'Instagram URL', 'futura' ) ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('instagram_url') ?>" name="<?php echo $this->get_field_name( 'instagram_url' ); ?>" type="text" value="<?php echo esc_attr( $instagram_url ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('stack_overflow_url') ?>"><?php _e( 'Stack Overflow URL', 'futura' ) ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('stack_overflow_url') ?>" name="<?php echo $this->get_field_name( 'stack_overflow_url' ); ?>" type="text" value="<?php echo esc_attr( $stack_overflow_url ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('stack_exchange_url') ?>"><?php _e( 'Stack Exchange URL', 'futura' ) ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('stack_exchange_url') ?>" name="<?php echo $this->get_field_name( 'stack_exchange_url' ); ?>" type="text" value="<?php echo esc_attr( $stack_exchange_url ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('xing_url') ?>"><?php _e( 'Xing URL', 'futura' ) ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('xing_url') ?>" name="<?php echo $this->get_field_name( 'xing_url' ); ?>" type="text" value="<?php echo esc_attr( $xing_url ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('envelope_url') ?>"><?php _e( 'Envelop ( mail icon ) URL', 'futura' ) ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('envelope_url') ?>" name="<?php echo $this->get_field_name( 'envelope_url' ); ?>" type="text" value="<?php echo esc_attr( $envelope_url ); ?>">
			<p>You may use <code>mailto:yourmail@domain.com</code></p>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('rss_url') ?>"><?php _e( 'RSS ( feed ) URL', 'futura' ) ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('rss_url') ?>" name="<?php echo $this->get_field_name( 'rss_url' ); ?>" type="text" value="<?php echo esc_attr( $rss_url ); ?>">
			<p>By default it should be <code>/feed/</code></p>
		</p>
		<?php 
	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ! empty($new_instance['title']) ? strip_tags( $new_instance['title'] ) : '';
		$instance['facebook_url'] = !empty($new_instance['facebook_url']) ? strip_tags($new_instance['facebook_url']) : '';
		$instance['twitter_url'] = !empty($new_instance['twitter_url']) ? strip_tags($new_instance['twitter_url']) : '';
		$instance['google_plus_url'] = !empty($new_instance['google_plus_url']) ? strip_tags($new_instance['google_plus_url']) : '';
		$instance['linkedin_url'] = !empty($new_instance['linkedin_url']) ? strip_tags($new_instance['linkedin_url']) : '';
		$instance['skype_url'] = !empty($new_instance['skype_url']) ? strip_tags($new_instance['skype_url']) : '';
		$instance['pinterest_url'] = !empty($new_instance['pinterest_url']) ? strip_tags($new_instance['pinterest_url']) : '';
		$instance['youtube_url'] = !empty($new_instance['youtube_url']) ? strip_tags($new_instance['youtube_url']) : '';
		$instance['vimeo_url'] = !empty($new_instance['vimeo_url']) ? strip_tags($new_instance['vimeo_url']) : '';
		$instance['dribbble_url'] = !empty($new_instance['dribbble_url']) ? strip_tags($new_instance['dribbble_url']) : '';
		$instance['flickr_url'] = !empty($new_instance['flickr_url']) ? strip_tags($new_instance['flickr_url']) : '';
		$instance['tumblr_url'] = !empty($new_instance['tumblr_url']) ? strip_tags($new_instance['tumblr_url']) : '';
		$instance['github_url'] = !empty($new_instance['github_url']) ? strip_tags($new_instance['github_url']) : '';
		$instance['instagram_url'] = !empty($new_instance['instagram_url']) ? strip_tags($new_instance['instagram_url']) : '';
		$instance['stack_overflow_url'] = !empty($new_instance['stack_overflow_url']) ? strip_tags($new_instance['stack_overflow_url']) : '';
		$instance['stack_exchange_url'] = !empty($new_instance['stack_exchange_url']) ? strip_tags($new_instance['stack_exchange_url']) : '';
		$instance['xing_url'] = !empty($new_instance['xing_url']) ? strip_tags($new_instance['xing_url']) : '';
		$instance['envelope_url'] = !empty($new_instance['envelope_url']) ? strip_tags($new_instance['envelope_url']) : '';
		$instance['rss_url'] = !empty($new_instance['rss_url']) ? strip_tags($new_instance['rss_url']) : '';

		return $instance;
	}
}

/*====================================================
	Mailchimp widget
====================================================*/
class Futura_Mailchimp_Widget extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		parent::__construct(
			'Futura_Mailchimp_Widget', // base ID
			__( 'Futura - Mailchip Widget', 'futura' ), // Name
			array( 'description' => __( 'This widget shows the Mailchimp Subscription form', 'futura' ), ) // Args
		);
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		// outputs the content of the widget
		echo $args['before_widget'];
		if ( ! empty($instance['title']) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}

		if (!empty($instance['mailchimp_form_url'])) { 
			echo '<script>var mailchimp_form_url = \'' . $instance['mailchimp_form_url'] . '\';</script>';?>
		<div class="content newsletter">
			<?php 
			if ( ! empty($instance['description']) ) {
				echo '<p>' . $instance['description'] . '</p>';
			} 
			?>
			<div id="mc_embed_signup">
				<form action="#" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" novalidate>
					<div class="input-group">
						<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="Enter your email...">
					</div>
					<div class="input-group">
						<input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="btn btn-default">
					</div>
				</form>
			</div>
			<div id="message"></div>
		</div>
		<?php
		} else {
			_e('Please add your mailchimp form URL in mailchimp widget from widget dashboard.', 'futura');
		}
		echo $args['after_widget'];
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
		// outputs the options form on admin
		$title = ! empty($instance['title']) ? $instance['title'] : __( 'Newsletter', 'futura' );
		$mailchimp_form_url = !empty($instance['mailchimp_form_url']) ? $instance['mailchimp_form_url'] : '';
		$description = !empty($instance['description']) ? $instance['description'] : '';
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'futura' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('mailchimp_form_url') ?>"><?php _e( 'Mailchimp Form URL', 'futura' ) ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('mailchimp_form_url') ?>" name="<?php echo $this->get_field_name( 'mailchimp_form_url' ); ?>" type="url" value="<?php echo esc_attr( $mailchimp_form_url ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('mailchimp_form_url') ?>"><?php _e( 'Optional Text to show before form', 'futura' ) ?></label>
			<textarea class="widefat" id="<?php echo $this->get_field_id('description') ?>" name="<?php echo $this->get_field_name( 'description' ); ?>"><?php echo esc_attr( $description ); ?></textarea>
		</p>
		<?php 
	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ! empty($new_instance['title']) ? strip_tags( $new_instance['title'] ) : '';
		$instance['mailchimp_form_url'] = !empty($new_instance['mailchimp_form_url']) ? strip_tags($new_instance['mailchimp_form_url']) : '';
		$instance['description'] = !empty($new_instance['description']) ? strip_tags($new_instance['description']) : '';

		return $instance;
	}
}







// register Foo_Widget widget
function register_futura_custom_widgets() {
    register_widget( 'Futura_Facebook_Widget' );
    register_widget( 'Futura_Twitter_Widget' );
    register_widget( 'Futura_Google_Plus_Widget' );
    register_widget( 'Futura_Flickr_Widget' );
    register_widget( 'Futura_Social_links_Widget' );
    register_widget( 'Futura_Mailchimp_Widget' );
}
add_action( 'widgets_init', 'register_futura_custom_widgets' );
?>