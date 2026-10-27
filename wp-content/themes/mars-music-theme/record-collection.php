<?php /* Template Name: Record Collection page */
get_header()
?>

<main>
    <div class="page-layout">
        <h2>My records</h2>

        <?php
        $vinyl_records = new WP_Query([
                'post_type'      => 'vinyl',
                'posts_per_page' => -1,
        ]);

        while ($vinyl_records->have_posts()) {
            $vinyl_records->the_post();

            the_post_thumbnail();

            the_title('<h2>', '</h2>');
            ?>
            <p>Artist: <?php echo esc_html(get_field('artist') ?: 'Unknown'); ?></p>
            <?php
        }

        wp_reset_postdata();
        ?>
    </div>



    <?php get_sidebar() ?>
</main>

<?php
get_footer()
?>