<?php
add_theme_support('post-thumbnails');
add_image_size('custom-thumb', 400, 200, true);

function mars_music_theme_setup()
{
    register_nav_menus(array(
        'navmenu' => __('NavMenu')
    ));
}
add_action('after_setup_theme', 'mars_music_theme_setup');


// Welcome page customization
function mars_customize_register($wp_customize)
{
    $wp_customize->add_section('mars_homepage', [
        'title'    => 'Homepage',
        'priority' => 30,
    ]);

    $wp_customize->add_setting('mars_welcome_heading', [
        'default'           => 'What’s up homies!!',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('mars_welcome_heading', [
        'label'   => 'Welcome heading',
        'section' => 'mars_homepage',
        'type'    => 'text',
    ]);

    $wp_customize->add_setting('mars_welcome_text', [
        'default' => 'Welcome to my super awesome music blog/archive!
On this website website I will be keeping track of my record collection as well as the concerts I’ve been to.

I will also be posting about the music I listen to and other things like records I want, or new artists I discover.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ]);

    $wp_customize->add_control('mars_welcome_text', [
        'label' => 'Welcome Paragraph',
        'section' => 'mars_homepage',
        'type' => 'textarea',
    ]);

    $wp_customize->add_setting('mars_welcome_image', [
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ]);

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'mars_welcome_image',
            [
                'label' => 'Welcome Image',
                'section' => 'mars_homepage',
                'settings' => 'mars_welcome_image',
            ]
        )
    );
}

add_action('customize_register', 'mars_customize_register');

// Sidebar widget area

function mars_register_sidebars()
{
    register_sidebar([
        'name' => 'Music Archive Sidebar',
        'id' => 'music-archive-sidebar',
        'description' => 'Widgets displayed beside the main content.',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ]);
}

add_action('widgets_init', 'mars_register_sidebars');
