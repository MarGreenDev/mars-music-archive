<?php get_header() ?>

<main>
    <div class="front-page-layout">
        <div class="welcome-post">
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

            <div class="welcome-post-content">
                <?php
                $image_url = get_theme_mod('mars_welcome_image');

                if ($image_url) {
                    printf(
                        '<img class="welcome-image" src="%s" alt="">',
                        esc_url($image_url)
                    );
                }
                ?>
                <p><?php
                    echo esc_html(
                        get_theme_mod(
                            'mars_welcome_text',
                            'Welcome to my super awesome music blog/archive!
On this website website I will be keeping track of my record collection as well as the concerts I’ve been to.

I will also be posting about the music I listen to and other things like records I want, or new artists I discover.'
                        )
                    );
                    ?></p>
            </div>
        </div>

        <?php

        $latestArgs = [
            'post_type' => 'post',
            'posts_per_page' => 1,
            'orderby' => 'date',
            'order' => 'DESC'
        ];

        $newestPost = new WP_Query($latestArgs);
        $latestPostId = $newestPost->have_posts()
            ? $newestPost->posts[0]->ID
            : 0;

        $args = [
            'post_type' => 'post',
            'posts_per_page' => 3,
            'post__not_in' => [$latestPostId]
        ];


        $posts = new WP_Query($args);
        ?>

        <h2 class="posts-header">Latest posts</h2>

        <div class="posts-container">
            <div class="latest-post">
                <?php if ($newestPost->have_posts()) : ?>
                    <?php while ($newestPost->have_posts()) :
                        $newestPost->the_post();
                    ?>

                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('custom-thumb') ?>

                        <?php endif ?>
                        <div class="post-details">
                            <h3><?php the_title() ?></h3>
                            <p class="post-date">
                                <?php the_date() ?>
                            </p>
                        </div>

                    <?php endwhile ?>
                <?php endif;
                wp_reset_postdata();
                ?>
            </div>

            <div class="other-posts">
                <?php if ($posts->have_posts()) : ?>
                    <?php while ($posts->have_posts()) : $posts->the_post(); ?>
                        <div class="wp-post">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('thumbnail') ?>
                            <?php endif ?>
                            <div class="post-details">
                                <a href="<?php the_permalink() ?>">
                                    <h3><?php the_title() ?></h3>
                                </a>
                                <p class="post-date">
                                    <?php echo esc_html(get_the_date()) ?>
                                </p>
                            </div>
                        </div>
                    <?php endwhile;
                    wp_reset_postdata();
                    ?>
                <?php endif ?>
            </div>
        </div>
    </div>
    <?php get_sidebar() ?>
</main>

<?php get_footer() ?>