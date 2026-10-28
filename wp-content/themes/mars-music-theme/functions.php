<?php
add_theme_support( 'post-thumbnails' );
add_image_size( 'custom-thumb', 400, 200, true );
add_image_size( 'custom-thumb-vinyl', 250, 250, true );

function mars_music_theme_setup() {
	register_nav_menus( array(
		'navmenu' => __( 'NavMenu' )
	) );
}

add_action( 'after_setup_theme', 'mars_music_theme_setup' );


// Welcome page customization
function mars_customize_register( $wp_customize ) {
	$wp_customize->add_section( 'mars_homepage', [
		'title'    => 'Homepage',
		'priority' => 30,
	] );

	$wp_customize->add_setting( 'mars_welcome_heading', [
		'default'           => 'What’s up homies!!',
		'sanitize_callback' => 'sanitize_text_field',
	] );

	$wp_customize->add_control( 'mars_welcome_heading', [
		'label'   => 'Welcome heading',
		'section' => 'mars_homepage',
		'type'    => 'text',
	] );

	$wp_customize->add_setting( 'mars_welcome_text', [
		'default'           => 'Welcome to my super awesome music blog/archive!
On this website website I will be keeping track of my record collection as well as the concerts I’ve been to.

I will also be posting about the music I listen to and other things like records I want, or new artists I discover.',
		'sanitize_callback' => 'sanitize_textarea_field',
	] );

	$wp_customize->add_control( 'mars_welcome_text', [
		'label'   => 'Welcome Paragraph',
		'section' => 'mars_homepage',
		'type'    => 'textarea',
	] );

	$wp_customize->add_setting( 'mars_welcome_image', [
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	] );

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'mars_welcome_image',
			[
				'label'    => 'Welcome Image',
				'section'  => 'mars_homepage',
				'settings' => 'mars_welcome_image',
			]
		)
	);
}

add_action( 'customize_register', 'mars_customize_register' );

// Sidebar widget area

function mars_register_sidebars() {
	register_sidebar( [
		'name'          => 'Music Archive Sidebar',
		'id'            => 'music-archive-sidebar',
		'description'   => 'Widgets displayed beside the main content.',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	] );
}

add_action( 'widgets_init', 'mars_register_sidebars' );

function mars_register_vinyl_post_type() {

	$labels = array(
		'name'          => 'Vinyl Records',
		'singular_name' => 'Vinyl Record',
		'add_new'       => 'Add Vinyl Record',
		'add_new_item'  => 'Add Vinyl Record',
		'edit_item'     => 'Edit Vinyl Record',
		'new_item'      => 'New Vinyl Record',
		'view_item'     => 'View Vinyl Record',
		'search_items'  => 'Search Vinyl Records',
		'not_found'     => 'No Vinyl Records found',
		'menu_name'     => 'Vinyl Collection',
	);

	$args = [
		'labels'       => $labels,
		'public'       => true,
		'has_archive'  => true,
		'rewrite'      => [ 'slug' => 'vinyl' ],
		'menu_icon'    => 'dashicons-album',
		'supports'     => [
			'title',
			'editor',
			'thumbnail',
			'excerpt',
		],
		'show_in_rest' => true,
		'show_ui'      => true,
	];
	register_post_type( 'vinyl', $args );
}

add_action( 'init', 'mars_register_vinyl_post_type' );

class Mars_Latest_Vinyl_Widget extends WP_Widget {
	public function __construct() {
		parent::__construct(
			'mars_latest_vinyl',
			'Mars: Latest Vinyl',
			array(
				'description' => 'Displays latest Vinyl record.',
			)
		);
	}

	public function widget( $args, $instance ) {
		echo $args['before_widget'];

		$vinyl_query = new WP_Query( array(
			'post_type'     => 'vinyl',
			'posts_per_page' => 1,
			'post_status'   => 'publish',
			'orderby'       => 'date',
			'order'         => 'DESC',
		) );

		if ( $vinyl_query->have_posts() ) {
			while ( $vinyl_query->have_posts() ) {
				$vinyl_query->the_post();

				echo '<div class="mars-latest-vinyl">';

				echo '<h3>Latest Vinyl</h3>';

				echo '<a href="' . esc_url( get_permalink() ) . '">';

				if ( has_post_thumbnail() ) {
					echo get_the_post_thumbnail(
						get_the_ID(),
						'custom-thumb-vinyl',
					array('class' => 'mars-vinyl-cover')
					);
				}
				echo '<h4>' . get_the_title() . '</h4>';
				echo '</a>';
				echo '</div>';
			}
		}      else {
			echo '<p>No vinyls found yet</p>';
		}
		wp_reset_postdata();

		echo $args['after_widget'];
	}
}

function mars_register_latest_vinyl_widget() {
	register_widget( 'Mars_Latest_Vinyl_Widget');
}
add_action( 'widgets_init', 'mars_register_latest_vinyl_widget' );

