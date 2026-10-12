<?php
function mars_music_theme_setup()
{
    register_nav_menus(array(
        'navmenu' => __('NavMenu')
    ));
}
add_action('after_setup_theme', 'mars_music_theme_setup');
