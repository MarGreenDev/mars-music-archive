<?php
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
        'sanitize_callback' => 'sanitize_text_field',
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
