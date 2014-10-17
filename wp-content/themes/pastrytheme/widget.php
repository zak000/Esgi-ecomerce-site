<?php
	/**
	 * Created by PhpStorm.
	 * User: hugo
	 * Date: 15/10/14
	 * Time: 10:50
	 */
//Create widget area
	add_action( "widgets_init", "theme_sidebars");
	add_action( 'widgets_init', 'link_register_widgets' );

	function theme_sidebars(){
		register_sidebar(
			array(
                 "id" => "zone_widget_gauche",
                 "name" => "Zone latérale gauche",
                 "description" => "Apparait sur la colonne de gauche",
                 "before_widget" => "<aside id='sidebar'>",
                 "after_widget" => "</aside>",
                 "before_title" => "<h1>",
                 "after_title" => "</h1>"
             )
		);
	}

	function link_register_widgets() {
		register_widget( 'LinkWidget' );
	}

	class LinkWidget extends WP_Widget {
		function __construct(){
			parent::__construct(
				'link_widget',
				__( 'Link Widget' , 'link'),
				array( 'description' => __( 'Display a link to a website' , 'link') )
			);
		}

		/**
		 * Outputs the content of the widget
		 *
		 * @param array $args
		 * @param array $instance
		 */
		public function widget( $args, $instance ) {
			echo $args['before_widget'];
			echo '<a href="'.$instance['href'].'">'.$instance['title'].'</a>';
			echo $args['after_widget'];
		}

		/**
		 * Outputs the options form on admin
		 *
		 * @param array $instance The widget options
		 */
		public function form( $instance ) {
			if ( isset( $instance[ 'title' ] ) ) {
				$title = $instance[ 'title' ];
			}
			else {
				$title = __( 'New title', 'text_domain' );
			}
			if ( isset( $instance[ 'href' ] ) ) {
				$href = $instance[ 'href' ];
			}
			else {
				$href = __( 'http://localhost/', 'link' );
			}
			?>
			<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'href' ); ?>"><?php _e( 'Link:' ); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id( 'href' ); ?>" name="<?php echo $this->get_field_name( 'href' ); ?>" type="text" value="<?php echo esc_attr( $href ); ?>">
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
			$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
			$instance['href'] = ( ! empty( $new_instance['href'] ) ) ? strip_tags( $new_instance['href'] ) : '';

			return $instance;
		}

	}