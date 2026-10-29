<?php
get_header();
?>

    <main>

        <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : ?>

                <div class="vinyl-page">
                    <?php the_post(); ?>
                    <?php if ( has_post_thumbnail() ) :
                        the_post_thumbnail( 'medium' );
                    endif; ?>
                    <div>
                        <div class="vinyl-title-info">
                            <h2><?php the_title() ?></h2>
                            <h3><?php echo esc_html( get_field( "artist" ?: 'Unknown' ) ) ?></h3>
                            <h4><?= esc_html( get_field( "release_year" ?: 'Unknown' ) ) ?></h4>
                        </div>
                        <p>Record format: <?= esc_html( get_field( "record_format" ?: 'Unknown' ) ) ?></p>
                        <p>Genre: <?= esc_html( get_field( "genre" ?: 'Unknown' ) ) ?></p>
                        <p>Label: <?= esc_html( get_field( "record_label" ?: 'Unknown' ) ) ?></p>
                        <p>Purchase date: <?= esc_html( get_field( "purchase_date" ?: 'Unknown' ) ) ?></p>
                        <p>Condition: <?= esc_html( get_field( "condition" ?: 'Unknown' ) ) ?></p>
                    </div>
                </div>
            <?php
            endwhile;
        endif;
        ?>
        <?php get_sidebar(); ?>
    </main>
<?php
get_footer();
?>