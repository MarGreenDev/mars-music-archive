<?php get_header() ?>

<main>
    <h2>
        <?php
        echo esc_html(
            get_option(
                'mars_welcome_heading',
                'What’s up homies!!'
            )
        );
        ?>
    </h2>
    <p><?php
        echo esc_html(
            get_option(
                'mars_welcome_text',
                'Hello'
            )
        );
        ?></p>
</main>

<?php get_footer() ?>