<?php
get_header();
?>

    <main>
        <?php if ( have_posts() ) :
            while ( have_posts() ) :?>

                <div class="post-layout">
                    <?php the_post(); ?>
                    <?php if ( has_post_thumbnail() ) :
                        the_post_thumbnail( 'large' );
                    endif; ?>

                    <div class="post-info">
                        <h2><?php the_title() ?></h2>
                        <p class="date-display"><?php the_date() ?></p>
                        <p><?php the_content() ?></p>
                    </div>
                </div>
            <?php endwhile ?>
        <?php endif ?>
    </main>


<?php
get_footer();
?>