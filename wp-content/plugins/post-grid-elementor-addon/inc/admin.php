<?php
/**
 * Admin page
 *
 * @package Post_Grid_Elementor_Addon
 */

use Nilambar\Welcome\Welcome;

add_action(
	'wp_welcome_init',
	function() {
		$obj = new Welcome( 'plugin', 'post-grid-elementor-addon' );

		$obj->set_page(
			array(
				'page_title'     => esc_html__( 'Post Grid Elementor Addon', 'post-grid-elementor-addon' ),
				'page_subtitle'  => sprintf( esc_html__( 'Version: %s', 'post-grid-elementor-addon' ), PGEA_VERSION ),
				'menu_title'     => esc_html__( 'Post Grid Elementor Addon', 'post-grid-elementor-addon' ),
				'menu_slug'      => 'pgea-welcome',
				'menu_icon'      => 'dashicons-admin-site-alt3',
				'top_level_menu' => true,
			)
		);

		$obj->set_quick_links(
			array(
				array(
					'text' => 'Plugin Page',
					'url'  => 'https://wpconcern.com/plugins/post-grid-elementor-addon/',
					'type' => 'primary',
				),
				array(
					'text' => 'Get Support',
					'url'  => 'https://wordpress.org/support/plugin/post-grid-elementor-addon/#new-post',
					'type' => 'secondary',
				),
			)
		);

		$obj->set_admin_notice(
			array(
				'screens' => array( 'dashboard' ),
			)
		);

		$obj->add_tab(
			array(
				'id'    => 'welcome',
				'title' => 'Welcome',
				'type'  => 'grid',
				'items' => array(
					array(
						'title'       => 'View Demo',
						'icon'        => 'dashicons dashicons-desktop',
						'description' => 'You can check out the plugin demo for reference to find out what you can achieve using the plugin and how it can be customized.',
						'button_text' => 'Visit Demo',
						'button_url'  => 'https://wpconcern.net/demo/post-grid-elementor-addon/',
						'button_type' => 'secondary',
						'is_new_tab'  => true,
					),
					array(
						'title'       => 'Get Support',
						'icon'        => 'dashicons dashicons-editor-help',
						'description' => 'Got plugin support question or found bug or got some feedbacks? Please visit support forum in the WordPress.org directory.',
						'button_text' => 'Visit Support',
						'button_url'  => 'https://wordpress.org/support/plugin/post-grid-elementor-addon/#new-post',
						'button_type' => 'secondary',
						'is_new_tab'  => true,
					),
					array(
						'title'       => 'Documentation',
						'icon'        => 'dashicons dashicons-admin-page',
						'description' => 'Kindly check our plugin documentation for detailed information and instructions.',
						'button_text' => 'View Documentation',
						'button_url'  => 'https://wpconcern.com/documentation/post-grid-elementor-addon/',
						'button_type' => 'secondary',
						'is_new_tab'  => true,
					),
					array(
						'title'       => 'Customization Request',
						'icon'        => 'dashicons dashicons-admin-generic',
						'description' => 'Feel free to contact us if you need any customization service.',
						'button_text' => 'Customization Request',
						'button_url'  => 'https://wpconcern.com/request-customization/',
						'button_type' => 'secondary',
						'is_new_tab'  => true,
					),
				),
			)
		);

		$obj->add_tab(
			array(
				'id'             => 'free-vs-pro',
				'title'          => 'Free Vs. Pro',
				'type'           => 'comparison',
				'upgrade_button' => array(
					'url' => PGEA_UPGRADE_URL,
				),
				'items'          => array(
					array(
						'title' => 'Multiple Layouts',
						'free'  => 'yes',
						'pro'   => 'yes',
					),
					array(
						'title' => 'Customization Options',
						'free'  => 'yes',
						'pro'   => 'Advanced',
					),
					array(
						'title'       => 'Post and Meta Options',
						'description' => 'Show / Hide Title, Image, meta, Excerpt, Read More',
						'free'        => 'yes',
						'pro'         => 'yes',
					),
					array(
						'title' => 'Read More Link',
						'free'  => 'yes',
						'pro'   => 'yes',
					),
					array(
						'title' => 'Alignment',
						'description' => 'Left, Center, Right',
						'free'  => 'yes',
						'pro'   => 'yes',
					),
					array(
						'title'       => 'Post Order Parameters',
						'free'        => 'yes',
						'pro'         => 'yes',
					),
					array(
						'title'       => 'Default Image Option',
						'description' => 'If featured image of a post is not available',
						'free'        => 'no',
						'pro'         => 'yes',
					),
					array(
						'title'       => 'Disable Link',
						'description' => 'Title & Image',
						'free'        => 'no',
						'pro'         => 'yes',
					),
					array(
						'title'       => 'Meta Settings',
						'description' => 'Date Format, Comment Link, Author Link, Categories, Tags & More',
						'free'        => 'no',
						'pro'         => 'yes',
					),
					array(
						'title' => 'Excerpt Append',
						'free'  => 'no',
						'pro'   => 'yes',
					),
					array(
						'title' => 'Post Filter',
						'free'  => 'no',
						'pro'   => 'yes',
					),
					array(
						'title' => 'Pagination',
						'free'  => 'no',
						'pro'   => 'Normal, AJAX, Load More',
					),
					array(
						'title' => 'Custom Post Type Support',
						'free'  => 'no',
						'pro'   => 'yes',
					),
					array(
						'title' => 'WooCommerce & Easy Digital Downloads Support',
						'free'  => 'no',
						'pro'   => 'yes',
					),
					array(
						'title' => 'Exclude Posts',
						'free'  => 'no',
						'pro'   => 'yes',
					),
					array(
						'title'       => 'Additional Layout with Overlay',
						'free'        => 'no',
						'pro'         => 'yes',
					),
					array(
						'title' => 'Query Parameters',
						'description' => 'Post Type, Categories, Taxonomies, Tags and More',
						'free'  => 'Basic',
						'pro'   => 'Advanced',
					),
				),
			)
		);

		$obj->set_sidebar(
			array(
				'render_callback' => 'pgea_render_welcome_page_sidebar',
			)
		);

		$obj->run();
	}
);

