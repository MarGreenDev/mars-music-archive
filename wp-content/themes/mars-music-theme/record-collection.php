<?php /* Template Name: Record Collection page */
get_header()
?>


    <main>
        <div class="front-page-layout">
            <h2 class="records-header">My records</h2>

            <div class="page-layout">

                <?php
                $vinyl_records = new WP_Query( [
                    'post_type'      => 'vinyl',
                    'posts_per_page' => - 1,
                ] );

                while ( $vinyl_records->have_posts() ) {
                    $vinyl_records->the_post();
                    ?>
                    <a href="<?php the_permalink(); ?>">
                    <div class="vinyl-card">
                        <?php
                        the_post_thumbnail( 'custom-thumb-vinyl' );
                        the_title( '<h2>', '</h2>' );
                        ?>
                        <p>Artist: <?php echo esc_html( get_field( 'artist' ) ?: 'Unknown' ); ?></p>
                    </div>
                    </a>
                    <?php
                }

                wp_reset_postdata();
                ?>
            </div>
        </div>


        <?php get_sidebar() ?>
    </main>

<?php
get_footer()
?>