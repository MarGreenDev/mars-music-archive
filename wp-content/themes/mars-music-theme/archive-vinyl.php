<?php get_header(); ?>

<main>
    <div class="front-page-layout">
        <h1 class="records-header">My records</h1>

        <?php if ( have_posts() ) : ?>
            <div class="page-layout">
                <?php while ( have_posts() ) : the_post(); ?>
                    <article <?php post_class( 'vinyl-card' ); ?>>
                        <a href="<?php the_permalink(); ?>">
                            <?php if ( has_post_thumbnail() ) {
                                the_post_thumbnail( 'custom-thumb-vinyl' );
                            } ?>
                            <h2><?php the_title(); ?></h2>
                        </a>
                        <p>Artist: <?php echo esc_html( get_field( 'artist' ) ?: 'Unknown' ); ?></p>
                    </article>
                <?php endwhile; ?>
            </div>
        <?php else : ?>
            <p>No vinyl records found.</p>
        <?php endif; ?>
    </div>

    <?php get_sidebar(); ?>
</main>

<?php get_footer(); ?>
