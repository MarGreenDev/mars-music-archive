<?php
function mars_music_theme_setup()
{
    register_nav_menus(array(
        'navmenu' => __('NavMenu')
    ));
}
add_action('after_setup_theme', 'mars_music_theme_setup');

function mars_register_settings()
{
    register_setting(
        'mars_homepage_settings',
        'mars_welcome_heading',
        [
            'sanitize_callback' => 'sanitize_text_field',
            'default' => 'What`s up homies!!'
        ]
    );

    register_setting(
        'mars_homepage_settings',
        'mars_welcome_text',
        [
            'sanitize_callback' => 'sanitize_text_field',
            'default' => 'Hello'
        ]
    );

    add_settings_section(
        'mars_welcome_section',
        'Welcome Section',
        null,
        'mars-homepage-settings'
    );

    add_settings_field(
        'mars_welcome_heading',
        'Welcome Heading',
        'mars_render_heading_field',
        'mars-homepage-settings',
        'mars_welcome_section'
    );

    add_settings_field(
        'mars_welcome_text',
        'Welcome Text',
        'mars_render_welcome_field',
        'mars-homepage-settings',
        'mars_welcome_section'
    );
}

add_action('admin_init', 'mars_register_settings');

function mars_add_settings_page()
{
    add_options_page(
        'Homepage Settings',
        'Homepage Settings',
        'manage_options',
        'mars-homepage-settings',
        'mars_render_settings_page'
    );
}

add_action('admin_menu', 'mars_add_settings_page');

function mars_render_heading_field()
{
    $heading = get_option(
        'mars_welcome_heading',
        'What’s up homies!!'
    );
?>
    <input
        type="text"
        name="mars_welcome_heading"
        value="<?php echo esc_attr($heading); ?>"
        class="regular-text">
<?php
}

function mars_render_welcome_field()
{
    $welcome = get_option(
        'mars_welcome_text',
        'Welcome to my super awesome music blog/archive!
On this website website I will be keeping track of my record collection as well as the concerts I’ve been to.

I will also be posting about the music I listen to and other things like records I want, or new artists I discover.'
    );
?>
    <input
        type="text"
        name="mars_welcome_text"
        value="<?= esc_attr($welcome); ?>"
        class="regular-text">
<?php
}

function mars_render_settings_page()
{
?>
    <div class="wrap">
        <h1>Homepage Settings</h1>

        <form method="post" action="options.php">
            <?php
            settings_fields('mars_homepage_settings');
            do_settings_sections('mars-homepage-settings');
            submit_button();
            ?>
        </form>
    </div>
<?php
}
