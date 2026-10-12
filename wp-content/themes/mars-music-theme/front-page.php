<?php get_header() ?>

<main>
    <h2>
        <?php
        echo esc_html(
            get_theme_mod(
                'mars_welcome_heading',
                'What’s up homies!!'
            )
        );
        ?>
    </h2>

    <?php
    $image_url = get_theme_mod('mars_welcome_image');

    if ($image_url) {
        printf(
            '<img class="welcome-image" src="%s" alt="">',
            esc_url($image_url)
        );
    }
    ?>
    <p>
        <?php
        echo esc_html(
            get_theme_mod(
                'mars_welcome_text',
                'Welcome to my super awesome music blog/archive!
On this website website I will be keeping track of my record collection as well as the concerts I’ve been to.

I will also be posting about the music I listen to and other things like records I want, or new artists I discover.'
            )
        );
        ?>
    </p>
</main>

<?php get_footer() ?>