/**
 * Render welcome page sidebar.
 *
 * @since 2.0.10
 *
 * @param Welcome $welcome_object Instance of Welcome class.
 */
function pgea_render_welcome_page_sidebar( $welcome_object ) {
	$welcome_object->render_sidebar_box(
		array(
			'title'        => 'Upgrade to Pro',
			'content'      => 'Upgrade to pro version for additional features and options.',
			'class'        => 'gray',
			'button_text'  => 'Upgrade Now',
			'button_url'   => PGEA_UPGRADE_URL,
			'button_class' => 'button button-primary button-upgrade',
		),
		$welcome_object
	);

	$welcome_object->render_sidebar_box(
		array(
			'title'        => 'Leave a Review',
			'content'      => $welcome_object->get_stars() . sprintf( 'Are you enjoying %1$s? We would appreciate a review.', $welcome_object->get_name() ),
			'button_text'  => 'Submit Review',
			'button_url'   => 'https://wordpress.org/support/plugin/post-grid-elementor-addon/reviews/#new-post',
			'button_class' => 'button',
		),
		$welcome_object
	);

	$welcome_object->render_sidebar_box(
		array(
			'title'   => 'Our Plugins',
			'content' => '<div class="wpc-plugins-list"></div>',
		),
		$welcome_object
	);

	$welcome_object->render_sidebar_box(
		array(
			'title'   => esc_html__( 'Our Themes', 'post-grid-elementor-addon' ),
			'content' => '<ol><li><a href="https://wphait.com/themes/hello-blog/" target="_blank">Hello Blog - Elegant WordPress Blog theme</a></li>
			<li><a href="https://wphait.com/themes/pure-blog/" target="_blank">Pure Blog - Stylish WordPress Blog theme</a></li>
			<li><a href="https://wphait.com/themes/blog-up/" target="_blank">Blog Up - Clean WordPress Blog theme</a></li>
			<li><a href="https://wphait.com/themes/nari/" target="_blank">Nari - Feminine WordPress Blog Theme</a></li>
			<li><a href="https://wphait.com/themes/dhor/" target="_blank">Dhor - Minimal WordPress Blog Theme</a></li></ol>',
		),
		$welcome_object
	);
}

/**
 * Load admin assets.
 *
 * @since 1.0.0
 *
 * @param string $hook Hook name.
 */
function pgea_load_admin_scripts( $hook ) {
	if ( 'toplevel_page_pgea-welcome' === $hook ) {
		wp_enqueue_script( 'pgea-plugins-list', PGEA_URL . '/assets/js/plugins-list.js', array( 'jquery' ), PGEA_VERSION, true );
	}
}

add_action( 'admin_enqueue_scripts', 'pgea_load_admin_scripts' );

/**
 * AJAX callback for plugins list.
 *
 * @since 2.0.10
 */
function pgea_ajax_callback_plugins_list() {
	$output = array();

	$posts = pgea_get_plugins_list();

	if ( ! empty( $posts ) ) {
		$output = $posts;
	}

	if ( ! empty( $output ) ) {
		wp_send_json_success( $output, 200 );
	} else {
		wp_send_json_error( $output, 404 );
	}
}

add_action( 'wp_ajax_nopriv_wpc_pgea_get_plugins_list', 'pgea_ajax_callback_plugins_list' );
add_action( 'wp_ajax_wpc_pgea_get_plugins_list', 'pgea_ajax_callback_plugins_list' );

/**
 * Return plugins list.
 *
 * @since 2.0.10
 *
 * @return array Plugins list array.
 */
function pgea_get_plugins_list() {
	$transient_key = 'wpc_pgea_plugins_list';

	$transient_period = 7 * DAY_IN_SECONDS;

	$output = get_transient( $transient_key );

	if ( false === $output ) {
		$output = array();

		$request = wp_safe_remote_get( 'https://wpconcern.com/wpc-api/plugins-list' );

		if ( is_wp_error( $request ) ) {
				return $output;
		}

		$body = wp_remote_retrieve_body( $request );
		$json = json_decode( $body, true );

		if ( isset( $json['plugins'] ) && ! empty( $json['plugins'] ) ) {
			$output = $json['plugins'];
		}

		set_transient( $transient_key, $output, $transient_period );
	}

	return $output;
}
